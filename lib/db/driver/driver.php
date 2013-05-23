<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Driver extends UBP_Lib_Object {
	
	/**
	* Tables name prefix.
	*/
	const OBJECT_PREFIX = 'ubp_';
	
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
	* Get command class instance.
	* 
	* @param mixed $type
	* @param mixed $name
	* @param mixed $parameters
	*/
	public function createCommand($namespace, $name, $parameters = null) {
		// Initialize.
		$loader = $this->getLoader();
		// Add DbDriver (this) as the first parameter!
		if (!is_array($parameters)) {
			$parameters = array();
		}
		array_unshift($parameters, $this);
		// Instantiate command class.
		$absNamespace = "lib/db/command/{$namespace}";
		// Get command class instance.
		return $loader->getInstanceOf($absNamespace, $name, $parameters);
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function escape(& $value) {
		// Use Wordpress for escaping!
		$this->wpdb()->escape_by_ref($value);
		// Chaining.
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function escapeField($name) {
		return "`{$name}`";
	}

	/**
	* put your comment there...
	* 
	* @param String Database object name.
	*/
	public function getDBOPrefix($object = '') {
		// Initialize.
		$prefix = array();
		$prefix['wp'] = $this->wpdb->prefix;
		$prefix['ubp'] = self::OBJECT_PREFIX;
		$prefix['object'] = $object;
		// Concat all prefixes.
		return implode('', $prefix);
	}

	/**
	* Execute/Query The database engine server.
	* 
	* @param String The query to be executed.
	* @return Boolean|Array TRUE for statments that
	* 																		doesn't has resultset retuned or Array otherwise.
	* @exception UBP_Lib_Db_Driver_Exception_Queryerror
	*/
	public function query($query) {
		// Simply call Wordpress query method.
		if (($result = $this->wpdb->query($query)) === FALSE) {
			throw new UBP_Lib_Db_Driver_Exception_Queryerror($query);
		}
		// Chaining.
		return $result;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function quote(& $value) {
		$value = "'{$value}'";
	}

	/**
	* Get Wordpress Database object instance
	* that build up current Driver object!
	* 
	* @return 
	*/
	public function wpdb() {
		return $this->wpdb;
	}
} // End class.