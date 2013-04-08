(
	`requestId` INT(2) NOT NULL,
	`errorRef` VARCHAR(32) NOT NULL,
	PRIMARY KEY (`requestId`, `errorRef`)
)