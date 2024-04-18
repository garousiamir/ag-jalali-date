<?php
if (!defined('ABSPATH')) {
    die; // Cannot access directly.
}

class AG_Jalali_Date_Internationalization {

    public function __construct() {
        add_action('plugins_loaded', array($this, 'load_textdomain'));
    }

    public function load_textdomain() {
        load_plugin_textdomain('ag-jalali-date', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }
}

// Instantiate the class
new AG_Jalali_Date_Internationalization();
