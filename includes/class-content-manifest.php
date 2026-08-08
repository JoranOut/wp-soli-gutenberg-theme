<?php
/**
 * The site's content manifest: which pages, groups and demo posts exist.
 *
 * Single source of truth for both the wp-admin setup screen and bin/setup.sh
 * (which calls into Site_Initializer via `wp eval`). Data only — no side
 * effects — so it stays cheap to load on every request.
 *
 * @package Soli_Gutenberg_Theme
 * @since 0.1.0
 */

namespace Soli\GutenbergTheme;

defined( 'ABSPATH' ) || exit;

/**
 * Declarative description of the Soli site structure.
 *
 * @since 0.1.0
 */
final class Content_Manifest {

	/**
	 * Serialized markup for a theme pattern reference.
	 *
	 * @param string $name Pattern slug without the theme namespace.
	 * @return string Block markup.
	 */
	public static function pattern( string $name ): string {
		return '<!-- wp:pattern {"slug":"soli-gutenberg-theme/' . $name . '"} /-->';
	}

	/**
	 * Closing paragraph shared by every stub page.
	 *
	 * @return string Block markup.
	 */
	public static function contact_note(): string {
		return '<!-- wp:paragraph --><p>Vragen? Mail <a href="mailto:opleidingen@soli.nl">opleidingen@soli.nl</a> of loop binnen bij een repetitie in het Soli Muziekcentrum in Driehuis.</p><!-- /wp:paragraph -->';
	}

	/**
	 * A stub page body: one factual sentence plus the contact pointer.
	 *
	 * Every URL the theme links to gets at least this, so no funnel path
	 * (lid worden, boeken, lessen, steun) dead-ends in a 404.
	 *
	 * @param string $intro Intro sentence, may contain inline HTML.
	 * @return string Block markup.
	 */
	public static function stub( string $intro ): string {
		return '<!-- wp:paragraph --><p>' . $intro . '</p><!-- /wp:paragraph -->' . self::contact_note();
	}

	/**
	 * Ordered page definitions.
	 *
	 * Order matters: a page listed as another page's `parent` must come first,
	 * and the group pages must exist before `home` because the home slider bakes
	 * in literal page IDs. Keys: slug, title, parent (slug or ''), template, content.
	 *
	 * The group pages and home are appended separately (see groups() and
	 * home_content()) because both depend on IDs resolved at run time.
	 *
	 * @return array<int, array<string, string>> Page definitions.
	 */
	public static function pages(): array {
		return array(
			array(
				'slug'     => 'nieuws',
				'title'    => 'Nieuws',
				'parent'   => '',
				'template' => '',
				'content'  => '',
			),
			array(
				'slug'     => 'agenda',
				'title'    => 'Agenda',
				'parent'   => '',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-agenda' ),
			),
			array(
				'slug'     => 'vereniging',
				'title'    => 'Vereniging',
				'parent'   => '',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-vereniging' ),
			),
			array(
				'slug'     => 'mijn-pagina',
				'title'    => 'Mijn Soli',
				'parent'   => '',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-mijn-pagina' ),
			),
			array(
				'slug'     => 'orkesten-en-groepen',
				'title'    => 'Orkesten en groepen',
				'parent'   => '',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-orkesten' ),
			),
			array(
				'slug'     => 'contact',
				'title'    => 'Contact',
				'parent'   => '',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-contact' ),
			),
			array(
				'slug'     => 'privacy',
				'title'    => 'Privacyreglement',
				'parent'   => '',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-privacyreglement' ),
			),
			array(
				'slug'     => 'lessen',
				'title'    => 'Muzieklessen',
				'parent'   => '',
				'template' => '',
				'content'  => self::stub( 'Bij Soli volg je muziekles op elk niveau: van blokfluitklas en opstapklas tot een volwaardige HaFaBra-opleiding met professionele docenten. Bekijk alle opleidingsgroepen bij <a href="/orkesten-en-groepen/">Orkesten en groepen</a>.' ),
			),
			array(
				'slug'     => 'steun',
				'title'    => 'Steun Soli',
				'parent'   => '',
				'template' => '',
				'content'  => self::stub( 'Soli draait op leden, vrijwilligers en vrienden. Steun de vereniging als <a href="/vereniging/vrienden-van-soli/">Vriend van Soli</a> of met een gift.' ),
			),
			array(
				'slug'     => 'bestuur',
				'title'    => 'Bestuur',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-bestuur' ),
			),
			array(
				'slug'     => 'eregalerij',
				'title'    => 'Eregalerij',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-eregalerij' ),
			),
			array(
				'slug'     => 'muziekcentrum',
				'title'    => 'Muziekcentrum',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-muziekcentrum' ),
			),
			array(
				'slug'     => 'instrumenten',
				'title'    => 'Instrumenten',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-instrumenten' ),
			),
			array(
				'slug'     => 'jat',
				'title'    => 'JAT',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-jat' ),
			),
			array(
				'slug'     => 'lidmaatschap',
				'title'    => 'Lidmaatschap',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-lidmaatschap' ),
			),
			array(
				'slug'     => 'muzieklessen',
				'title'    => 'Muzieklessen',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-muzieklessen' ),
			),
			array(
				'slug'     => 'muziek-op-schoot',
				'title'    => 'Muziek op Schoot',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-muziek-op-schoot' ),
			),
			array(
				'slug'     => 'pr-en-boekingen',
				'title'    => 'PR en Boekingen',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-pr-boekingen' ),
			),
			array(
				'slug'     => 'vrienden-van-soli',
				'title'    => 'Vrienden van Soli',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-vrienden-van-soli' ),
			),
			array(
				'slug'     => 'in-veilige-handen',
				'title'    => 'In veilige handen',
				'parent'   => 'vereniging',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-veilige-handen' ),
			),
			array(
				'slug'     => 'vacatures',
				'title'    => 'Gezocht!',
				'parent'   => 'orkesten-en-groepen',
				'template' => 'page-canvas',
				'content'  => self::pattern( 'page-gezocht' ),
			),
		);
	}

