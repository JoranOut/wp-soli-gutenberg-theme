#!/usr/bin/env bash
#
# wp-env afterStart lifecycle script.
# Activates the theme and seeds demo content on both the dev (cli)
# and the tests (tests-cli) environments. Idempotent: safe to re-run.
#
# The page structure and demo content themselves live in PHP
# (includes/class-content-manifest.php) and are applied through the theme's
# WP-CLI commands, so this script, the wp-admin setup screen (Weergave →
# Soli setup) and any SSH run all create exactly the same site.

set -e

setup_env() {
	local env="$1" # "cli" or "tests-cli"

	wp-env run "$env" -- wp theme activate wp-soli-gutenberg-theme
	wp-env run "$env" -- wp language core install nl_NL --activate
	wp-env run "$env" -- wp option update blogname 'Muziekvereniging Soli'
	wp-env run "$env" -- wp option update blogdescription 'sinds 1909'
	wp-env run "$env" -- wp rewrite structure '/blog/%year%/%monthnum%/%day%/%postname%/' --hard

	# Pages, hierarchy, templates, front page and posts page.
	wp-env run "$env" -- wp soli init-pages

	# Demo photos and the mockup news archive. Local only — the e2e suite
	# asserts against this content, so it must run on the tests env too.
	wp-env run "$env" -- wp soli seed-demo
}

setup_env cli
setup_env tests-cli
