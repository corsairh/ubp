<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Dbo_Definition extends UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name;

	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @return UBP_Lib_Db_Dbo_Definition_Table
	*/
	public function __construct($name) {
		// Get table name.
		$this->name = $name;
	}
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition $object
	* @param UBP_Lib_Db_Dbo_Definition
	* @return void
	*/
	public static function copy($src, $des) {
		/* Nothing for now! */
	}

  /**
  * put your comment there...
  * 
  */
	public function getName() {
		return $this->name;
	}
	
} // End class.