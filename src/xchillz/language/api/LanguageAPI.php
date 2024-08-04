<?php

declare(strict_types=1);

namespace xchillz\language\api;

use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;
use xchillz\language\object\Language;

final class LanguageAPI {
    use SingletonTrait {
        setInstance as private;
        reset as private;
    }

    /** @var array<string, Language> */
    private $languages = [];

    /** @var Language */
    private $defaultLanguage;

    private function __construct() {}

    public function loadFromConfig(Config $config) {
        foreach ($config->getAll() as $languageId => $languageData) {
            $language = new Language($languageId, $languageData['names']);

            $this->languages[$languageId] = $language;

            if (isset($languageData['default']) && $languageData['default']) {
                $this->defaultLanguage = $language;
            }
        }
    }

    public function getLanguage(string $id): Language {
        if (isset($this->languages[$id])) {
            return $this->languages[$id];
        }

        throw new \LogicException($id . ' is not registered.');
    }

    public function getDefaultLanguage(): Language {
        if (isset($this->defaultLanguage)) {
            return $this->defaultLanguage;
        }

        throw new \LogicException('There is no default language set.');
    }

}
