#!/usr/bin/env bash
#
# wp-env afterStart lifecycle script.
# Activates the theme and seeds demo content on both the dev (cli)
# and the tests (tests-cli) environments. Idempotent: safe to re-run.

set -e

setup_env() {
	local env="$1" # "cli" or "tests-cli"

	wp-env run "$env" -- wp theme activate wp-soli-gutenberg-theme
	wp-env run "$env" -- wp option update blogname 'Muziekvereniging Soli'
	wp-env run "$env" -- wp option update blogdescription 'sinds 1909'
	wp-env run "$env" -- wp rewrite structure '/blog/%year%/%monthnum%/%day%/%postname%/' --hard

	# Helper: create a page once (by slug) with pattern-based content and
	# an optional block template (theme.json customTemplates slug).
	create_page() {
		local slug="$1" title="$2" content="$3" parent="${4:-0}" template="${5:-}"
		local existing
		existing=$(wp-env run "$env" -- wp post list --post_type=page --name="$slug" --field=ID --posts_per_page=1 | tr -d '[:space:]')
		if [ -z "$existing" ]; then
			existing=$(wp-env run "$env" -- wp post create --post_type=page --post_status=publish \
				--post_name="$slug" --post_title="$title" --post_parent="$parent" --post_content="$content" --porcelain | tail -n1 | tr -d '[:space:]')
			if [ -n "$template" ]; then
				wp-env run "$env" -- wp post meta update "$existing" _wp_page_template "$template" > /dev/null
			fi
		fi
		echo "$existing"
	}

	local nieuws orkesten home
	local group_content='<!-- wp:pattern {"slug":"soli-gutenberg-theme/page-group"} /-->'

	nieuws=$(create_page 'nieuws' 'Nieuws' '' | tail -n1 | tr -d '[:space:]')
	create_page 'agenda' 'Agenda' '<!-- wp:pattern {"slug":"soli-gutenberg-theme/page-agenda"} /-->' 0 'page-canvas' > /dev/null
	create_page 'vereniging' 'Vereniging' '<!-- wp:pattern {"slug":"soli-gutenberg-theme/page-vereniging"} /-->' 0 'page-canvas' > /dev/null
	create_page 'mijn-pagina' 'Mijn Soli' '<!-- wp:pattern {"slug":"soli-gutenberg-theme/page-mijn-pagina"} /-->' 0 'page-canvas' > /dev/null
	orkesten=$(create_page 'orkesten-en-groepen' 'Orkesten en groepen' '<!-- wp:pattern {"slug":"soli-gutenberg-theme/page-orkesten"} /-->' 0 'page-canvas' | tail -n1 | tr -d '[:space:]')

	# Helper: give a page a featured image from the theme's demo photos (once).
	set_featured() {
		local page_id="$1" image="$2"
		local thumb
		thumb=$(wp-env run "$env" -- wp post meta get "$page_id" _thumbnail_id 2>/dev/null | tr -d '[:space:]')
		if [ -z "$thumb" ] || [ "$thumb" = "0" ]; then
			wp-env run "$env" -- wp media import \
				"wp-content/themes/wp-soli-gutenberg-theme/assets/images/demo/$image" \
				--post_id="$page_id" --featured_image --porcelain > /dev/null
		fi
	}

	# All orchestras/groups from the mockup slider: slug|title|rehearsal|demo image.
	local groups=(
		'harmonie-orkest|Harmonie orkest|ma · 20:00|groepen/concert.jpg'
		'klein-orkest|Klein Orkest|wo · 19:45|groepen/groepsfoto.jpg'
		'bigband|Bigband|do · 20:15|bigband.jpg'
		'slagwerkgroep|Slagwerkgroep|di · 19:30|groepsfoto.jpg'
		'oud-goud|Oud Goud|wo · 10:00|groepen/oud-goud.jpg'
		'funband|Funband|1× per 3 weken|funband.jpg'
		'marsorkest|Marsorkest|op afspraak|groepen/marsorkest.jpg'
		'kerstensembles|Kerstensembles|rond de kerst|groepen/kerst.jpg'
		'pietenband|Pietenband|rond Sinterklaas|groepen/groepsfoto.jpg'
		'blokfluitklas|Blokfluitklas|wo · 15:30|groepen/blokfluit.jpg'
		'slagwerkklas|Slagwerkklas|in overleg|groepen/slagwerkklas.jpg'
		'opstapklas|Opstapklas|di · 18:30|trumpet-kids.jpg'
		'volwassenen-opstapklas|Volwassenen opstapklas|ma · 19:00|groepen/volwassenen.jpg'
		'samenspelklas|Samenspelklas|wo · 18:30|trumpet-kids.jpg'
		'opleidingsorkest|Opleidingsorkest|vr · 18:45|groepen/groepsfoto.jpg'
		'stil-orkest|Stil Orkest|op uitnodiging|groepen/stil-orkest.jpg'
		'twirlteam|TwirlTeam|za · 10:00|group-bandstand.jpg'
	)

	# Funband gets a fully written page (content + real contact details) and a
	# subtitle; the other groups start from the generic group starter pattern.
	local funband_content='<!-- wp:pattern {"slug":"soli-gutenberg-theme/page-group-funband"} /-->'
	local funband_excerpt='Gezelligheid en muzikaliteit hoog in het vaandel — van Amsterdamse Medley tot Happy Hardcore.'

	local group_cards='' entry slug title rehearsal image page_id content
	for entry in "${groups[@]}"; do
		IFS='|' read -r slug title rehearsal image <<< "$entry"
		if [ "$slug" = "funband" ]; then
			content="$funband_content"
		else
			content="$group_content"
		fi
		page_id=$(create_page "$slug" "$title" "$content" "$orkesten" 'page-group' | tail -n1 | tr -d '[:space:]')
		set_featured "$page_id" "$image"
		if [ "$slug" = "funband" ]; then
			wp-env run "$env" -- wp post update "$page_id" --post_excerpt="$funband_excerpt" > /dev/null
		fi
		group_cards+="<!-- wp:soli/group-card {\"pageId\":$page_id,\"rehearsal\":\"$rehearsal\"} /-->"
	done

	# Home: the page-home pattern sections, with the slider filled with the
	# seeded group pages so the demo shows a working carousel.
	local home_content
	home_content='<!-- wp:pattern {"slug":"soli-gutenberg-theme/hero-concert"} /-->'
	home_content+='<!-- wp:pattern {"slug":"soli-gutenberg-theme/home-welcome"} /-->'
	home_content+='<!-- wp:pattern {"slug":"soli-gutenberg-theme/home-agenda-teaser"} /-->'
	home_content+='<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"cream","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}}} -->'
	home_content+='<section class="wp-block-group alignfull has-cream-background-color has-background" style="padding-top:80px;padding-bottom:80px">'
	home_content+='<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->'
	home_content+='<div class="wp-block-group alignwide">'
	home_content+='<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->'
	home_content+='<div class="wp-block-group">'
	home_content+='<!-- wp:paragraph {"className":"soli-eyebrow"} --><p class="soli-eyebrow">Een vereniging voor iedereen</p><!-- /wp:paragraph -->'
	home_content+='<!-- wp:heading --><h2 class="wp-block-heading">Van harmonie tot bigband, van opstapklas tot TwirlTeam.</h2><!-- /wp:heading -->'
	home_content+='<!-- wp:paragraph {"className":"soli-lead"} --><p class="soli-lead">Bij Soli vindt iedereen een plek — van je allereerste noten in de opleiding tot spelen in een van onze eindorkesten.</p><!-- /wp:paragraph -->'
	home_content+='</div><!-- /wp:group -->'
	home_content+='<!-- wp:buttons --><div class="wp-block-buttons">'
	home_content+='<!-- wp:button {"className":"is-style-outline-maroon"} --><div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="/orkesten-en-groepen/">Alle orkesten en groepen →</a></div><!-- /wp:button -->'
	home_content+='</div><!-- /wp:buttons -->'
	home_content+='</div><!-- /wp:group -->'
	home_content+='<!-- wp:soli/group-slider -->'
	home_content+="$group_cards"
	home_content+='<!-- /wp:soli/group-slider -->'
	home_content+='</section><!-- /wp:group -->'
	home_content+='<!-- wp:pattern {"slug":"soli-gutenberg-theme/home-news"} /-->'
	home_content+='<!-- wp:pattern {"slug":"soli-gutenberg-theme/social-row"} /-->'
	home_content+='<!-- wp:pattern {"slug":"soli-gutenberg-theme/cta-booking"} /-->'
	home=$(create_page 'home' 'Home' "$home_content" | tail -n1 | tr -d '[:space:]')

	# Static front page + posts page.
	wp-env run "$env" -- wp option update show_on_front 'page'
	wp-env run "$env" -- wp option update page_on_front "$home"
	wp-env run "$env" -- wp option update page_for_posts "$nieuws"

	# Remove the default "Hello world!" sample post.
	local hello
	hello=$(wp-env run "$env" -- wp post list --post_type=post --name=hello-world --post_status=any --field=ID | tr -d '[:space:]')
	if [ -n "$hello" ]; then
		wp-env run "$env" -- wp post delete "$hello" --force > /dev/null
	fi

	# Helper: create a post once (by slug), dated to match the mockup's news feed.
	create_post() {
		local slug="$1" title="$2" date="$3" excerpt="$4" content="$5"
		local existing
		existing=$(wp-env run "$env" -- wp post list --post_type=post --post_status=any --name="$slug" --field=ID --posts_per_page=1 | tr -d '[:space:]')
		if [ -z "$existing" ]; then
			existing=$(wp-env run "$env" -- wp post create --post_type=post --post_status=publish \
				--post_name="$slug" --post_title="$title" --post_date="$date" \
				--post_excerpt="$excerpt" --post_content="$content" --porcelain | tail -n1 | tr -d '[:space:]')
		fi
		echo "$existing"
	}

	# News posts from the mockup (newest first gets the home feature card image).
	local latest
	latest=$(create_post 'oud-goud-bij-het-bloemencorso' 'Oud Goud bij het bloemencorso' '2026-04-16 14:00:00' \
		'Een mooie muzikale omlijsting van het Bloemencorso door ons seniorenorkest.' \
		'<!-- wp:paragraph --><p>Woensdag had ons seniorenorkest “Oud Goud” een optreden — een mooie muzikale omlijsting van het Bloemencorso.</p><!-- /wp:paragraph -->' | tail -n1 | tr -d '[:space:]')
	set_featured "$latest" 'group-bandstand.jpg'
	create_post 'hobby-markt-in-de-krant' 'Hobby Markt in de krant' '2026-04-16 10:00:00' \
		'Muziekvereniging Soli zit, na lang door Velsen te hebben gezworven, vijftig jaar in haar muziekcentrum aan het Kerkpad.' \
		'<!-- wp:paragraph --><p>Muziekvereniging Soli zit, na lang door Velsen te hebben gezworven, vijftig jaar in haar muziekcentrum aan het Kerkpad.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'dubbelconcert-met-kunst-na-arbeid' 'Succesvol Dubbelconcert Oudenbossche Harmonie en Soli Harmonie' '2026-04-11 20:00:00' \
		'Zaterdagavond 11 april was er een dubbelconcert van onze harmonie en de Oudenbossche Harmonie in het Soli Muziekcentrum.' \
		'<!-- wp:paragraph --><p>Voor de pauze speelde het Klein Orkest, na de pauze volgde het Harmonie orkest samen met de Oudenbossche Harmonie.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'winter-opleidingenconcert-soli' 'Winter opleidingenconcert Soli' '2026-01-25 15:00:00' \
		'Luister naar de muzikanten in opleiding van muziekvereniging Soli.' \
		'<!-- wp:paragraph --><p>Kom luisteren naar de muzikanten in opleiding van muziekvereniging Soli in het Soli Muziekcentrum.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'harmonie-soli-op-concours' 'Harmonie Soli op concours, zaterdag 8 november' '2025-11-02 12:00:00' \
		'Het harmonieorkest van Soli gaat op concours op 8 november. Ze komt uit in de 1e divisie Harmonie. Kom je?' \
		'<!-- wp:paragraph --><p>Het harmonieorkest van Soli gaat op concours op 8 november en komt uit in de 1e divisie Harmonie.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'soli-bedankt-rabobank-clubsupporters' 'Soli bedankt Rabobank Clubsupporters' '2025-10-13 12:00:00' \
		'Op dinsdag 7 oktober ontving muziekvereniging Soli een fraaie cheque van de Rabobank Clubsupport. Wij bedanken onze supporters!' \
		'<!-- wp:paragraph --><p>Op dinsdag 7 oktober ontving muziekvereniging Soli een fraaie cheque van de Rabobank Clubsupport.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'blokfluitcursus-voor-kinderen-start-2-oktober' 'Blokfluitcursus voor kinderen (beginners) start 2 oktober' '2025-10-01 12:00:00' \
		'Op donderdag 2 oktober gaat Soli van start met een blokfluitcursus voor kinderen. De cursus duurt tot eind januari.' \
		'<!-- wp:paragraph --><p>Op donderdag 2 oktober gaat Soli van start met een blokfluitcursus voor kinderen (beginners).</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'open-dag-14-september' 'Open dag 14 september!' '2025-09-07 12:00:00' \
		'Persbericht open dag 22 september 2025: Muziekvereniging Soli en dansstudio Jolein houden open dag op 14 september.' \
		'<!-- wp:paragraph --><p>Kom langs, luister en probeer zelf een instrument uit tijdens de open dag op 14 september.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'bigband-soli-opent-summerpark-sessions' 'Bigband Soli opent Summerpark Sessions op zondag' '2025-09-07 10:00:00' \
		'Op zondag 7 september opende de bigband van Soli het programma van Summerpark Sessions in Velserbeek. Het was het debuut van...' \
		'<!-- wp:paragraph --><p>Op zondag 7 september opende de bigband van Soli het programma van de Summerpark Sessions in Velserbeek.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'muziek-op-schoot-vrijdag-les-4' 'Muziek op schoot vrijdag les 4' '2025-08-31 12:00:00' \
		'In deze lessen worden liedjes aangeboden die aansluiten bij de fysieke en cognitieve ontwikkeling van een kindje.' \
		'<!-- wp:paragraph --><p>In deze lessen worden liedjes aangeboden die aansluiten bij de ontwikkeling van een kindje.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'muziek-op-schoot-les-3' 'Muziek op schoot les 3' '2025-08-22 12:00:00' \
		'In deze lessen worden liedjes aangeboden die aansluiten bij de fysieke en cognitieve ontwikkeling van een kindje.' \
		'<!-- wp:paragraph --><p>In deze lessen worden liedjes aangeboden die aansluiten bij de ontwikkeling van een kindje.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'diplomas-gehaald' 'Diploma'"'"'s gehaald!!' '2025-06-21 12:00:00' \
		'We feliciteren Florian, Pauline, Helma, Mirthe, Kaitlyn, Maaike, Rozemarijn, Megan en Oukje, want vandaag hebben zij hun diploma gehaald.' \
		'<!-- wp:paragraph --><p>We feliciteren onze leerlingen die vandaag in het cultuurhuis hun diploma hebben gehaald.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'vg-concert-bigband-soli-koperkwintet-ottone' 'VG Concert Bigband Soli & Koperkwintet Ottone 30 maart' '2025-03-28 12:00:00' \
		'Een swingend concert van Bigband Soli samen met Koperkwintet Ottone op 30 maart.' \
		'<!-- wp:paragraph --><p>Bigband Soli en Koperkwintet Ottone geven op 30 maart samen een concert.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'nl-doet-2025' 'NL Doet 2025' '2025-03-07 12:00:00' \
		'Doe mee met NL Doet bij Soli en maak het verschil! Op zaterdag 15 maart 2025 steken we samen de handen uit de mouwen.' \
		'<!-- wp:paragraph --><p>Doe mee met NL Doet bij Soli op zaterdag 15 maart 2025.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'gezocht-dirigent-klein-orkest-soli' 'Gezocht: dirigent Klein Orkest Soli' '2024-11-24 12:00:00' \
		'Muziekvereniging Soli is opgericht in februari 1909 en gevestigd in Driehuis/Velsen. De vereniging zoekt een dirigent voor het Klein Orkest.' \
		'<!-- wp:paragraph --><p>Muziekvereniging Soli zoekt een dirigent voor het Klein Orkest.</p><!-- /wp:paragraph -->' > /dev/null
	create_post 'vg-sessions-young' 'VG-Sessions Young' '2024-10-16 12:00:00' \
		'Leuk evenement voor jeugd en hun ouders. 20 oktober van 14.30 – 17.00 in het Solimuziekcentrum: Samenspelklas, Twirlteam, slagwerkklas en...' \
		'<!-- wp:paragraph --><p>Leuk evenement voor jeugd en hun ouders op 20 oktober in het Soli Muziekcentrum.</p><!-- /wp:paragraph -->' > /dev/null
}

setup_env cli
setup_env tests-cli
