<?php
/**
 * General Resize.ly Options
 *
 * @class WP_Provision_Functions
 * @author: potanin@UD
 * @date: 8/17/13
 * @time: 2:06 PM
 * 
 */
class WP_Provision_Functions {

  /**
   * Get options object.
   *
   * @for WP_Provision_Functions
   * @author potanin@UD
   * @return array|mixed
   */
  static function options() {
    $options = json_decode( get_option( 'wp-provision' ) );

    foreach ( (array) $options as $key => $option ) {

      // Convert booleans
      if( $option === 'true' ) {
        $options->{$key} = true;
      }

      // Convert booleans
      if( $option === 'false' ) {
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
   * @for WP_Provision_Functions
   * @author potanin@UD
   */
  static function activation() {
    update_option( 'wp-provision-version', WP_Provision_Version );
  }

  /**
   * Deactivate Plugin
   *
   * @for WP_Provision_Functions
   * @author potanin@UD
   */
  static function deactivation() {}

}