<?php
// Запрет обновления Вордпресс:
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

// Запрет обновления плагинов:
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

// Запрет обновления шаблонов:
remove_action('load-update-core.php','wp_update_themes');
add_filter('pre_site_transient_update_themes',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_update_themes');
