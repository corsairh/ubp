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
		/// Install Database tables. ///
		// Get all table classes and call 'create' method.
		$tablesClass = $loader->getDirectoryClasses('table');
		foreach ($tablesClass as $tableClass) {
			// Instantiate the table.
			$table = $loader->getClassInstance($tableClass);
			// Create the table.
			$table->create();
		}
		// Get Plugin settings.
		$loader->getInstanceOf('setting', 'application')
		// Create settings var with current version number set.
								->setVersionNumber()
		// Save/Create settings option.
								->save();
	}

} // End class.