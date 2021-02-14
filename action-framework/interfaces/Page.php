<?php

class Page
{
    /** @var CustomObject $context */
    public $context;

    public const CSS = 'css';
    public const JS = 'js';

    /** @var I18N $messages */
    public $messages;

    /**
     * @return ActionCore
     */
    public function core(): ActionCore
    {
        return action::core();
    }

    /**
     * @param string $key
     */
    public function addCustomMessages(string $key): void { }

    /**
     * @param string $key
     * @return I18N
     */
    public function getCustomMessages(string $key): ?I18N
    {
        /** @var null|I18N $i18n */
        return $i18n;
    }

    public function showPage(array $data = [], $messagesPath = ''): void {}
    
    /**
     * @param string $includeName
     * @param string $path
     */
    public function loadInclude(string $includeName, string $path = '/'): void { }

    /**
     * @param string $metaTemplateName
     * @param string $path
     * @return self
     */
    public function setMetaTemplate(string $metaTemplateName = 'default', string $path = '/'): self { return $this; }

    
    /**
     * @return CustomObject
     */
    public function getContext(): CustomObject
    {
        return $this->context;
    }

    /**
     * @return I18N
     */
    public function getMessages(): I18N
    {
        return $this->messages;
    }
    
    /**
     * @param string $assetName
     * @param string $assetType
     * @param bool $coreDir
     * @param string $subPath
     * @return string
     */
    public function loadNativeAsset(string $assetName, string $assetType = self::CSS, bool $coreDir = true, string $subPath = '/'): string { return ''; }

    /**
     * @param string $assetName
     * @param string $assetType
     * @param bool $coreDir
     * @param string $subPath
     * @return string
     */
    public function loadAsset(string $assetName, string $assetType = self::CSS, bool $coreDir = true, string $subPath = '/'): string { return ''; }

    /**
     * @param string $url
     * @return string
     */
    public function href(string $url): string
    {
        return "href='/{$this->core()->locale}{$url}'";
    }

    /**
     * @param string $pageMethod
     * @return Page
     */
    public function addThirdLevelFor(string $pageMethod): Page { return $this; }

    /**
     * @param string $pageMethod
     * @return Page
     */
    public function addPageIgnore(string $pageMethod): Page { return $this; }
}