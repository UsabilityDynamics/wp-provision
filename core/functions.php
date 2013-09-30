<?php
/**
 * General Resize.ly Options
 *
 * @class Functions
 * @author: potanin@UD
 */
namespace WP_Provision {

  /**
   * General Resize.ly Options
   *
   * @class Functions
   * @author: potanin@UD
   */
  class Functions {

    /**
     * Get options object.
     *
     * @for Functions
     * @author potanin@UD
     * @return array|mixed
     */
    static function options() {
      $options = json_decode( get_option( 'wp-provision' ) );

      foreach ( (array) $options as $key => $option ) {

        // Convert booleans
        if ( $option === 'true' ) {
          $options->{$key} = true;
        }

        // Convert booleans
        if ( $option === 'false' ) {
          $options->{$key} = false;
        }

      }

      // die( print_r( $options ) );

      return $options;

    }

    /**
     * Activate Plugin.
     *
     * @todo Does not seem to trigger. -potanin@UD
     * @for Functions
     * @author potanin@UD
     */
    static function activation() {
      update_option( 'wp-provision-version', WP_Provision_Version );
    }

    /**
     * Deactivate Plugin
     *
     * @for Functions
     * @author potanin@UD
     */
    static function deactivation() {
    }

  }
}