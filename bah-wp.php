<?php
/*
 * Plugin Name:       BAH WordPress Plugin
 * Plugin URI:        https://github.com/tdeck/bah-wp-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Troy Deck
 * Author URI:        https://github.com/tdeck
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (! defined( 'WPINC' )) {
	die;
}

if (!defined('BAHWP_LOGS_TABLE')) {
    define('BAHWP_LOGS_TABLE', $wpdb->prefix . 'bahwp_logs');
}

function bahwp_register_options() {
    add_options_page('BAH Plugin Settings', 'BAH Plugin', 'manage_options', 'bahwp-options', 'bahwp_options_page');

    add_option('bahwp_mailgun_key', '');
    add_option('bahwp_record_bounces', 0);

    register_setting('bahwp_bounce_options', 'bahwp_mailgun_key');
    register_setting('bahwp_bounce_options', 'bahwp_record_bounces');

    add_settings_section('bahwp_bounce_options', 'Bounces', '', 'bahwp-options');
}

function bahwp_options_page() {
    ?>
        <div class="wrap">
            <?php screen_icon ?>
            <h2>BAH WordPress Plugin Settings</h2>
            <?php do_settings_sections('bahwp-options'); ?>
            <?php submit_button(); ?>
        </div>
    <?php
}

add_action('admin_menu', 'bahwp_register_options');
