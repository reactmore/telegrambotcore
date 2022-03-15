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

    public $ApiKey =  '';

    public $bot_username = '';

    public $hook_url = 'false';

    public function init($schedule)
    {
        // $schedule->command('foo:bar')->everyMinute();

        // $schedule->shell('cp foo bar')->daily( '11:00 pm' );

        // $schedule->call( function() { do something.... } )->everyMonday()->named( 'foo' )
    }
}
