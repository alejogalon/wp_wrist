<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WBC_Front_Scripts')) {
    class WBC_Front_Scripts
    {
        public function __construct() {

            if (!is_admin()) {
                add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
                add_action('wp_enqueue_scripts', array($this, 'load_styles'));
                add_action('wp_enqueue_scripts', array($this, 'load_new_styles'));
            }
        }


        public function load_scripts() {
            if (!is_page('order-now') && !is_page('new-order-now') && !is_page('breast-cancer-awareness-wristbands') && !is_page('order-now-lead')) return;
            wp_register_script('jquery-ui-widget_js', WBC_ASSETS_URL . '/js/vendor/jquery-fileupload/vendor/jquery.ui.widget.js', array('jquery'), WBC_VERSION, true);
            wp_register_script('jquery-xdr-transport_js', WBC_ASSETS_URL . '/js/vendor/jquery-fileupload/cors/jquery.xdr-transport.js', array('jquery'), WBC_VERSION, true);
            wp_register_script('jquery-iframe-transport_js', WBC_ASSETS_URL . '/js/vendor/jquery-fileupload/jquery.iframe-transport.js', array('jquery'), WBC_VERSION, true);
            wp_register_script('jquery-fileupload_js', WBC_ASSETS_URL . '/js/vendor/jquery-fileupload/jquery.fileupload.js', array('jquery'), WBC_VERSION, true);
            wp_register_script('ddslick_js', WBC_ASSETS_URL . '/js/vendor/jquery.ddslick.min.js', array('jquery'), WBC_VERSION, true);
            wp_register_script('pablo_js', WBC_ASSETS_URL . '/js/vendor/pablo.js', array('jquery'), WBC_VERSION, true);
            wp_register_script('mustache_js', WBC_ASSETS_URL . '/js/vendor/mustache.min.js', array('jquery'), WBC_VERSION, true);
            wp_register_script('wristbandData_js', WBC_ASSETS_URL . '/js/wristbandData.js', array('jquery'), WBC_VERSION, true);

            // wp_register_script('rgbcolor_js', WBC_ASSETS_URL . '/js/rgbcolor.js', array('jquery'), WBC_VERSION, true);
            // wp_register_script('canvg_js', WBC_ASSETS_URL . '/js/canvg.js', array('jquery'), WBC_VERSION, true);

            //wp_register_script('wristband_js', WBC_ASSETS_URL . '/js/wristband.js', array('jquery'), true);
            wp_enqueue_script( 'wristband_js', get_stylesheet_directory_uri() . '/wristband/assets/js/wristband.js?14' );




            wp_enqueue_script('jquery-ui-widget_js');
            wp_enqueue_script('jquery-iframe-transport_js');
            wp_enqueue_script('jquery-fileupload_js');
            wp_enqueue_script('ddslick_js');
            wp_enqueue_script('pablo_js');
            wp_enqueue_script('mustache_js');
            wp_enqueue_script('wristbandData_js');

            // wp_enqueue_script('rgbcolor_js');
            //  wp_enqueue_script('canvg_js');

            //wp_enqueue_script('wristband_js');

            // var_dump($GLOBALS['wbc_settings']);

            wp_localize_script('wristband_js', 'WBC', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'settings' => isset($GLOBALS['wbc_settings']) ? $GLOBALS['wbc_settings'] : array(),
            ));

            wp_enqueue_script('override', WBC_ASSETS_URL . '/js/override.js', array('jquery'), WBC_VERSION, true); 
            //wp_enqueue_script('font_adjustments', WBC_ASSETS_URL . '/js/font_adjustments.js', array('jquery'), WBC_VERSION, true);
        }


        public function load_styles() {
            // if (!is_page('order-now')) return;
            if (!is_page('order-now') && !is_page('new-order-now') && !is_page('long-order-now') && !is_page('order-now-lead')) return;
            wp_register_style('google_font_style', 'https://fonts.googleapis.com/css?family=Asset|Press+Start+2P|Diplomata|Diplomata+SC|Ultra|Syncopate|Corben|Shojumaru|Gravitas+One|Holtwood+One+SC|Delius+Unicase|Sonsie+One|Nosifer|Krona+One|Plaster|Chango|Geostar+Fill|Goblin+One|Revalia|Ewert|Geostar|Arbutus', array(), WBC_VERSION);
            // wp_register_style('jquery-file-upload_style', WBC_ASSETS_URL . '/css/vendor/jquery-fileupload/jquery.fileupload.css', array(), WBC_VERSION);
            wp_register_style('wristband_style', WBC_ASSETS_URL . '/css/wristband.css', array(), WBC_VERSION);
            wp_register_style('list_of_fonts', WBC_ASSETS_URL . '/css/font.css', array(), WBC_VERSION);

            wp_enqueue_style('google_font_style');
            wp_enqueue_style('jquery-file-upload_style');
            wp_enqueue_style('wristband_style');
            wp_enqueue_style('list_of_fonts');


        }

        public function load_new_styles() {
            if ( !is_page('customize') ) return;
            wp_register_style('google_font_style', 'https://fonts.googleapis.com/css?family=Asset|Press+Start+2P|Diplomata|Diplomata+SC|Ultra|Syncopate|Corben|Shojumaru|Gravitas+One|Holtwood+One+SC|Delius+Unicase|Sonsie+One|Nosifer|Krona+One|Plaster|Chango|Geostar+Fill|Goblin+One|Revalia|Ewert|Geostar|Arbutus', array(), WBC_VERSION);
            wp_register_style('list_of_fonts', WBC_ASSETS_URL . '/css/font.css', array(), WBC_VERSION);

            wp_enqueue_style('google_font_style');
            wp_enqueue_style('list_of_fonts');
        }

    }
}

new WBC_Front_Scripts();