	/**
	 * Orchestras and groups, in the order they appear in the home slider.
	 *
	 * Each group has its own content-filled pattern (page-group-{slug}); the
	 * rehearsal chip matches the times printed on the group page itself. The
	 * image is a demo photo and is only applied by the demo seeding step.
	 *
	 * @return array<int, array<string, string>> Group definitions.
	 */
	public static function groups(): array {
		return array(
			array(
				'slug'      => 'harmonie-orkest',
				'title'     => 'Harmonie orkest',
				'rehearsal' => 'di · 19:30',
				'image'     => 'groepen/concert.jpg',
			),
			array(
				'slug'      => 'klein-orkest',
				'title'     => 'Klein Orkest',
				'rehearsal' => 'do · 19:45',
				'image'     => 'groepen/groepsfoto.jpg',
			),
			array(
				'slug'      => 'bigband',
				'title'     => 'Bigband',
				'rehearsal' => 'wo (even weken) · 20:00',
				'image'     => 'bigband.jpg',
			),
			array(
				'slug'      => 'slagwerkgroep',
				'title'     => 'Slagwerkgroep',
				'rehearsal' => 'ma · 20:00',
				'image'     => 'groepsfoto.jpg',
			),
			array(
				'slug'      => 'oud-goud',
				'title'     => 'Oud Goud',
				'rehearsal' => 'wo (oneven weken) · 11:00',
				'image'     => 'groepen/oud-goud.jpg',
			),
			array(
				'slug'      => 'funband',
				'title'     => 'Funband',
				'rehearsal' => '1× per 3 weken',
				'image'     => 'funband.jpg',
				'excerpt'   => 'Gezelligheid en muzikaliteit hoog in het vaandel: van Amsterdamse Medley tot Happy Hardcore.',
			),
			array(
				'slug'      => 'marsorkest',
				'title'     => 'Marsorkest',
				'rehearsal' => '1× per 4 weken · wo',
				'image'     => 'groepen/marsorkest.jpg',
			),
			array(
				'slug'      => 'kerstensembles',
				'title'     => 'Kerstensembles',
				'rehearsal' => 'rond de kerst',
				'image'     => 'groepen/kerst.jpg',
			),
			array(
				'slug'      => 'pietenband',
				'title'     => 'Pietenband',
				'rehearsal' => 'rond Sinterklaas',
				'image'     => 'groepen/groepsfoto.jpg',
			),
			array(
				'slug'      => 'blokfluitklas',
				'title'     => 'Blokfluitklas',
				'rehearsal' => 'do · 18:00',
				'image'     => 'groepen/blokfluit.jpg',
			),
			array(
				'slug'      => 'slagwerkklas',
				'title'     => 'Slagwerkklas',
				'rehearsal' => 'ma-avond',
				'image'     => 'groepen/slagwerkklas.jpg',
			),
			array(
				'slug'      => 'opstapklas',
				'title'     => 'Opstapklas',
				'rehearsal' => 'start 2026/27',
				'image'     => 'trumpet-kids.jpg',
			),
			array(
				'slug'      => 'volwassenen-opstapklas',
				'title'     => 'Volwassenen opstapklas',
				'rehearsal' => 'do · 19:45',
				'image'     => 'groepen/volwassenen.jpg',
			),
			array(
				'slug'      => 'samenspelklas',
				'title'     => 'Samenspelklas',
				'rehearsal' => 'do · 18:45',
				'image'     => 'trumpet-kids.jpg',
			),
			array(
				'slug'      => 'opleidingsorkest',
				'title'     => 'Opleidingsorkest',
				'rehearsal' => 'do · 18:30',
				'image'     => 'groepen/groepsfoto.jpg',
			),
			array(
				'slug'      => 'stil-orkest',
				'title'     => 'Stil Orkest',
				'rehearsal' => 'op aanvraag',
				'image'     => 'groepen/stil-orkest.jpg',
			),
			array(
				'slug'      => 'twirlteam',
				'title'     => 'TwirlTeam',
				'rehearsal' => 'wo · 18:30',
				'image'     => 'group-bandstand.jpg',
			),
		);
	}

