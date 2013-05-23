<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Clause_From_Struct_Source extends UBP_Lib_Struct {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $alias;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $dbo;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $relation;
	
	/**
	* put your comment there...
	* 
	* @param mixed $dbo
	* @param mixed $identifier
	* @param mixed $alias
	* @param mixed $relation
	* @return UBP_Lib_Db_Command_Dml_Select_Clause_From_Struct_Source
	*/
	public function __construct($dbo, $alias, $relation) {
		$this->dbo = $dbo;
		$this->alias = $alias;
		$this->relation = $relation;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getAlias() {
		return $this->alias;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getDbo() {
		return $this->dbo;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getRelation() {
		return $this->relation;
	}

} // End class.