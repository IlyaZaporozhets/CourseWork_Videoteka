<?php
/**
 * Action Framework Core library
 */
header('Server: ActionFramework v4.0.2 (2019 Codaline Global)');
header('X-Powered-By: ActionFramework v4.0.2 (2019 Codaline Global)');
session_name(SESSION_NAME);
session_set_cookie_params(60*60*24*31, '/');
session_start(['cookie_lifetime' => 60*60*24*31]);

define('TYPE_WARNING', '#fcbe3e');
define('TYPE_ERROR', '#FC2F35');
define('TYPE_SUCCESS', '#3cff51');
define('TYPE_INFO', '#517AFF');
define('DESCRIPTION', 'description');
define('CHANNEL', 'channel');
define('ERROR_TYPE', 'errorType');
define('LOG_TYPE', 'logType');
define('EXECUTION', 'execution');
define('STOP_EXECUTION', true);
define('REQUIRED', 'r');
define('OPTIONAL', 'o');
define('required', 'r');
define('optional', 'o');
define('RETURN_ID', true);
define('SHOW_LAST_ERROR', true);
define('REPORT_LOG', true);
define('PATH', 'path');
define('SAME_PATH', '/');
define('RETURN_CLASS', 'returnClass');
define('RECORDS', 'records');
define('START_FROM', 'start');
define('FIRST_RECORD', 0);
define('ONE_RECORD', 0);
define('SHOW_ALL_RECORDS', -1);
define('MAX_INT_NUM', 9223372036854775807);

if (!function_exists('curlRequest')) {
    /**
     * @param string $method
     * @param string $siteUrl
     * @param mixed $data
     * @param mixed $params
     * @param array $headers
     * @return array
     */
    function curlRequest(string $method, string $siteUrl, $data = null, $params = null, $headers = []): array { return []; }
}

if (!function_exists('reportError')) {
    /**
     * @param string $mainText
     * @param array $options
     * @return array
     */
    function reportError(string $mainText = '', $options = []) { return []; }
}


if (!function_exists('discordMailerLog')) {
    /**
     * @param string $mainText
     * @param array $options
     * @return array
     */
    function discordMailerLog(string $mainText = '', $options = [])
    { return []; }
}

if (!function_exists('internalRequestLog')) {
    /**
     * @param array $payload
     */
    function internalRequestLog(array $payload): void {}
}

if (!function_exists('sendLog')) {
    /**
     * @param string $mainText
     * @param array $options
     * @return array
     */
    function sendLog(string $mainText = '', $options = []) { return []; }
}

if (!function_exists('encodeString')) {
    /**
     * @param string $string
     * @return string
     *
     */
    function encodeString(string $string): string
    {
        $string = base64_encode($string);
        $string = md5($string);
        return $string;
    }
}

if (!function_exists('dirToArray')) {
    /**
     * @param string $dir
     * @return array
     */
    function dirToArray(string $dir) { return []; }
}

if (!function_exists('returnArrayFromArgs')) {
    /**
     * @param mixed ...$args
     * @return array
     */
    function returnArrayFromArgs(...$args): array { return []; }
}


if (!function_exists('whereConditions')) {
    /**
     * @param array $conditions
     * @return array
     */
    function whereConditions(...$conditions): array
    {
        return returnArrayFromArgs($conditions);
    }
}

if (!function_exists('selectFields')) {
    /**
     * @param array $fields
     * @return array
     */
    function selectFields(...$fields): array
    {
        return returnArrayFromArgs($fields);
    }
}

if (!function_exists('updateFields')) {
    /**
     * @param array $fields
     * @return array
     */
    function updateFields($fields): array
    {
        return $fields;
    }
}

if (!function_exists('where')) {
    /**
     * @param string $field
     * @param string $operator
     * @param mixed $value
     * @return string
     */
    function where(string $field, string $operator = '=', $value = 1): string
    {
        return "`{$field}` {$operator} '{$value}'";
    }
}

if (!function_exists('equals')) {
    /**
     * @param string $field
     * @param mixed $isEqualTo
     * @return string
     */
    function equals(string $field, $isEqualTo = 1): string
    {
        return where($field,'=', $isEqualTo);
    }
}

if (!function_exists('less')) {
    /**
     * @param string $field
     * @param int $isLessThan
     * @return string
     */
    function less(string $field, $isLessThan = 1): string
    {
        return where($field,'<', $isLessThan);
    }
}

if (!function_exists('greater')) {
    /**
     * @param string $field
     * @param int $isGreaterThan
     * @return string
     */
    function greater(string $field, $isGreaterThan = 1): string
    {
        return where($field,'>', $isGreaterThan);
    }
}

if (!function_exists('like')) {
    /**
     * @param string $field
     * @param int $like
     * @param string $prefix
     * @param string $suffix
     * @return string
     */
    function like(string $field, $like = 1, $prefix = '%', $suffix = '%'): string
    {
        return where($field, 'LIKE', "{$prefix}{$like}{$suffix}");
    }
}

if (!function_exists('descending')) {
    /**
     * @param string $fieldName
     * @return string
     */
    function descending(string $fieldName = 'id'): string
    {
        return " ORDER BY `{$fieldName}` DESC";
    }
}

if (!function_exists('ascending')) {
    /**
     * @param string $fieldName
     * @return string
     */
    function ascending(string $fieldName = 'id'): string
    {
        return " ORDER BY `{$fieldName}` ASC";
    }
}

if (!function_exists('limits')) {
    /**
     * @param int $startFrom
     * @param int $howManyRecords
     * @return array
     */
    function limits(int $startFrom = FIRST_RECORD, int $howManyRecords = SHOW_ALL_RECORDS)
    {
        return [START_FROM => $startFrom, RECORDS => $howManyRecords];
    }
}

if (!function_exists('showAllRecords')) {
    /**
     * @return array
     */
    function showAllRecords()
    {
        return [RECORDS => SHOW_ALL_RECORDS];
    }
}