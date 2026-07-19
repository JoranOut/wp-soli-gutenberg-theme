/**
 * soli/masonry — Interactivity API store.
 *
 * Takes the block's items (the children of an inner core/query → post-template,
 * or the block's own direct children as a fallback) and packs them into N
 * columns, appending each item to whichever column is currently shortest —
 * true masonry rather than the round-robin of the source tutorial.
 *
 * Column count is responsive (mobile ≤ 600px, tablet ≤ 900px, else desktop),
 * re-packing on a debounced resize and after late-loading images change the
 * measured column heights.
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

const MOBILE_MAX = 600;
const TABLET_MAX = 900;
const RESIZE_DEBOUNCE = 200;

// Per-block mutable state that doesn't belong in serializable context:
// the cached item nodes, the generated grid element, and the resize timer.
const local = new WeakMap();

function getLocal( root ) {
	if ( ! local.has( root ) ) {
		local.set( root, {
			items: null,
			source: null,
			colTag: 'div',
			grid: null,
			columns: 0,
			timer: null,
		} );
	}
	return local.get( root );
}

function currentColumns( ctx ) {
	const width = window.innerWidth;
	if ( width <= MOBILE_MAX ) {
		return Math.max( 1, ctx.columnsMobile );
	}
	if ( width <= TABLET_MAX ) {
		return Math.max( 1, ctx.columnsTablet );
	}
	return Math.max( 1, ctx.columns );
}

/**
 * Locate and cache the item nodes to distribute (once). Prefers the rendered
 * Query Loop post-template; otherwise falls back to the block's own children.
 */
function collect( root ) {
	const l = getLocal( root );
	if ( l.items ) {
		return l;
	}

	const source =
		root.querySelector( '.wp-block-post-template' ) ||
		root.querySelector( '[data-soli-masonry-items]' );

	if ( source ) {
		l.source = source;
		l.items = Array.from( source.children );
		const tag = source.tagName;
		l.colTag = tag === 'OL' ? 'ol' : tag === 'UL' ? 'ul' : 'div';
	} else {
		// No query inside: treat the block's direct children as items.
		l.items = Array.from( root.children );
		l.colTag = 'div';
	}
	return l;
}

/**
 * (Re)build the columns and place every item into the shortest one. Item nodes
 * are reused across re-packs; clearing the grid detaches them but the cached
 * references keep them alive.
 */
function pack( root, ctx ) {
	const l = collect( root );
	if ( ! l.items || l.items.length === 0 ) {
		return;
	}

	const cols = currentColumns( ctx );

	if ( ! l.grid ) {
		l.grid = document.createElement( 'div' );
		l.grid.className = 'wp-block-soli-masonry__grid';
		if ( l.source ) {
			// Keep the original list in the DOM (hidden) so nothing else that
			// depended on it breaks; the items themselves move into the grid.
			l.source.hidden = true;
			l.source.setAttribute( 'aria-hidden', 'true' );
			l.source.after( l.grid );
		} else {
			root.appendChild( l.grid );
		}
		root.classList.add( 'is-enhanced' );
	}

	// Rebuild empty columns.
	l.grid.textContent = '';
	const columns = [];
	for ( let i = 0; i < cols; i++ ) {
		const column = document.createElement( l.colTag );
		column.className = 'wp-block-soli-masonry__column';
		l.grid.appendChild( column );
		columns.push( column );
	}

	// Shortest-column packing: on ties the earliest column wins, so the first
	// row fills left-to-right and source order is preserved as closely as the
	// heights allow.
	for ( const item of l.items ) {
		let target = columns[ 0 ];
		for ( let i = 1; i < columns.length; i++ ) {
			if ( columns[ i ].offsetHeight < target.offsetHeight ) {
				target = columns[ i ];
			}
		}
		target.appendChild( item );
	}

	l.columns = cols;
}

