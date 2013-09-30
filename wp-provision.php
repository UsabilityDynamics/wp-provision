<?php
/**
 * Plugin Name: WP-Provision
 * Plugin URI: http://usabilitydynamics.com/products/wp-provision/
 * Description: WordPress site provisioning.
 * Author: Usability Dynamics, Inc.
 * Version: 0.1.1
 * Author URI: http://usabilitydynamics.com
 *
 * Copyright 2013  Usability Dynamics, Inc.    (email : info@usabilitydynamics.com)
 *
 * Created by Usability Dynamics, Inc (website: usabilitydynamics.com       email : info@usabilitydynamics.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 */

// Plugin Version
define( 'WP_Provision_Version', '0.1.1' );

// Path for Includes
define( 'WP_Provision_Path', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

// Clean directory name
define( 'WP_Provision_Directory', basename( __DIR__ ) );

// Path for front-end links
define( 'WP_Provision_URL', untrailingslashit( plugins_url( basename( __DIR__ ) ) ) );

// Locale Name
define( 'WP_Provision_Locale', WP_Provision_Directory );

/** Loads general functions used by WP-crm */
include_once WP_Provision_Path . '/core/functions.php';

/** Loads all the metaboxes for the crm page */
include_once WP_Provision_Path . '/core/core.php';

// Register activation hook.
register_activation_hook( __FILE__, array( 'WP_Provision\Functions', 'activation' ) );

// Register activation hook.
register_deactivation_hook( __FILE__, array( 'WP_Provision\Functions', 'deactivation' ) );

// Initiate the plugin.
add_action( 'plugins_loaded', create_function( '', 'new WP_Provision\Core;' ) );