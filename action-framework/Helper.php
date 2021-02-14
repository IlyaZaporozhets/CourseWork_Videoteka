<?php

class Helper
{
    /**
     * @param string|array|null $ip
     * @param string $purpose
     * @param bool $deepDetect
     * @return array|null|string
     */
    public static function ipInfo($ip = NULL, $purpose = 'location', $deepDetect = TRUE)
    {
        return [];
    }

    /**
     * @param $message
     * @param null $data
     * @param bool $lastError
     * @param bool $reportError
     */
    public static function writeLog($message, $data = null, $lastError = false, $reportError = false): void {}

    /**
     * @param string $key
     * @param mixed $value
     */
    public static function setSessionParam($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function getSessionParam($key)
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * @param $complexAction
     * @return CustomObject
     */
    public static function getRequestParams($complexAction): CustomObject
    {
        /** @var CustomObject $request */
        return $request;
    }

    /**
     * @param $string
     * @return mixed
     */
    public static function escape($string)
    {
        return str_replace(
            ['%lt;', '%gt;', '%amp;', '%hash;', '%apost;', '%quote;'],
            ['&lt;', '&gt;', '&amp;', '#',      '&apos;',  '&quot;'],
            $string);
    }

    /**
     * @param $string
     * @return mixed
     */
    public static function unescape($string)
    {
        return str_replace(
            ["'", '"'],
            ['&apos;', '&quot;'],
            $string);
    }

    /**
     * Alias
     * @param string $message
     * @return \SuccessMessage
     */
    public static function success($message = ''): \SuccessMessage
    {
        return new SuccessMessage($message);
    }

    /**
     * Alias
     * @param string $message
     * @return \SuccessMessage
     */
    public static function error($message = ''): \SuccessMessage
    {
        return new SuccessMessage($message, false);
    }

    /**
     * @param $result
     * @return array
     */
    public static function fetcher($result = false): array { return []; }
}