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

// Include bootstrap.
include_once( __DIR__ . '/lib/class-bootstrap.php' );

// Initialize.
new WP_Provision\Bootstrap();