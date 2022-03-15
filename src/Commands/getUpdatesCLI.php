<?php

namespace Reactmore\TelegramBotCore\Commands;

use Config\Autoload;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Longman\TelegramBot\Telegram;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Exception\TelegramLogException;
use Longman\TelegramBot\TelegramLog;

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
        CLI::write('**** Running BOT ****', 'white', 'green');
        while (1) {
            sleep(4);
            $this->bot();
        }

        CLI::newLine(1);
    }

    protected function bot()
    {

        try {
            $this->getConfig();
            $telegram = new Telegram($this->config->ApiKey, $this->config->bot_username);
            $telegram->useGetUpdatesWithoutDatabase();
            $server_response = $telegram->handleGetUpdates();

            if ($server_response->isOk()) {
                $update_count = count($server_response->getResult());
                CLI::newLine(1);
                CLI::write(date('Y-m-d H:i:s') . ' - Processed ' . $update_count . ' updates', 'white', 'green');
                CLI::newLine(1);
                CLI::write($server_response, 'white', 'black');
            } else {
                CLI::newLine(1);
                CLI::write($server_response, 'white', 'red');
                CLI::newLine(1);
            }
        } catch (TelegramException $e) {;
            CLI::newLine(1);
            CLI::write($e->getMessage(), 'white', 'red');
            CLI::newLine(1);
            echo $e->getMessage();
        } catch (TelegramLogException $e) {
            CLI::newLine(1);
            CLI::write($e->getMessage(), 'white', 'red');
            CLI::newLine(1);
        }
    }
}
