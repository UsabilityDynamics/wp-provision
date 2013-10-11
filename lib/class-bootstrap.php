<?php
/**
 * Boostrap.
 *
 * @module WP_Provision
 * @namespace WP_Provision
 * @author: potanin@UD
 */
namespace UsabilityDynamics\Provision {

  /**
   * Bootstrap the plugin in WordPress.
   *
   * @class Bootstrap
   * @author: potanin@UD
   */
  class Bootstrap {

    /**
     * Singleton Instance Reference.
     *
     * @public
     * @static
     * @property $instance
     * @type {Object}
     */
    public static $instance = false;

    /**
     * Core constructor.
     *
     * @for WP_Provision_Core
     * @author potanin@UD
     * @since 0.1.0
     */
    public function __construct() {

      if( self::$instance ) {
        return self::$instance;
      }

      // Load vendor dependencies
      include_once( '../vendor/autoload.php' );

      // Load core classes
      include_once( 'class-utility.php' );
      include_once( 'class-core.php' );
      include_once( 'class-settings.php' );
      include_once( 'class-ui.php' );

      // Register activation hook.
      register_activation_hook( __FILE__, array( __CLASS__, 'activation' ) );

      // Register activation hook.
      register_deactivation_hook( __FILE__, array( __CLASS__, 'deactivation' ) );

      add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ));

    }

    /**
     * Initiate the plugin.
     *
     * @private
     * @for Bootstrap
     * @method plugins_loaded
     */
    private function plugins_loaded() {
      new WP_Provision\Core;
    }

    /**
     * Activation actions.
     *
     * @public
     * @author potanin@UD
     * @for Bootstrap
     * @method activation
     */
    public static function activation() {}

    /**
     * Deactivation actions.
     *
     * @private
     * @author potanin@UD
     * @for Bootstrap
     * @method deactivation
     */
    public static function deactivation() {}

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
     * @author potanin@UD
     * @method get_instance
     * @for WP_Provision
     */
    public static function &get_instance() {
      return self::$instance;
    }

  }

}