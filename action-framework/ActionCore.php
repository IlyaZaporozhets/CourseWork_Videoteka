<?php

/**
 * @property array|bool CONFIGS
 * @property array url
 * @property string requestType
 * @property array params
 * @property ActionDatabase database
 * @property mixed locale
 */
class ActionCore
{
    public $subfolder = '';

    /**
     * @param string $configName
     * @return mixed
     */
    public function getConfig($configName = null)
    {
        if (!$configName) {
            return $this->CONFIGS;
        }
        return $this->CONFIGS[$configName];
    }

    /**
     * @return array
     */
    public function getLocalizations(): array
    {
        return json_decode($this->getConfig('all_locales'), true);
    }

    /**
     * @return array
     */
    public function getLocalizationExchanges(): array
    {
        return json_decode($this->getConfig('localization_exchange'), true);
    }

    /**
     * @return string
     */
    public function getDefaultLocale(): string
    {
        return $this->getConfig('default_locale');
    }

    /**
     * @return array
     */
    public function getLocaleRouteExceptions(): array
    {
        return json_decode($this->getConfig('localization_parser_exceptions'), true);
    }

    /**
     * @return string
     */
    public function getRequestType(): string
    {
        return $this->requestType;
    }

    /**
     * @return array
     */
    public function getURL(): array
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return ActionDatabase
     */
    public function database(): ActionDatabase
    {
        /** @var ActionDatabase $database */
        return $database;
    }
}