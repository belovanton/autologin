<?php
$installer = $this;
$installer->startSetup();


$installer->run("
    CREATE TABLE IF NOT EXISTS {$this->getTable('autologin/keys')} (
        `id` int(11) NOT NULL auto_increment,
		`username` varchar(255) NOT NULL ,
        `hash` varchar(255) NOT NULL ,
        `expired_at`  TIMESTAMP NULL,
        `updated_at` TIMESTAMP NULL,
        `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=UTF8;
");


$installer->endSetup();