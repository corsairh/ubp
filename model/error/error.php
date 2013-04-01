<?php
/**
* 
*/

/**
* 
*/
class UBP_Model_Error {
	
	/**
	* put your comment there...
	* 
	* @param mixed $key
	* @param mixed $plugin
	*/
	public function eMailAdmin($key, $plugin) {
		// Mail fields.
		$adminMail = get_bloginfo('admin_email');
		// Build backup link!
		$backupLink = get_bloginfo('wpurl') . "/?ubp_backup_key={$key}";
		// Subject!
		$subject = 'UBP Plugin error detected!';
		// Mail message.
		$message  = "UBP has detecting Blocked error in your site!\n";
		$message .= "Use {$backupLink} link to backup/disable the target Plugin\n\n";
		$message .= "######### Plugin Data ##########\n\n";
		// Add Plugin details into message.
		foreach ($plugin as $name => $value) {
			$message .= "{$name} = {$value}\n";
		}
		// Send mail.
		//mail($adminMail, $subject, $message);
		echo "{$message}<br>";
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $plugin
	*/
	public function genBackupKey($plugin) {
		// Initialize.
		$key = FALSE;
		$keys =& UBP_Lib_Backupkeys::getInstance();
		// Generate key only if there is NO, VALID key exists!
		if ((!$dbKey = $keys->getPluginKey($plugin['RelFile'])) || !$keys->isValid($dbKey)) {
			// Generate new key or override an exists invalid key!
			$key = $keys->generate($plugin);
			// Saving new key!
			$keys->save();
		}
		return $key;
	}
	
	/**
	* Get Plugin relative path to the main file from
	* the given plugin directory name.
	* 
	* @param mixed $PluginDirectory
	* @return string Relative path to Plugin main file.
	*/
	public function getPluginMainFile($PluginDirectory) {
		// Initialize.
		$pluginFile = FALSE;
		// Read all active plugins.
		$acPlugins = get_option('active_plugins');
		if (!is_array($acPlugins)) {
			$acPlugins = array();
		}
		// Search key if the plugin dir name with / appened
		// to ensure its not another plugin start with the same name (e.g test, test-2)!
		$searchKey = "{$PluginDirectory}/";
		// Search 'active_plugins' to find the plugin main file path.
		foreach ($acPlugins as $cRelFile) {
			// Plugin found!
			if (strpos($cRelFile, $searchKey) === 0) {
				// Build OS-Based path!
				$pluginFile = $PluginDirectory . DIRECTORY_SEPARATOR . basename($cRelFile);
				break;
			}
		}
		return $pluginFile;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $file
	*/
	public function getPluginFromErrorFile($file) {
		// Inijtialize.
		$plugin = null;
		// Get plugin data only if the provided file is for Plugin.
		if ($pluginFile = $this->isPluginFile($file)) {
			// Import get_plugin_data php file!
			require_once ABSPATH . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'plugin.php';
			// Get Plugin data.
			$plugin = get_plugin_data($pluginFile['abs'], false);
			// Push rel file into Plugin data.
			$plugin['ErrorFile'] = $file;
			$plugin['File'] = $pluginFile['abs'];
			$plugin['RelFile'] = $pluginFile['rel'];
		}
		return $plugin;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $file
	*/
	public function isPluginFile($file) {
		$pluginFile = FALSE;
		/// Get OS-Based Plugins directory path! ///
		$pathToPluginsDir = dirname(dirname(UBP::FILE));
		// Check if the error file is belong to a Plugin!
		if (strpos($file, $pathToPluginsDir) === 0) {
			// Remove plugins directory path.
			$relFile = str_replace($pathToPluginsDir, '', $file);
			// Get Plugin dir name by splitting path parts.
			$relFileArray = explode(DIRECTORY_SEPARATOR, $relFile); 
			$pluginDirName = $relFileArray[1];
			// Get absolute paths to Plugin file.
			$pluginFileRelPath = $this->getPluginMainFile($pluginDirName);
			// Get Plugin base file.
			$pluginFile = array();
			$pluginFile['rel'] = $pluginFileRelPath;
			$pluginFile['abs'] = $pathToPluginsDir . DIRECTORY_SEPARATOR . $pluginFileRelPath;
		}
		return $pluginFile;
	}
	
} // End class.
