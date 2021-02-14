<?php

/**
 * @property array messages
 */
class I18N
{
    public const NAMESPACE = 'path';
    private $path;

    /**
     * I18N constructor.
     * @param string $namespace
     * @param string $locale
     * @param string $subfolder
     */
    public function __construct(string $namespace = '', string $locale = '', string $subfolder = '') {}

    /**
     * @param string $namespace
     * @param string $locale
     * @param string $subfolder
     * @return I18N
     */
    public function setFile(string $namespace, string $locale, string $subfolder = ''): self { return $this; }

    /**
     * @param $fullPath
     * @return $this
     */
    public function setFullPath($fullPath): self { return $this; }

    /**
     * @param string $key
     * @param bool $return
     * @return null|string
     */
    public function get(string $key, bool $return = true): ?string { return ''; }
}