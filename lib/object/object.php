<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		return $this->getClass();
	}
  
  /**
  * put your comment there...
  * 
  * @param mixed $method
  * @param mixed $params
  */
	public static function callStatic(UBP_Lib_Object & $object, $method, $params) {
		// Get $this class name.
		$className = $object->getClass();
		// Call method staicly through the class.
		return call_user_func_array(array($className, $method), $params);
	}

	/**
	* put your comment there...
	* 
	*/
	public function getClass() {
		return get_class($this);
	}

	/**
	* Get class file name.
	* 
	*/
	public function getClassFileName() {
		// Get class components.
		$components = $this->getLoader()->getClassNamePathComponent($this);
		// Concat File name with extension.
		$fileName = "{$components->file}.{$components->extension}";
		return $fileName;
	}
	
	/**
	* Get class file name without the extension part.
	* 
	*/
	public function getClassName() {
		// Get class name from current instance.
		return $this->getLoader()->getClassNamePathComponent($this)->file;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getLoader() {
		return UBP_Lib_Classloader::getInstance();
	}
	
} // End class.