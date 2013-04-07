<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Driver {
	
	/**
	* Tables name prefix.
	*/
	const TABLE_PREFIX = 'ubp_';
	
	/**
	* put your comment there...
	* 
	* @var WPDB
	*/
	protected $wpdb;
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		// Refernce to Wordpress database object.
		$this->wpdb =& $GLOBALS['wpdb'];
	}
	
	/**
	* put your comment there...
	* 
	* @param String|Array Array os statements or String statements dilimited by Simecolon
	* 							or absolute File Path or Scripts content.
	* @return UBP_Lib_Db_Driver Returning $this.
	*/
	public function batchExec($statements) {
		// Load from scripts file.
		if (is_file($statements)) {
			$statements = UBP_Lib_Filesystem_File::getInstance($statements)->readAll();
		}
		// Get statements array if string provided.
		if (!is_array($statements)) {
			$statements = $statements ? explode(';', $statements) : array();
		}
	 // Process.
	 foreach ($statements as $statement) {
	 	 // Avoid 'DB empty statement warning' caused by
		 // extra dilimiter that might be added at the EOF.
		 $this->exec($statement);
	 }
	 // Chaining.
	 return $this;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $statement
	*/
	public function exec($statement) {
		// Simply call Wordpress query method.
		$this->wpdb->query($statement);
		// Chaining.
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getTablePrefix() {
		// Initialize.
		$prefix = array();
		$prefix['wp'] = $this->wpdb->prefix;
		$prefix['ubp'] = self::TABLE_PREFIX;
		// Concat all prefixes.
		return implode('', $prefix);
	}

} // End class.