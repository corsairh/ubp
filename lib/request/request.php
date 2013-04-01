<?php
/**
* 
*/

/**
* 
*/
class UBP_Lib_Request {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $get;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected static $instances = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $post;
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		// GET parameters.
		$this->get = is_array($_GET) ? $_GET : array();		
		// Assign POST parameters if available.
		$this->post = ($_SERVER['REQUEST_METHOD'] == 'POST') ? $_POST : array();
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @param mixed $type
	*/
	public function get($name, $type = 'get') {
		// Get request array.
		$rParams = $this->{$type};
		return isset($rParams[$name]) ? $rParams[$name] : null;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @return UBP_Lib_Request
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
	
} // End class.
