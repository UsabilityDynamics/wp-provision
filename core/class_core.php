<?php
/**
 * -
 *
 * @class WP_Provision_Core
 * @author: potanin@UD
 * @date: 8/17/13
 * @time: 2:06 PM
 * 
 */

class WP_Provision_Core {

  /**
   * Core constructor.
   *
   * @for WP_Provision_Core
   * @author potanin@UD
   * @since 0.1.0
   */
  function WP_Provision_Core() {

    // $options = WP_Provision_Functions::options();

    // Add Settings Page
    add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ));


  }

  /**
   * Administrative Menu.
   *
   * @author potanin@UD
   * @for WP_Provision_Core
   * @since 0.1.0
   */
  static function admin_menu() {

    // Plugin Settings link.
    add_filter('plugin_action_links', array( __CLASS__, 'plugin_action_links'), 10, 2 );

    // Settings page.
    add_options_page( __( 'Resize.ly', WP_Provision_Locale ), __( 'Resize.ly', WP_Provision_Locale ), 'manage_options', 'wp-provision', function() {
      include( WP_Provision_Path . '/core/ui/wp-provision.php' );
    });

    //** Make Property Featured Via AJAX */
    if( isset( $_REQUEST[ '_wpnonce' ] ) ) {
      if( wp_verify_nonce( $_REQUEST[ '_wpnonce' ], 'wp-provision-settings' )) {
        update_option( 'wp-provision', json_encode( $_REQUEST[ 'options' ] ) );
        wp_redirect( admin_url( 'options-general.php?page=wp-provision&updated=true' ) );
      }
    }

  }

  /**
   * Adds "Settings" link to the plugin overview page
   *
   *
   * @author potanin@UD
   * @for WP_Provision_Core
   * @since 0.1.0
   */
  static function plugin_action_links( $links, $file ) {

    if ( $file == 'wp-provision/wp-provision.php' ){
      array_unshift( $links, '<a href="' . admin_url( 'options-general.php?page=wp-provision' ) . '">' . __( 'Settings' ) . '</a>' ); // before other links
    }

    return $links;

  }

}

