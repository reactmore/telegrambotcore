<?php

namespace Reactmore\TelegramBotCore\Database\Migrations\Version_1;

use CodeIgniter\Database\Migration;

class Create_Bot_Users extends Migration
{
    public function up()
    {
        $config = $this->_getConfig();

        $this->forge->createTable($config->tableName, true);
    }

    public function down()
    {
        $config = $this->_getConfig();

        $this->forge->dropTable($config->tableName, true);
    }

    private function _getConfig()
    {
        $config = config('TelegramBotCore');

        if (!$config) {
            $config = new \Reactmore\TelegramBotCore\Config\TelegramBotCore();
        }

        return $config;
    }
}
