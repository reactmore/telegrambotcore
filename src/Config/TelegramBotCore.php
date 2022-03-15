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

    public function init($schedule)
    {
    }
}
