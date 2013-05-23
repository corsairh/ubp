<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Clause_From extends UBP_Lib_Object {
	
	/**
	* 
	*/
	const JOIN_LEFT = 'LEFT';

	/**
	* 
	*/
	const JOIN_RIGHT = 'RIGHT';

	/**
	* 
	*/
	const JOIN_OUTTER = 'OUTTER';
	
	/**
	* 
	*/
	const JOIN_INNER = 'INNER';
	
	/**
	* 
	*/
	const REL_APPEND = ',';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $defauktJoinType = self::JOIN_LEFT;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $sources = array();
	
	/**
	* put your comment there...
	* 
	* @param mixed $defJoinType
	* @return UBP_Lib_Db_Command_Select_Tables
	*/
	public function __construct($defJoinType = null) {
		// Get default join type only if specified.
		!$defJoinType OR ($this->defauktJoinType = $defJoinType);
	}

	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$sources =& $this->getSourcesList();
		// Must be at least on source added!
		if (empty($sources)) {
			throw new UBP_Lib_Db_Command_Dml_Select_Clause_From_Exception_Emptysources();
		}
		// Build from clause.
		$from = ' FROM ';	
		// Get all sources, concatenate them with the specified relations.
		foreach ($this->sources as $identifier => $source) {
			// Get DBO souce name.
			$sourceName = (string) $source->getDBO();
			// Use the identifier only if its not the same as the DBOSourceName.
			$identifier = ($identifier != $sourceName) ? " {$identifier}" : '';
			// One source done!
			$from .= "{$sourceName}{$identifier}";
		}
		return $from;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $table
	* @param mixed $type
	*/
	public function add(& $dbo, $alias = '', $relType = null) {
		// Get DBO identifier.
		$identifier = (string) $dbo;
		// If no identifier passed get a HASH from dbo object name.
		if (!$alias) {  
			$alias = $identifier;
			// Full query passed without identifier!
			if (strlen($alias) > 50) {
				throw new UBP_Lib_Db_Command_Select_Clause_From_Exception_Invalidalias($alias);
			}
		}
		// Add new soure!
		if (isset($this->dbos[$alias])) {
			  throw new UBP_Lib_Db_Command_Select_Clause_From_Exception_Aliasalreadyexists($alias);
		}
		// Get loader!
		$loader =& $this->getLoader();
		/**
		* 
		* @var UBP_Lib_Db_Command_Dml_Select_Clause_From_Struct_Source
		*/
		$source = $loader->getInstanceOf('lib/db/command/clause/from/struct', 
																														'source',
																														array($dbo, $alias, $relType)
		);
		// Store in the list.
		$this->sources[$alias] = $source;
		// Chaining!
		return $this;
	}

	/**
	* Get source by alias name.
	* 
	* @param mixed $alias
	*/
	public function getSource($alias) {
		if (!isset($this->sources[$alias])) {
			throw new UBP_Lib_Db_Command_Clause_From_Exception_Sourcenotfound($alias);
		}
		return $this->sources[$alias];
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getSourcesList() {
		return $this->sources;	
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $table
	* @param mixed $type
	*/
	public function join(& $dbo, $identifier = '', $joinType = null) {
		// If a join reltation specified add 'JOIN' term to it!
		return $this->add($dbo, $identifier, "{$joinType} JOIN");
	}
	
} // End class.