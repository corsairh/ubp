=== Uninterrupted Backup Plugin ===
Tags: uninterrupted plugin, backup, recovery, disable, backdoor, error, blocked, fatal, deactivate, provide, access, path
Requires at least: 3.5
Tested up to: 3.5
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Detect fatal errors that might be produced by the installed active Plugins, provide secure backdoor for deactivating the target Plugin.

== Description ==

Detect Wordpress installed active Plugins 'Fatal Errors' that blocked or prevent the site admin from accessing Wordpress backend admin interface to deactivate the Plugin.
The mechanism of the Plugin is to always put itself at the first of the active Plugins queue so it'll always executed as the first Plugin! When a fatal error raised the PHP script is start
to be terminated! UBP then detect if there is any error raised before terminating, if Error found it'll then send admin mail with a secure link from which site admin can deactivate the target
Plugin.

There is no need to access throught FTP to force Wordpress deactivate the Plugin. You can always use this Plugin to deactivate the target Plugin only with the link sent with the mail.

Whenever you active or deactive a new Plugin, UBP will always put itself as the first Plugin in Wordpress active Plugins queue.

Please note: The Plugin won't install itself while the site is already blocked by the error. UBP must be installed first while the site is fully functional and then it'll help you backing up your site
if any newly Plugin produced an error.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `ubp` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.1 =
First beta release.