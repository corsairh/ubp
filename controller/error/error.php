<?php
/**
* Detecting Plugins error class.
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* Handle error detecting operations.
* 
* Detect Plugins error! Manage backup key generation.
* 
* @author Ahmed Said
*/
class UBP_Controller_Error extends UBP_Lib_Mvc_Controller {

	/**
	* Check if the error is from a Plugin file.
	* Generate backup key if the target Plugin
	* is not already has one generated and not expired.
	* 
	* @return void
	*/
	public function errorAction() {
		// Initialize!
		$model =& $this->getModel();
		// Read last error!
		$error = error_get_last();
		// Take action only if the error produced by Plugin!
		if ($plugin = UBP_Wordpress_Plugin_Helper::getPluginFromErrorFile($error['file'])) {
			// Generate backup key, send mail only if there is no key exists for the same Plugin!
			if ($key = $model->genBackupKey($plugin)) {
				// Send administrator mail with backup link!!
				$adminMail = get_bloginfo('admin_email');
				// Build backup link!
				$backupLink = get_bloginfo('wpurl') . "/?ubp_backup_key={$key['hash']}";
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
				require_once ABSPATH . WPINC . DIRECTORY_SEPARATOR . 'pluggable.php';
				$result = wp_mail($adminMail, $subject, $message);
			}
		}
	}

} // End class.