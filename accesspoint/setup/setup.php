<?php
/**
* 
*/

/**
* 
*/
class UBP_Accesspoint_Setup {
		
	/**
	* put your comment there...
	* 
	* @param mixed $new
	*/
	public function _preUpdateActivePlugins($activePlugins) {
		// Pass control to Setup Controller.
		$controller = new UBP_Controller_Setup();
		$controller->getRequest()->set('plugins', $activePlugins, 'post');
		// Run setup action.
		return $controller->doAction('setup')
		// Return new plugins order to Wordpress filter!
		->getResponse()->read('plugins');
	}

	/**
	* put your comment there...
	* 
	*/
	public function bind() {
		// Change active plugins order every time actie_plugins
		// option updated.
		if (is_admin()) {
			add_filter('pre_update_option_active_plugins', array($this, '_preUpdateActivePlugins'));
		}
	}
	
} // End class.