<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Dml_Select extends UBP_Lib_Db_Command implements UBP_Lib_Db_Command_Interface_From {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $from = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $select = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $where = null;

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Driver $driver
	* @return UBP_Lib_Db_Command_Ddm_Select
	*/
	public function __construct(UBP_Lib_Db_Driver & $driver = null) {
		// Parent constructor.
		parent::__construct($driver);
		// Create new SELECT CLAUSE object!
		$loader =& $this->getLoader();
		// Get FROM instance.
		$this->select = $loader->getInstanceOf('lib/db/command/dml/select/clause', 'select');
	}

	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$select = (string) $this->select;
		if (!$select) {
			throw new UBP_Lib_Db_Command_Dml_Select_Exception_Emptyfieldlist($this->select);
		}
		// Get FROM clause.
		if ($this->from)  {
			$select .= (string) $this->from();
		}
		// Get WHERE clause.
		if ($this->where)  {
			$select .= (string) $this->where();
		}
		return $select;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function exec() {
		
	}

	/**
	* put your comment there...
	* 
	* @return UBP_Lib_Db_Command_Ddm_Select_Clause_From
	*/
	public function & from() {
		// Get FROM instance only if not yet created!
		if (!$this->from)  {
			// Get laoder.
			$loader =& $this->getLoader();
			// Get FROM instance.
			$this->from = $loader->getInstanceOf('lib/db/command/clause', 'from');
		}
		return $this->from;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function select() {
		return $this->select;
	}

	/**
	* put your comment there...
	* 
	* @return UBP_Lib_Db_Command_Clause_Where
	*/
	public function & where() {
		// Get WHERE instance only if not yet created!
		if (!$this->where)  {
			// Get laoder.
			$loader =& $this->getLoader();
			// Get FROM instance.
			$this->where = $loader->getInstanceOf('lib/db/command/clause', 
																																			'where',
																																			array($this)
			);
		}
		return $this->where;
	}

} // End class.