<?php
/**
 * General WP-Provision Utility
 *
 * @class Utility
 * @author: potanin@UD
 */
namespace UsabilityDynamics\Provision {

  /**
   * General WP-Provision Utility
   *
   * @class Utility
   * @author: potanin@UD
   */
  class Utility extends \UsabilityDynamics\Utility {

    /**
     * Get options object.
     *
     * @for Utility
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

      return $options;

    }

  }
}