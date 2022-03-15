<?php

namespace Reactmore\TelegramBotCore\Config;

use CodeIgniter\Config\BaseConfig;

class TelegramBotCore extends BaseConfig
{

    /*
    |--------------------------------------------------------------------------
    | Required 
    |--------------------------------------------------------------------------
    |
    | Required Configurations
    |
    */

    public $ApiKey =  '1971664840:AAFFwouWA_qTbhy7gnTwfmu5dlQPXExuNYY';
    public $bot_username = 'reactmorestarter_bot';
    public $hook_url = 'false';
    public $adminID = [
        958587442
    ];

    public $limiter = [
        'enabled' => true,
    ];

    public $botmysql = [
        'enabled' => false,
        'data' => [
            'host'     => 'localhost',
            'user'     => 'root',
            'password' => '',
            'database' => 'telegram_bot',
        ]
    ];

    public function init($schedule)
    {
    }
}
