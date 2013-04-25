<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Command_Ddl extends UBP_Lib_Db_Command {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $dbo;
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Table $table
	* @return UBP_Lib_Db_Command_Ddl_Create
	*/
	public function __construct(UBP_Lib_Db_Driver $driver, UBP_Lib_Db_Dbo $dbo) {
		// Initialize base.
		parent::__construct($driver);
		// Initialize.
		$this->dbo =& $dbo;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getDBO() {
		return $this->dbo;
	}

} // End class