<?php
/**
* Plugin Name: Uninterrupted Backup Plugin
* Plugin URI:
* Author: Ahmed Said
* Author URI: http://urp.longestvision.com
* Description: XXX
* Version: 0.1
* License: GPL2
*/

// Import pre-load constants.
require_once 'defines.inc.php';

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP {

	/**
	* 
	*/
	const FILE = __FILE__;
		
	/**
	* 
	*/
	const NAME = 'UBP';

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected static $accesspoints = array(
		array('name' => 'setup'),
		array('name' => 'error'),
		array('name' => 'backup')
	);
	
	/**
	* put your comment there...
	* 
	*/
	public static function main() {
		// Take no action until Wordpress running on production!
		// @TODO: Work only with WP_DEBUG = false.
		if (!WP_DEBUG || 1) {
			// Auto load UBP classes!
			require_once 'lib/classloader/classloader.php';
			$loader = UBP_Lib_Classloader::getInstance(null, dirname(__FILE__), self::NAME);
			// Controllers to be always loaded!
			foreach (self::$accesspoints as $accesspoint) {
				$name = $accesspoint['name'];
				// Access Point class name from name.
				self::$accesspoints[$name]['instance'] = $loader->getInstanceOf('accesspoint', $name)
																									->bind();
			}
		}
	}

} // End class.

// Action!
UBP::main();