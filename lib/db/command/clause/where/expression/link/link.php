<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Clause_Where_Expression_Link extends UBP_Lib_Db_Command_Clause_Where_Expression {

	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$link = '';
		// Get operator string.
		$operator = (string) $this->getOperator();
		// NO operator mean that the current LINK object is 
		// the last link in the linked list and should stop moving forward 
		// into the 'NEXT' chain.
		if ($operator) {
			// Get next content.
			$next = (string) $this->getNext();
			// It must has next content to be linked with!
			if (!$next) {
				throw new UBP_Lib_Db_Command_Clause_Where_Link_Exception_Invalidnextoperator($this->next);
			}
			$link = " {$operator} {$next}";
		}
		return $link;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $property
	* @param mixed $expressionId
	*/
	public function and_() {
		// Initialize..
		$loader =& $this->getLoader();
		$command =& $this->getCommand();
		// Instantiate new equal operator object.
		$this->operator = $loader->getInstanceOf('lib/db/command/operator/logical', 'and', array($command));
		// Create link if not already created.
		if (!$this->getNext()) {
			$this->next = $loader->getInstanceOf('lib/db/command/clause/where/expression', 'operator', array($command));
		}
		// Chaining.
		return $this->next;
	}

} // End class.