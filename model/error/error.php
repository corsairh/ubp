<?php
/**
* 
*/

/**
* 
*/
class UBP_Model_Error extends UBP_Lib_Mvc_Model {
	
	/**
	* 
	*/
	const ACCESS_KEY = 'ubp_secure_access_key';
	
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
		$keys = get_option(self::ACCESS_KEY);
		if (!is_array($keys)) {
			$keys = array();
		}
		// MD5 for time with the unique salt!
		$key['hash'] = md5(time() . AUTH_SALT);
		$key['time'] = time();
		$key['plugin'] = $plugin;
		// Add key database, saved by name!
		$keys[$plugin['PluginFile']] = $key;
		// Save to database.
		update_option(self::ACCESS_KEY, $keys);
		return $key['hash'];
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
		if ($relFile = $this->isPluginFile($file)) {
			// Import get_plugin_data php file!
			require_once ABSPATH . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'plugin.php';
			// Get Plugin data.
			$plugin = get_plugin_data($file, false);
			// Push rel file into Plugin data.
			$plugin['PluginFile'] = $relFile;
			$plugin['File'] = $file;
		}
		return $plugin;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $file
	*/
	public function isPluginFile($file) {
		$pluginRelFile = FALSE;
		/// Get OS-Based Plugins directory path! ///
		$pathToPluginsDir = dirname(dirname(UBP::FILE));
		// Check if the error file is belong to a Plugin!
		if (strpos($file, $pathToPluginsDir) === 0) {
			$pluginRelFile = str_replace($pathToPluginsDir, '', $file);
		}
		return $pluginRelFile;
	}
	
} // End class.
