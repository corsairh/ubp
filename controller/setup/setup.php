<?php
/**
* 
*/

/**
* 
*/
class UBP_Controller_Setup extends UBP_Lib_Mvc_Controller {
	
	/**
	* 
	*/
	const UBP_PLUGIN_REL_FILE = 'ubp/ubp.php';
	
	/**
	* put your comment there...
	* 
	*/
	public function setup() {
		// Initialize.
		$request =& $this->getRequest();
		$response =& $this->getResponse();
		// Read plugins!
		$plugins = $request->get('plugins', 'post');
		// Always put the plugin as the first item!
		$ubpPluginAtIndex = array_search(self::UBP_PLUGIN_REL_FILE, $plugins);
		if ($ubpPluginAtIndex) {
			// Remove!
			unset($plugins[$ubpPluginAtIndex]);
			array_unshift($plugins, self::UBP_PLUGIN_REL_FILE);
			// Re-indexing!
			$plugins = array_values($plugins);
		}
		// Response back.
		$response->write('plugins', $plugins);
	}

} // End class.
