<?php

namespace Reactmore\TelegramBotCore\Commands;

use Config\Autoload;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * Enables Task Running
 */
class getUpdatesCLI extends BaseCommand
{
    protected $group        = 'Telegram';
    protected $arguments    = [];
    protected $options         = [];
    protected $sourcePath;
    protected $name = 'botcore:getUpdatesCLI';
    protected $description = 'Use GetUpdate CLI Bot.';
    protected $usage = 'botcore:getUpdatesCLI';

    /**
     * Config File 
     */
    protected $config = null;

    /**
     * Get Config File 
     */
    protected function getConfig()
    {
        $this->config = config('TelegramBotCore');
    }

    public function run(array $params)
    {
        $this->getConfig();

        CLI::newLine(1);
        CLI::write($this->config->hook_url . '**** Completed ****', 'white', 'red');
        CLI::newLine(1);
    }
}
