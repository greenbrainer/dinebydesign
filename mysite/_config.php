<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => '127.0.0.1',
	"username" => 'root',
	"password" => '',
	"database" => 'newedge_dinebydesign',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_US');
Director::set_environment_type("dev");
FulltextSearchable::enable();
Security::setDefaultAdmin('admin', 'password');