/**
 * soli/group-slider — Interactivity API store.
 *
 * Port of the mockup's soli-slider.js: tiles-per-view is decided by CSS
 * (1–4 across breakpoints); this store measures how many fit, pages by one
 * viewport width and runs the shutter reveal (colored panels close, the
 * track shifts under cover, panels open).
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

const SHUTTER_COLORS = [
	'var(--wp--preset--color--maroon, #7a1f2b)',
	'var(--wp--preset--color--gold, #c9a24a)',
	'var(--wp--preset--color--ink, #1a1a2e)',
	'var(--wp--preset--color--maroon-dark, #5a1620)',
	'var(--wp--preset--color--gold, #c9a24a)',
];
const SHUTTER_ROTATIONS = [ 7, -6, 11, -9, 5, -12 ];

const prefersReducedMotion = () =>
	window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

// Per-slider mutable bits that don't belong in serializable context.
const local = new WeakMap();

function getRoot( ref ) {
	return ref.closest( '.wp-block-soli-group-slider' );
}

function getLocal( root ) {
	if ( ! local.has( root ) ) {
		local.set( root, { timer: null, touchX: null } );
	}
	return local.get( root );
}

function measure( root, ctx ) {
	const viewport = root.querySelector( '.soli-slider-viewport' );
	const tiles = root.querySelectorAll( '.soli-slider-track > *' );
	if ( ! viewport || ! tiles.length ) {
		return;
	}
	const vw = viewport.clientWidth;
	const tileW = tiles[ 0 ].getBoundingClientRect().width || vw;
	ctx.perView = Math.max( 1, Math.round( vw / tileW ) );
	ctx.pageCount = Math.max( 1, Math.ceil( tiles.length / ctx.perView ) );
	if ( ctx.page > ctx.pageCount - 1 ) {
		ctx.page = ctx.pageCount - 1;
	}
}

function place( root, ctx ) {
	const viewport = root.querySelector( '.soli-slider-viewport' );
	const track = root.querySelector( '.soli-slider-track' );
	const tiles = root.querySelectorAll( '.soli-slider-track > *' );
	if ( ! viewport || ! track || ! tiles.length ) {
		return;
	}
	const vw = viewport.clientWidth;
	const maxScroll = Math.max( 0, track.scrollWidth - vw );
	const x = Math.min( ctx.page * vw, maxScroll );
	track.style.transform = `translateX(${ -x }px)`;
	const tileW = tiles[ 0 ].getBoundingClientRect().width || vw;
	ctx.first = Math.round( x / tileW );
	ctx.page1 = ctx.page + 1;
}

function change( root, ctx, page ) {
	if ( ctx.busy || ctx.pageCount < 2 ) {
		return;
	}
	const target = ( page + ctx.pageCount ) % ctx.pageCount;

	// Reduced motion: the shutter transition is disabled in CSS, so its
	// transitionend never fires. Snap straight to the page instead of
	// entering the shutter cycle, which would otherwise freeze the slider
	// (busy never clears, page never advances).
	if ( prefersReducedMotion() ) {
		ctx.page = target;
		place( root, ctx );
		return;
	}

	ctx.busy = true;
	ctx.pending = target;
	ctx.variation++;
	root.style.setProperty(
		'--soli-shutter-color',
		SHUTTER_COLORS[ ctx.variation % SHUTTER_COLORS.length ]
	);
	root.style.setProperty(
		'--soli-shutter-rot',
		SHUTTER_ROTATIONS[ ctx.variation % SHUTTER_ROTATIONS.length ] + 'deg'
	);
	ctx.closing = true;
}

function stopTimer( root ) {
	const l = getLocal( root );
	if ( l.timer ) {
		clearInterval( l.timer );
		l.timer = null;
	}
}

function startTimer( root, ctx ) {
	stopTimer( root );
	if ( ctx.autoplay > 0 ) {
		getLocal( root ).timer = setInterval(
			() => change( root, ctx, ctx.page + 1 ),
			ctx.autoplay
		);
	}
}

const { state } = store( 'soli/group-slider', {
	state: {
		get chipActive() {
			const ctx = getContext();
			return (
				ctx.index >= ctx.first && ctx.index < ctx.first + ctx.perView
			);
		},
	},
	actions: {
		next() {
			const ctx = getContext();
			const root = getRoot( getElement().ref );
			change( root, ctx, ctx.page + 1 );
			startTimer( root, ctx );
		},
		prev() {
			const ctx = getContext();
			const root = getRoot( getElement().ref );
			change( root, ctx, ctx.page - 1 );
			startTimer( root, ctx );
		},
		goToChip() {
			const ctx = getContext();
			const root = getRoot( getElement().ref );
			const page = Math.floor( ctx.index / ctx.perView );
			if ( page !== ctx.page ) {
				change( root, ctx, page );
			}
			startTimer( root, ctx );
		},
		pause() {
			stopTimer( getRoot( getElement().ref ) );
		},
		resume() {
			const ctx = getContext();
			const root = getRoot( getElement().ref );
			startTimer( root, ctx );
		},
	},
	callbacks: {
		init() {
			const ctx = getContext();
			const root = getElement().ref;
			measure( root, ctx );
			place( root, ctx );
			startTimer( root, ctx );
			return () => stopTimer( root );
		},
		onResize() {
			const ctx = getContext();
			const root = getElement().ref;
			measure( root, ctx );
			place( root, ctx );
		},
		onShutterEnd( event ) {
			if (
				event.propertyName !== 'transform' ||
				! event.target.classList.contains( 'top' )
			) {
				return;
			}
			const ctx = getContext();
			const root = getElement().ref;
			if ( ctx.closing ) {
				ctx.page = ctx.pending;
				place( root, ctx ); // Shift while covered.
				ctx.closing = false;
			} else {
				ctx.busy = false;
			}
		},
		onTouchStart( event ) {
			getLocal( getElement().ref ).touchX = event.touches[ 0 ].clientX;
		},
		onTouchEnd( event ) {
			const ctx = getContext();
			const root = getElement().ref;
			const l = getLocal( root );
			if ( l.touchX === null ) {
				return;
			}
			const dx = event.changedTouches[ 0 ].clientX - l.touchX;
			if ( Math.abs( dx ) > 40 ) {
				change( root, ctx, dx < 0 ? ctx.page + 1 : ctx.page - 1 );
				startTimer( root, ctx );
			}
			l.touchX = null;
		},
	},
} );

export default state;
