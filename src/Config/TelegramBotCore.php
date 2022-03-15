<?php

namespace Reactmore\TelegramBotCore\Config;

use CodeIgniter\Config\BaseConfig;

class TelegramBotCore extends BaseConfig
{
	/**
	 * Directory
	 */
	public $FilePath = WRITEPATH . 'TelegramBotCore/';

	/**
	 * Filename setting
	 */
	public $FileName = 'core';

	/**
	 * Set true if you want save logs
	 */
	public $logPerformance = false;

	/*
    |--------------------------------------------------------------------------
    | Log Saving Method
    |--------------------------------------------------------------------------
    |
    | Set to specify the REST API requires to be logged in
    |
    | 'file'   Save in file
    | 'database'  Save in database
    |
    */
	public $logSavingMethod = 'file';

	/*
    |--------------------------------------------------------------------------
    | Database Group
    |--------------------------------------------------------------------------
    |
    | Connect to a database group for logging, etc.
    |
    */
	public $databaseGroup = 'default';

	/*
    |--------------------------------------------------------------------------
    | Cronjob Table Name
    |--------------------------------------------------------------------------
    |
    | The table name in your database that stores cronjobs
    |
    */
	public $tableName = 'cronjob';
}
