(
	`pluginId` INT(2) NOT NULL,
	`ref` VARCHAR(32) NOT NULL,
	`code` INT(4) NOT NULL,
	`message` VARCHAR(400) NOT NULL,
	`file` VARCHAR(500) NOT NULL,
	`line` INT(2) NOT NULL,
	PRIMARY KEY(`code`, `message`, `file`, `line`),
	INDEX (`pluginId`),
	UNIQUE (`ref`)
)