	/**
	 * Home page body, with the slider filled from the seeded group pages.
	 *
	 * @param array<string, int> $group_ids Group slug => page ID.
	 * @return string Block markup.
	 */
	public static function home_content( array $group_ids ): string {
		$cards = '';
		foreach ( self::groups() as $group ) {
			if ( empty( $group_ids[ $group['slug'] ] ) ) {
				continue;
			}
			$cards .= sprintf(
				'<!-- wp:soli/group-card {"pageId":%d,"rehearsal":"%s"} /-->',
				(int) $group_ids[ $group['slug'] ],
				$group['rehearsal']
			);
		}

		$content  = self::pattern( 'hero-concert' );
		$content .= self::pattern( 'home-welcome' );
		$content .= self::pattern( 'home-agenda-teaser' );
		$content .= '<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"cream","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}}} -->';
		$content .= '<section class="wp-block-group alignfull has-cream-background-color has-background" style="padding-top:80px;padding-bottom:80px">';
		$content .= '<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->';
		$content .= '<div class="wp-block-group alignwide">';
		$content .= '<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->';
		$content .= '<div class="wp-block-group">';
		$content .= '<!-- wp:heading --><h2 class="wp-block-heading">Van harmonie tot bigband, van opstapklas tot TwirlTeam.</h2><!-- /wp:heading -->';
		$content .= '<!-- wp:paragraph {"className":"soli-lead"} --><p class="soli-lead">Bij Soli vindt iedereen een plek, van je allereerste noten in de opleiding tot spelen in een van onze eindorkesten.</p><!-- /wp:paragraph -->';
		$content .= '</div><!-- /wp:group -->';
		$content .= '<!-- wp:buttons --><div class="wp-block-buttons">';
		$content .= '<!-- wp:button {"className":"is-style-outline-maroon"} --><div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="/orkesten-en-groepen/">Alle orkesten en groepen →</a></div><!-- /wp:button -->';
		$content .= '</div><!-- /wp:buttons -->';
		$content .= '</div><!-- /wp:group -->';
		$content .= '<!-- wp:soli/group-slider -->';
		$content .= $cards;
		$content .= '<!-- /wp:soli/group-slider -->';
		$content .= '</section><!-- /wp:group -->';
		$content .= self::pattern( 'home-news' );
		$content .= self::pattern( 'cta-booking' );

		return $content;
	}

