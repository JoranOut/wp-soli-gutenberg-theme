/**
 * Soli — playful musical-note click burst.
 *
 * Port of the static mockup's agenda-notes.js: every click anywhere on the page
 * bursts 4–6 musical notes that float up and fade. Colors use the theme palette
 * presets (with mockup hex fallbacks).
 *
 * Unlike the mockup, we bail out entirely under prefers-reduced-motion: the CSS
 * disables the float animation, which would stop `animationend` from firing and
 * leave the note spans piling up invisibly in the DOM.
 */
( function () {
	'use strict';

	if (
		window.matchMedia &&
		window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches
	) {
		return;
	}

	var GLYPHS = [ '♪', '♫', '♩', '♬' ];
	var COLORS = [
		'var(--wp--preset--color--maroon, #7a1f2b)',
		'var(--wp--preset--color--gold, #c9a24a)',
		'var(--wp--preset--color--ink, #1a1a2e)',
	];

	// Small LCG so a given click point always bursts the same way (matches mockup).
	var seed = 1;
	function fraction() {
		seed = ( seed * 1103515245 + 12345 ) & 0x7fffffff;
		return seed / 0x7fffffff;
	}
	function rand( min, max ) {
		return min + ( max - min ) * fraction();
	}

	function burst( x, y ) {
		var count = 4 + Math.floor( fraction() * 3 ); // 4–6 notes.
		for ( let i = 0; i < count; i++ ) {
			// Block-scoped so each note's removal closure captures its own element.
			const note = document.createElement( 'span' );
			note.className = 'soli-note';
			note.setAttribute( 'aria-hidden', 'true' );
			note.textContent = GLYPHS[ Math.floor( fraction() * GLYPHS.length ) ];
			note.style.left = x + 'px';
			note.style.top = y + 'px';
			note.style.color = COLORS[ Math.floor( fraction() * COLORS.length ) ];
			note.style.fontSize = 16 + Math.floor( fraction() * 16 ) + 'px';
			note.style.setProperty( '--dx', Math.round( rand( -70, 70 ) ) + 'px' );
			note.style.setProperty( '--dy', Math.round( rand( -140, -80 ) ) + 'px' );
			note.style.setProperty( '--dr', Math.round( rand( -40, 40 ) ) + 'deg' );
			note.style.animationDelay = i * 40 + 'ms';

			const remove = function () {
				if ( note.parentNode ) {
					note.parentNode.removeChild( note );
				}
			};
			note.addEventListener( 'animationend', remove );
			// Safety net in case animationend never fires.
			window.setTimeout( remove, 1600 );

			document.body.appendChild( note );
		}
	}

	document.addEventListener( 'click', function ( event ) {
		// Seed from the click point so the burst is deterministic per location.
		seed =
			( ( Math.round( event.clientX ) * 73856093 ) ^
				( Math.round( event.clientY ) * 19349663 ) ) &
			0x7fffffff;
		if ( seed === 0 ) {
			seed = 1;
		}
		burst( event.clientX, event.clientY );
	} );
} )();
