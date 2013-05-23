<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Dbo_Definition_Field extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $type = null;
	
	/**
	* put your comment there...
	*                                                                
	* @param mixed $name
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type $type
	* @return UBP_Lib_Db_Dbo_Definition_Field
	*/
	public function __construct($name, UBP_Lib_Db_Dbo_Definition_Table_Field_Type & $type) {
		// Set name.
		$this->name = $name;
		// Set field TYPE!
		$this->setType($type);
	}
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Field
	* @param UBP_Lib_Db_Dbo_Definition_Field
	* @return void
	*/
	public static function copy($src, $des) {
		/* Nothing here for now */
	}

	/**
	* put your comment there...
	* 
	*/
	public function getName() {
		return $this->name;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getType() {
		return $this->type;
	}
	
	/**
	* put your comment there...
	*                                                     
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type $type
	*/
	public function setType(UBP_Lib_Db_Dbo_Definition_Table_Field_Type & $type) {
		// Set.
		$this->type = $type;
		// Chain.
		return $this;
	}
	
} // End class.