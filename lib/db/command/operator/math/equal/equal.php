<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Operator_Math_Equal extends UBP_Lib_Db_Command_Operator {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $lftOperand = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $rgtOperand = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $expression
	* @param mixed $alias
	* @param mixed $property
	* @return UBP_Lib_Db_Command_Operator_Math_Equal
	*/
	public function __construct(UBP_Lib_Db_Command_Interface_From $command, $lftOperand, $rgtOperand) {
		// Parent initialize.
		parent::__construct($command);
		// Initialize local vars.
		$this->lftOperand = $lftOperand;
		$this->rgtOperand = $rgtOperand;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$operator = '';
		$property = $this->getProperty();
		// Get property value.
		$value = $this->getValue();
		// @TOTO Need an idea to get the database field name from property name!
		// CONCAT.
		$operator = "{$property} = {$value}";
		// Return operator string.
		return $operator;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getLftOperand() {
		return $this->lftOperand;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getRgtOperand() {
		return $this->rgtOperand;
	}

} // End class.