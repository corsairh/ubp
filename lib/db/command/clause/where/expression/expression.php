<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Command_Clause_Where_Expression extends UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @var UBP_Lib_Db_Command_Clause_From
	*/
	protected $command = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $next = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $operator = null;
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Command_Dml_Select $selectCmd
	* @return UBP_Lib_Db_Command_Dml_Select_Clause_Where
	*/
	public function __construct(UBP_Lib_Db_Command_Interface_From $command = null) {
		$this->command = $command;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getCommand() {
		return $this->command;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getNext() {
		return $this->next;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getOperator() {
		return $this->operator;
	}
	
} // End class.