	/**
	 * Demo news posts from the mockup, newest first.
	 *
	 * Keys: slug, title, date, excerpt, content, template, image.
	 *
	 * @return array<int, array<string, string>> Post definitions.
	 */
	public static function news_posts(): array {
		$moment = '<!-- wp:paragraph --><p>In deze lessen worden liedjes aangeboden die aansluiten bij de ontwikkeling van een kindje.</p><!-- /wp:paragraph -->';
		$schoot = 'In deze lessen worden liedjes aangeboden die aansluiten bij de fysieke en cognitieve ontwikkeling van een kindje.';

		return array(
			array(
				'slug'     => 'oud-goud-bij-het-bloemencorso',
				'title'    => 'Oud Goud bij het bloemencorso',
				'date'     => '2026-04-16 14:00:00',
				'excerpt'  => 'Een mooie muzikale omlijsting van het Bloemencorso door ons seniorenorkest.',
				'content'  => self::pattern( 'post-content-photo-report' ),
				'template' => 'single-fotoverslag',
				'image'    => 'group-bandstand.jpg',
			),
			array(
				'slug'    => 'hobby-markt-in-de-krant',
				'title'   => 'Hobby Markt in de krant',
				'date'    => '2026-04-16 10:00:00',
				'excerpt' => 'Muziekvereniging Soli zit, na lang door Velsen te hebben gezworven, vijftig jaar in haar muziekcentrum aan het Kerkpad.',
				'content' => '<!-- wp:paragraph --><p>Muziekvereniging Soli zit, na lang door Velsen te hebben gezworven, vijftig jaar in haar muziekcentrum aan het Kerkpad.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'dubbelconcert-met-kunst-na-arbeid',
				'title'   => 'Succesvol Dubbelconcert Oudenbossche Harmonie en Soli Harmonie',
				'date'    => '2026-04-11 20:00:00',
				'excerpt' => 'Zaterdagavond 11 april was er een dubbelconcert van onze harmonie en de Oudenbossche Harmonie in het Soli Muziekcentrum.',
				'content' => '<!-- wp:paragraph --><p>Voor de pauze speelde het Klein Orkest, na de pauze volgde het Harmonie orkest samen met de Oudenbossche Harmonie.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'winter-opleidingenconcert-soli',
				'title'   => 'Winter opleidingenconcert Soli',
				'date'    => '2026-01-25 15:00:00',
				'excerpt' => 'Luister naar de muzikanten in opleiding van muziekvereniging Soli.',
				'content' => '<!-- wp:paragraph --><p>Kom luisteren naar de muzikanten in opleiding van muziekvereniging Soli in het Soli Muziekcentrum.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'harmonie-soli-op-concours',
				'title'   => 'Harmonie Soli op concours, zaterdag 8 november',
				'date'    => '2025-11-02 12:00:00',
				'excerpt' => 'Het harmonieorkest van Soli gaat op concours op 8 november. Ze komt uit in de 1e divisie Harmonie. Kom je?',
				'content' => '<!-- wp:paragraph --><p>Het harmonieorkest van Soli gaat op concours op 8 november en komt uit in de 1e divisie Harmonie.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'soli-bedankt-rabobank-clubsupporters',
				'title'   => 'Soli bedankt Rabobank Clubsupporters',
				'date'    => '2025-10-13 12:00:00',
				'excerpt' => 'Op dinsdag 7 oktober ontving muziekvereniging Soli een fraaie cheque van de Rabobank Clubsupport. Wij bedanken onze supporters!',
				'content' => '<!-- wp:paragraph --><p>Op dinsdag 7 oktober ontving muziekvereniging Soli een fraaie cheque van de Rabobank Clubsupport.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'blokfluitcursus-voor-kinderen-start-2-oktober',
				'title'   => 'Blokfluitcursus voor kinderen (beginners) start 2 oktober',
				'date'    => '2025-10-01 12:00:00',
				'excerpt' => 'Op donderdag 2 oktober gaat Soli van start met een blokfluitcursus voor kinderen. De cursus duurt tot eind januari.',
				'content' => '<!-- wp:paragraph --><p>Op donderdag 2 oktober gaat Soli van start met een blokfluitcursus voor kinderen (beginners).</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'     => 'open-dag-14-september',
				'title'    => 'Open dag 14 september!',
				'date'     => '2025-09-07 12:00:00',
				'excerpt'  => 'Muziekvereniging Soli en Dansstudio Jolein openen samen de deuren. Heb je altijd al muziek willen maken of willen dansen? Of heb je vroeger gespeeld en wil je de draad weer oppakken? Kom langs!',
				'content'  => self::pattern( 'post-content-announcement' ),
				'template' => 'single-aankondiging',
			),
			array(
				'slug'    => 'bigband-soli-opent-summerpark-sessions',
				'title'   => 'Bigband Soli opent Summerpark Sessions op zondag',
				'date'    => '2025-09-07 10:00:00',
				'excerpt' => 'Op zondag 7 september opende de bigband van Soli het programma van Summerpark Sessions in Velserbeek. Het was het debuut van...',
				'content' => '<!-- wp:paragraph --><p>Op zondag 7 september opende de bigband van Soli het programma van de Summerpark Sessions in Velserbeek.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'muziek-op-schoot-vrijdag-les-4',
				'title'   => 'Muziek op schoot vrijdag les 4',
				'date'    => '2025-08-31 12:00:00',
				'excerpt' => $schoot,
				'content' => $moment,
			),
			array(
				'slug'    => 'muziek-op-schoot-les-3',
				'title'   => 'Muziek op schoot les 3',
				'date'    => '2025-08-22 12:00:00',
				'excerpt' => $schoot,
				'content' => $moment,
			),
			array(
				'slug'    => 'diplomas-gehaald',
				'title'   => 'Diploma\'s gehaald!!',
				'date'    => '2025-06-21 12:00:00',
				'excerpt' => 'We feliciteren Florian, Pauline, Helma, Mirthe, Kaitlyn, Maaike, Rozemarijn, Megan en Oukje, want vandaag hebben zij hun diploma gehaald.',
				'content' => '<!-- wp:paragraph --><p>We feliciteren onze leerlingen die vandaag in het cultuurhuis hun diploma hebben gehaald.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'vg-concert-bigband-soli-koperkwintet-ottone',
				'title'   => 'VG Concert Bigband Soli & Koperkwintet Ottone 30 maart',
				'date'    => '2025-03-28 12:00:00',
				'excerpt' => 'Een swingend concert van Bigband Soli samen met Koperkwintet Ottone op 30 maart.',
				'content' => '<!-- wp:paragraph --><p>Bigband Soli en Koperkwintet Ottone geven op 30 maart samen een concert.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'nl-doet-2025',
				'title'   => 'NL Doet 2025',
				'date'    => '2025-03-07 12:00:00',
				'excerpt' => 'Doe mee met NL Doet bij Soli en maak het verschil! Op zaterdag 15 maart 2025 steken we samen de handen uit de mouwen.',
				'content' => '<!-- wp:paragraph --><p>Doe mee met NL Doet bij Soli op zaterdag 15 maart 2025.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'gezocht-dirigent-klein-orkest-soli',
				'title'   => 'Gezocht: dirigent Klein Orkest Soli',
				'date'    => '2024-11-24 12:00:00',
				'excerpt' => 'Muziekvereniging Soli is opgericht in februari 1909 en gevestigd in Driehuis/Velsen. De vereniging zoekt een dirigent voor het Klein Orkest.',
				'content' => '<!-- wp:paragraph --><p>Muziekvereniging Soli zoekt een dirigent voor het Klein Orkest.</p><!-- /wp:paragraph -->',
			),
			array(
				'slug'    => 'vg-sessions-young',
				'title'   => 'VG-Sessions Young',
				'date'    => '2024-10-16 12:00:00',
				'excerpt' => 'Leuk evenement voor jeugd en hun ouders. 20 oktober van 14.30-17.00 in het Solimuziekcentrum: Samenspelklas, Twirlteam, slagwerkklas en...',
				'content' => '<!-- wp:paragraph --><p>Leuk evenement voor jeugd en hun ouders op 20 oktober in het Soli Muziekcentrum.</p><!-- /wp:paragraph -->',
			),
		);
	}
}
