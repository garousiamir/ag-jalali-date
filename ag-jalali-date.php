<?php
/*
Plugin Name: AG Jalali Date
Description: شمسی سازی تاریخ های وردپرس سازگار با آخرین نسخه وردپرس و نسخه های مدرن پی اچ پی
Version: 1.0
Author: Amirhossein Garousi
Author URI: https://agarousi.com/
Contributors: garousiamir
Tags: شمسی , persian, jalali, shamsi, persiandate
Donate link: https://zarinp.al/garousiamir
Requires at least: 5.8
Tested up to: 6.5.2
Requires PHP: 7.4
Stable tag: 1.0
Text Domain: ag-jalali-date
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) { die; }  // Cannot access directly.

// Make sure to include the Dcter package
require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require_once plugin_dir_path(__FILE__) . 'inc/internationalization.php';

// Use the Dcter package
use HanifHefaz\Dcter\Dcter;

class AG_Jalali_Date{
    public function __construct() {
        // Hook into the 'get_the_date' filter
        add_filter('get_the_date', array($this, 'ag_convert_to_jalali'), 10, 3);
        add_filter('the_date', array($this, 'ag_convert_to_jalali'), 10, 3);
    }

    public function ag_convert_to_jalali($the_date, $d, $post) {
        // Convert the date to Jalali using Dcter
        $jalali_date = Dcter::GregorianToJalali($post->post_date);

        // Return the Jalali date
        return $jalali_date;
    }
}

// Instantiate the class
$wpJalaliDates = new AG_Jalali_Date();