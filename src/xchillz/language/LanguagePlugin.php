<?php

declare(strict_types=1);

namespace xchillz\language;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use xchillz\language\api\LanguageAPI;

final class LanguagePlugin extends PluginBase {

    public function onEnable() {
        $this->saveResource('languages.json');

        LanguageAPI::getInstance()->loadFromConfig(new Config($this->getDataFolder() . 'languages.json', Config::JSON));
    }

}
