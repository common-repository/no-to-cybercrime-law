<?php
/**
 *  * @package No to Cybercrime Law
 *   */
/*
 * Plugin Name: No to Cybercrime Law
 * Plugin URI: https://github.com/mikkogozalo/no-to-cybercrime-law
 * Description: Cybercrime Law protest initiated by BAND
 * Version: 1.0.0
 * Author: Mikko Gozalo
 * Author URI: http://mikkogozalo.blogspot.com
 * License: GPLv2
 * */

/*
 * This program is free software; you can redistribute it and/or modify 
 * it under the terms of the GNU General Public License as published by 
 * the Free Software Foundation; version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
 * GNU General Public License for more details. 
 *
 * You should have received a copy of the GNU General Public License 
 * along with this program; if not, write to the Free Software 
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA 
 * */

define('NO_TO_CYBERCRIME_LAW_JS_VERSION', '1.0.0');

if ( ! class_exists('No_to_Cybercrime_Instance') ) {

    class No_to_Cybercrime_Instance {

        const JAVASCRIPT_FNAME  = 'notocybercrime.js';
        const CSS_FNAME = 'notocybercrime.css';

        function is_visitor() {
            $timenow = time();
            // must activate on that timeframe
            return ( ! is_admin() && 1358179200 <= $timenow && $timenow <= 1358352000 );
        }

        function enqueue_scripts() {
            $src = plugins_url(self::JAVASCRIPT_FNAME, __FILE__);
            $jquery_cookies = plugins_url('jquery.cookie.js', __FILE__);
            $css = plugins_url(self::CSS_FNAME, __FILE__);

            if (self::is_visitor()) {
                wp_enqueue_style('notocybercrime_css', $css);
                wp_enqueue_script('jquery');
                wp_enqueue_script('jquerycookie', $jquery_cookies);
                wp_enqueue_script('notocybercrime', $src);
            }
        }
    }
}

add_action('wp_enqueue_scripts', array('No_to_Cybercrime_Instance','enqueue_scripts'), 11);
