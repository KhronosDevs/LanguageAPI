# LanguageAPI

This is a Language API for either Khronos plugins or to use it yourself!

![Download it here](https://github.com/KhronosDevs/LanguageAPI/releases/latest/download/LanguageAPI.phar)

## How to use

```php
<?php

use pocketmine\plugin\PluginBase;

use xchillz\language\api\LanguageAPI;

class ExampleLanguagePlugin extends PluginBase {

    public function onEnable() {
        // GET A LANGUAGE

        $someLanguageId = 'en_EN';

        $someLanguage = LanguageAPI::getInstance()->getLanguage($someLanguage);

        // ADD TRANSLATIONS TO A LANGUAGE

        $someLanguage->addTranslations($this, [
            'FIRST_TRANSLATION' => 'Hello World!'
        ]);

        // GET A TRANSLATION

        $this->getLogger()->info('First translation of ' . $someLanguageId . ': ' . $someLanguage->getTranslation('FIRST_TRANSLATION'));

        // GET A LANGUAGE NAME

        $this->getLogger()->info($someLanguageId . '\'s name: ' . $someLanguage->getNames()[$someLanguageId]);
    }

}

?>
```
