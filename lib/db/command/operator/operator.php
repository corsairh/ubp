<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Command_Operator extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var UBP_Lib_Db_Command_Clause_Where_Expression
	*/
	protected $command = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @param mixed $value
	* @return UBP_Lib_Db_Command_Operator_Equal
	*/
	public function __construct(UBP_Lib_Db_Command_Interface_From $command) {
		$this->command = $command;
	}
	
	/**
	* put your comment there...
	* 
	* @param Array $operands
	* @return Array Escaped operands
	*/
	protected function escapeOperands($operands) {
		// Initialize.
		$value = '';
		/**
		* Get Command object reference.
		* 
		* @var UBP_Lib_Db_Command_Interface_From
		*/
		$command =& $this->getCommand();
		$alias = (string) $this->getAlias();
		$property = $this->getProperty();
		/**
		* Get Source DBO to fetch field name and value from.
		* 
		* @var UBP_Lib_Db_Command_Clause_From
		*/
		$fromClause =& $command->from();
		/**
		* Get source DBO to fetch property value from.
		* @TODO The source must be not only table however it should implement 'get' and 'set'!!
		* @var UBP_Lib_Db_Table
		*/
		$sourceDBO = $fromClause->getSource($alias)->getDBO();
		$value = $sourceDBO->get($property);
		// ESCAPE and QUOTES string values!
		if (is_string($value)) {
			// Get Database driver.
			$dbDriver =& $this->getCommand()->getDBDriver();
			// Escape string.
			$dbDriver->escape($value);
			// Quote it!
			$dbDriver->quote($value);
		}
		return $value;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getCommand() {
		return $this->command;
	}
	
} // End class.