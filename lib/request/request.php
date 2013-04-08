<?php
/**
* Request parameters class file.
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* Provide access to the request parameters
* via OOP interface.
* 
* @author Ahmed Said.
*/
class UBP_Lib_Request extends UBP_Lib_Object {
	
	/**
	* List of all request objects created via getInstance method.
	* 
	* @var Array
	*/
	protected static $instances = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $register = null;
	
	/**
	* Initialize object instantiation.
	* 
	* Set both GET and POST request parameters.
	* 
	* @return void
	*/
	public function __construct() {
		// Reset!
		$this->reset();
		// GET parameters.
		$this->register['get'] = is_array($_GET) ? $_GET : array();		
		// Assign POST parameters if available.
		$this->register['post'] = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : array();
	}
	
	/**
	* Create new type.
	* 
	* @param mixed $name
	*/
	public function & createRegisterType($type) {
		// Add the new type of the register types array.
		$this->register[$type] = array();
		// Chaining.
		return $this;
	}
	
	/**
	* Get parameter value by the giveen name and type.
	* 
	* @param String Parameter name.
	* @param String get OR post.
	*/
	public function get($name, $type = 'get') {
		// Get request array.
		$rParams = $this->register[$type];
		return isset($rParams[$name]) ? $rParams[$name] : null;
	}
	
	/**
	* Get request object instance by name or create and associate it
	* wih the given name.
	* 
	* @param String Instance name.
	* @return UBP_Lib_Request Request object.
	*/
	public static function & getInstance($name = null) {
		// Fetch if exists!
		if (!isset(self::$instances[$name])) {
			// Only store instances with names, others are treated as unamanaged!!
			$instance = new UBP_Lib_Request();
			if ($name) {
				self::$instances[$name] = $instance;
			}
		}
		else {
			// Read by name!
			$instance = self::$instances[$name];
		}
		return $instance;
	}
	
	/**
	* Completely reseting all request parameters type.
	* 
	* This methdd is useful 
	* 
	* @return UBP_Lib_Request Returning $this.
	*/
	public function reset() {
		// Destroy the exists elements.
		$this->register = array('get' => array(), 'post' => array());
		// Chaining.
		return $this;
	}
	
	/**
	* Update/Add parameter value for request parameter
	* by the given name.
	* 
	* @param String Parameter name.
	* @param String New value.
	* @param String Type to be get OR post.
	* @return UBP_Lib_Request Returning $this.
	*/
	public function set($name, $value, $type = 'get') {
		// Set Request parameter.
		$this->register[$type][$name] = $value;
		// Chaining.
		return $this;
	}
	
} // End class.
