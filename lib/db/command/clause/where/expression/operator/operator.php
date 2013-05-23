<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Clause_Where_Expression_Operator extends UBP_Lib_Db_Command_Clause_Where_Expression {
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$expression = '';
		// Get operator string.
		$operator = (string) $this->getOperator();
		// Get next content only if the operator has string content.
		if (!$operator) {
			throw new UBP_Lib_Db_Command_Clause_Where_Expression_Exception_Emptyoperatorstring($this->operator);
		}		
		// Get NEXT link string
		$nextContent = (string) $this->getNext();
		$expression = "{$operator}{$nextContent}";
		// Return final expression.			
		return $expression;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $property
	* @param mixed $expressionId
	*/
	public function equal($lftOperand, $rgtOperand, $name = null) {
		// Initialize.
		$loader =& $this->getLoader();
		$command =& $this->getCommand();
		// Instantiate new equal operator object.
		$this->operator = $loader->getInstanceOf('lib/db/command/operator/math', 
																																				'equal', 
																																				array($command, $)
		);
		// Create link if not already created.
		if (!$this->getNext()) {
			$this->next = $loader->getInstanceOf('lib/db/command/clause/where/expression', 'link', array($command));
		}
		// Chaining.
		return $this->next;
	}

} // End class.
	