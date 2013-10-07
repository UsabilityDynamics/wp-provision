<?php
/**
 * -
 *
 * @module WP_Provision
 * @namespace WP_Provision
 * @author: potanin@UD
 */
namespace WP_Provision {

  /**
   * -
   *
   * @class Core
   * @author: potanin@UD
   */
  class Core {

    /**
     * Textdomain String
     *
     * @public
     * @property text_domain
     * @var string
     */
    public static $text_domain = 'WP_Provision';

    /**
     * Plugin Path
     *
     * @public
     * @property path
     * @var string
     */
    public static $path = null;

    /**
     * Plugin URL
     *
     * @public
     * @property url
     * @var string
     */
    public static $url = null;

    /**
     * Singleton Instance Reference.
     *
     * @public
     * @static
     * @property $instance
     * @type {Object}
     */
    public static $instance;

    /**
     * Core constructor.
     *
     * @for WP_Provision_Core
     * @author potanin@UD
     * @since 0.1.0
     */
    public function __construct() {

      // Set Variables
      self::$path = untrailingslashit( plugin_dir_path( __FILE__ ) );
      self::$url  = untrailingslashit( plugin_dir_url( __FILE__ ) );

      // Add Settings Page
      add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );

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
      add_filter( 'plugin_action_links', array( __CLASS__, 'plugin_action_links' ), 10, 2 );

      // Settings page.
      add_options_page( __( 'Provision', WP_Provision_Locale ), __( 'Provision', WP_Provision_Locale ), 'manage_options', 'wp-provision', function () {
        // include( WP_Provision_Path . '/core/ui/settings.php' );
      } );

      //** Make Property Featured Via AJAX */
      if( isset( $_REQUEST[ '_wpnonce' ] ) ) {
        if( wp_verify_nonce( $_REQUEST[ '_wpnonce' ], 'wp-provision-settings' ) ) {
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

      if( $file == 'wp-provision/wp-provision.php' ) {
        array_unshift( $links, '<a href="' . admin_url( 'options-general.php?page=wp-provision' ) . '">' . __( 'Settings' ) . '</a>' ); // before other links
      }

      return $links;

    }

    /**
     * Get the WP-Provision Singleton
     *
     * Concept based on the CodeIgniter get_instance() concept.
     *
     * @example
     *
     *      var settings = WP_Provision::get_instance()->Settings;
     *      var api = WP_Provision::$instance()->API;
     *
     * @static
     * @return object
     *
     * @method get_instance
     * @for WP_Provision
     */
    public static function &get_instance() {
      return self::$instance;
    }

  }

}