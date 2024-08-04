<?php

declare(strict_types=1);

namespace xchillz\language\object;

use pocketmine\plugin\PluginBase;

final class Language {

    /** @var string */
    private $id;

    /** @var array<string, string> */
    private $names, $translations = [];

    public function __construct(string $id, array $names) {
        $this->id = $id;
        $this->names = $names;
    }

    public function addTranslations(PluginBase $plugin, array $translations) {
        foreach ($translations as $key => $translation) {
            if (isset($this->translations[$key])) {
                $plugin->getLogger()->warning('Re-writing ' . $key . ' translation.');
            }

            $this->translations[$key] = $translation;
        }
    }

    public function getId(): string {
        return $this->id;
    }

    public function getNames(): array {
        return $this->names;
    }

    public function getTranslation(string $key, array $replaceables = []): string {
        if (!isset($this->translations[$key])) return $key;

        if (empty($replaceables)) return $this->translations[$key];

        return str_replace(array_keys($replaceables), $replaceables, $this->translations[$key]);
    }

}
