<?php
/*
 * Plugin Name:       Frontend login
 * Plugin URI:        https://joseluisolivar.co/plugins/the-basics/
 * Description:       Login and Singup Form 
 * Version:           1.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Jose Luis Olivar
 * Author URI:        https://.joseluisolivar.co/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       yardsale
 */
/* Generate a CONST */

define("FRONT_PATH", plugin_dir_path(__FILE__));

/* API REST */
require_once FRONT_PATH . "/includes/api/api-register.php";
require_once FRONT_PATH . "/includes/api/api-login.php";

/* Shortcode */
require_once FRONT_PATH . "/public/shortcode/form-register.php";
require_once FRONT_PATH . "/public/shortcode/form-login.php";


/* Add role */
function frontPluginActivation()
{
  add_role("client", "Client", "read_post");
}

register_activation_hook(__FILE__, "frontPluginActivation");

function frontPluginDesactivation()
{
  remove_role("client");
}

register_deactivation_hook(__FILE__, "frontPluginDesactivation");
