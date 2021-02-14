<?php

class ALGCore
{
    /**
     * @param string $needle
     * @return string
     */
    public function simpleEncrypt($needle): string { return ''; }

    /**
     * @param string $needle
     * @return string
     */
    public function powerEncrypt($needle): string { return ''; }

    /**
     * @param $needle
     * @return string
     */
    public function simpleDecrypt($needle): string { return ''; }

    /**
     * @param string $needle
     * @return string
     */
    public function powerDecrypt($needle): string { return ''; }

    /**
     * @param int|float|string|array $keyPayload
     */
    public function setKey($keyPayload): void {}
}