function schedule( root, ctx ) {
	const l = getLocal( root );
	if ( l.timer ) {
		clearTimeout( l.timer );
	}
	l.timer = setTimeout( () => {
		l.timer = null;
		pack( root, ctx );
	}, RESIZE_DEBOUNCE );
}

/**
 * Watch late-loading images inside the given nodes and re-pack when their
 * measured height changes (mirrors the initial observer in init()).
 */
function observeImages( root, ctx, nodes ) {
	nodes.forEach( ( node ) => {
		node.querySelectorAll( 'img' ).forEach( ( img ) => {
			if ( ! img.complete ) {
				img.addEventListener( 'load', () => schedule( root, ctx ), {
					once: true,
				} );
				img.addEventListener( 'error', () => schedule( root, ctx ), {
					once: true,
				} );
			}
		} );
	} );
}

/**
 * "Meer nieuws" load-more: fetch the next paginated page of the same news
 * index, lift its masonry cards out of the response, append them to the packed
 * items and re-pack — so batches accumulate instead of replacing each other.
 *
 * Progressive enhancement: the button is the core query-pagination-next link,
 * so without JS (or if a fetch fails) it still navigates to the next page.
 *
 * @param {HTMLElement} root   The masonry block root.
 * @param {Object}      ctx    The interactivity context (column counts).
 * @param {HTMLElement} anchor The pagination-next link driving the load.
 */
async function loadMore( root, ctx, anchor ) {
	if ( anchor.dataset.soliLoading === '1' ) {
		return;
	}
	const url = anchor.getAttribute( 'href' );
	if ( ! url ) {
		return;
	}

	anchor.dataset.soliLoading = '1';
	root.classList.add( 'is-loading-more' );

	try {
		const response = await fetch( url, {
			headers: { 'X-Requested-With': 'XMLHttpRequest' },
		} );
		if ( ! response.ok ) {
			throw new Error( `HTTP ${ response.status }` );
		}
		const doc = new DOMParser().parseFromString(
			await response.text(),
			'text/html'
		);

		const nextTemplate = doc.querySelector(
			'.wp-block-soli-masonry .wp-block-post-template'
		);
		const newItems = nextTemplate
			? Array.from( nextTemplate.children ).map( ( node ) =>
					document.importNode( node, true )
			  )
			: [];

		const l = getLocal( root );
		newItems.forEach( ( node ) => l.items.push( node ) );

		// Aim the button at the following page, or retire the whole pagination
		// row once the final batch has arrived.
		const nextAnchor = doc.querySelector(
			'.wp-block-soli-masonry .wp-block-query-pagination-next'
		);
		const nextHref = nextAnchor && nextAnchor.getAttribute( 'href' );
		if ( nextHref ) {
			anchor.setAttribute( 'href', nextHref );
		} else {
			( root.querySelector( '.wp-block-query-pagination' ) || anchor ).remove();
		}

		pack( root, ctx );
		observeImages( root, ctx, newItems );
	} catch ( error ) {
		// Fall back to a full navigation so the user is never stuck.
		window.location.href = url;
	} finally {
		delete anchor.dataset.soliLoading;
		root.classList.remove( 'is-loading-more' );
	}
}

store( 'soli/masonry', {
	callbacks: {
		init() {
			const ctx = getContext();
			const root = getElement().ref;
			pack( root, ctx );

			// Images without intrinsic dimensions change column heights once
			// loaded, so re-pack when they arrive.
			observeImages( root, ctx, [ root ] );

			// Turn the pagination-next link into an append-style load-more.
			const moreLink = root.querySelector(
				'.wp-block-query-pagination-next'
			);
			if ( moreLink ) {
				moreLink.addEventListener( 'click', ( event ) => {
					event.preventDefault();
					loadMore( root, ctx, moreLink );
				} );
			}

			return () => {
				const l = getLocal( root );
				if ( l.timer ) {
					clearTimeout( l.timer );
				}
			};
		},
		onResize() {
			const ctx = getContext();
			const root = getElement().ref;
			schedule( root, ctx );
		},
	},
} );
