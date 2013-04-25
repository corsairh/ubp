CREATE TABLE IF NOT EXISTS `wp_test_ubp_plugin`(
	`file` VARCHAR(100) NOT NULL COMMENT 'Plugin relative path to Wordpress Plugins directory',
	`id` INT(2) AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `wp_test_ubp_plugin_error`(
	`pluginId` INT(2) NOT NULL,
	`ref` VARCHAR(32) NOT NULL,
	`code` INT(4) NOT NULL,
	`message` VARCHAR(400) NOT NULL,
	`file` VARCHAR(500) NOT NULL,
	`line` INT(2) NOT NULL,
	PRIMARY KEY(`code`, `message`, `file`, `line`),
	INDEX (`pluginId`),
	KEY (`ref`)
);

CREATE TABLE IF NOT EXISTS `wp_test_ubp_plugin_request`(
	`url` VARCHAR(800) NOT NULL,
	`id` INT(2) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `wp_test_ubp_plugin_error_log`(
	`requestId` INT(2) NOT NULL,
	`pluginId` INT(2) NOT NULL,
	PRIMARY KEY (`requestId`, pluginId)
);