<?php

namespace Reactmore\TelegramBotCore\Commands;

use Config\Autoload;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * Enables Task Running
 */
class Publish extends BaseCommand
{
    protected $group        = 'Telegram';
    protected $arguments    = [];
    protected $options         = [];
    protected $sourcePath;
    protected $name = 'botcore:publish';
    protected $description = 'Publish the botcore runner.';
    protected $usage = 'botcore:publish';


    public function run(array $params)
    {
        $this->determineSourcePath();

        // Config
        if (CLI::prompt('Publish Config file?', ['y', 'n']) == 'y') {
            $this->publishConfig();
            $this->createCustomDir("Telegram/Commands");
        }
    }

    protected function publishConfig()
    {
        $path = "{$this->sourcePath}/Config/TelegramBotCore.php";

        $content = file_get_contents($path);
        $content = str_replace('namespace Reactmore\TelegramBotCore\Config', "namespace Config", $content);
        $content = str_replace('extends BaseConfig', "extends \Reactmore\TelegramBotCore\Config\TelegramBotCore", $content);

        $this->writeFile("Config/TelegramBotCore.php", $content);
    }

    /**
     * Determines the current source path from which all other files are located.
     */
    protected function determineSourcePath()
    {
        $this->sourcePath = realpath(__DIR__ . '/../');

        if ($this->sourcePath == '/' || empty($this->sourcePath)) {
            CLI::error('Unable to determine the correct source directory. Bailing.');
            exit();
        }
    }

    /**
     * Write a file, catching any exceptions and showing a
     * nicely formatted error.
     *
     * @param string $path
     * @param string $content
     */
    protected function writeFile(string $path, string $content)
    {
        $config = new Autoload();
        $appPath = $config->psr4[APP_NAMESPACE];

        $directory = dirname($appPath . $path);

        if (!is_dir($directory)) {
            mkdir($directory);
        }

        try {
            write_file($appPath . $path, $content);
        } catch (\Exception $e) {
            $this->showError($e);
            exit();
        }

        $path = str_replace($appPath, '', $path);

        CLI::write(CLI::color('  created: ', 'green') . $path);
    }

    /**
     * Write a file, catching any exceptions and showing a
     * nicely formatted error.
     *
     * @param string $path
     * @param string $content
     */
    protected function createCustomDir(string $path)
    {
        $config = new Autoload();
        $appPath = $config->psr4[APP_NAMESPACE];

        $directory = dirname($appPath . $path);

        try {
            if (!is_dir($directory)) {
                mkdir($directory);
            }
        } catch (\Exception $e) {
            $this->showError($e);
            exit();
        }

        $path = str_replace($appPath, '', $path);

        CLI::write(CLI::color('  created: ', 'green') . $path);
    }
}
