<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Controller_Install extends UBP_Lib_Mvc_Controller {
	
	/**
	* put your comment there...
	* 
	*/
	public function installAction() {
		// Initialize.
		$loader =& $this->getLoader();
		$dbDriver = $loader->getInstanceOf('lib/db', 'driver');
		/// Install Database tables. ///
		// Get all table classes and call 'create' method.
		$tablesClass = $loader->getDirectoryClasses('table');
		foreach ($tablesClass as $tableClass) {
			// Load Table definition from the XML file.
			$tblDefinition = UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table::loadFromClassFile($tableClass);
			// Create the table.
			$cmdCreate = $dbDriver->createCommand('ddl/create', 'table', array($tblDefinition));
			$cmdCreate->exec();
		}
		// Get Plugin settings.
		$loader->getInstanceOf('setting', 'application')
		// Create settings var with current version number set.
								->setVersionNumber()
		// Save/Create settings option.
								->save();
	}

} // End class.