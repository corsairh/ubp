<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Ddl_Create_Table extends UBP_Lib_Db_Command_Ddl_Create {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $syntxFormat= null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $driver
	* @param UBP_Lib_Db_Dbo_Definition_Table $tblDefinition
	* @param mixed $syntxFormat
	* @return UBP_Lib_Db_Command_Ddl_Create_Table
	*/
	public function __construct($driver, UBP_Lib_Db_Dbo_Definition_Table $tblDefinition, $syntxFormat = null) {
		// Initialize parent.
		parent::__construct($driver, $tblDefinition);
		// Default syntax format.
		if ($syntxFormat == null) {
			$syntxFormat = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Formatter_Simple();
		}
		$this->syntxFormat = $syntxFormat;
	}

	/**
	* Build command query.
	* 
	*/
	public function __toString() {
		// Initialize.
		$driver =& $this->getDriver();
		$tblDefinition =& $this->getTableDefinition();
		$tblName = $tblDefinition->getName();
		$synxFormat =& $this->syntxFormat;
		// Copy passed definition to SQL writer table definition for 
		// generating the create command!
		$sqlWriter = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table($driver, $tblName, $synxFormat);
		// Copy to SQL writer.
		UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table::copy($tblDefinition, $sqlWriter);
		// Build table definition.
		// Build CREATE TABLE statement.
		$query = "CREATE TABLE IF NOT EXISTS {$sqlWriter}";
		// Return string query!
		return $query;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getTableDefinition() {
		return $this->getDefinition();
	}

} // End class.
