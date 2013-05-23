<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Clause_Where extends UBP_Lib_Db_Command_Clause_Where_Expression_Operator {
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$where = '';
		// Get where clause string from parent operator classes chain!
		$operatorsChain = parent::__toString();
		if (!$operatorsChain) {
			throw new UBP_Lib_Db_Command_Clause_Where_Exception_Zeroexpressions();
		}
		// Build full WHERE clause.
		$where = " WHERE {$operatorsChain}";
		// Return full where CLAUSE!
		return $where;
	}

} // End class.