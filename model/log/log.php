<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Model_Log extends UBP_Lib_Object {
	
	/**
	* Log/Store all the passed issues!
	* 
	* @param Array List of issues to be logged!
	* @return
	*/
	public function log($issues) {
		// Initialize.
		$pluginsCache = array(); // Cache PluginRelativePath TO PluginId map.
		// Loader!
		$loader =& $this->getLoader();
		// Process all issues.
		foreach ($issues as $issue) {
			$pluginFile = $issue['file'];
			// If the PluginId is not yet cached get if from database.
			if (!isset($pluginsCache[$pluginFile])) {
				/**
				* For every issue get Plugin id!
				* @var UBP_Table_Plugin
				*/
				$plugin = $loader->getInstanceOf('table', 'plugin');
				$plugin->setFile($pluginFile);
				/**
				* Query Plugin by name.
				* 
				* @var UBP_Lib_Db_Command_Dml_Select
				*/
				$getPluginByName = $loader->getInstanceOf('lib/db/command/dml', 'select');
				$getPluginByName->select()->add($plugin, 'id');
				$getPluginByName->from()->add($plugin);
				$getPluginByName->where()
																				->equal($plugin, 'file');
				echo "{$getPluginByName}";
				die();
			}
			// Get Plugin Id form the cache.
			$pluginId = $pluginsCache[$pluginFile];
			
		}
	}

} // End class.