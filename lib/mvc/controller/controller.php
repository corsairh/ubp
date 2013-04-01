<?php
/**
* 
*/

/**
* 
*/
class UBP_Lib_Mvc_Controller {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $request;
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		// Instantiate new request object for the controller.
		$this->request =& UBP_Lib_Request::getInstance();
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $action
	*/
	public function doAction($action) {
		// Simple action dispatching!
		$this->response = $this->{$action}();
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function & getModel($name = null) {
		// Initialize!
		static $models = array();
		$loader =& UBP_Lib_Classloader::getInstance();
		// Defaults.
		if (!$name) {
			$name = $loader->getClassNamePathComponent($this)->file;
		}
		// Get cached or create one!
		$models[$name] = !isset($models[$name]) ? $loader->getInstanceOf('model', $name) :
																																								$models[$name];
		return $models[$name];
	}
	
} // End class.
