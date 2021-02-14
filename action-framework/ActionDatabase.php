<?php

/**
 * @property ActionCore core
 */
class ActionDatabase
{
    public const RECORDS = 'records';
    public const START_FROM = 'start';
    public const ONE_RECORD = 0;
    public const ALL_RECORDS = -1;

    /**
     * @param string $fieldName
     * @return string
     */
    public static function desc(string $fieldName = 'id'): string
    {
        return " ORDER BY `{$fieldName}` DESC";
    }

    /**
     * @param string $fieldName
     * @return string
     */
    public static function asc(string $fieldName = 'id'): string
    {
        return " ORDER BY `{$fieldName}` ASC";
    }

    /**
     * @param string $field
     * @param $value
     * @param string $operator
     * @return string
     */
    public static function where($field, $value, $operator = '='): string
    {
        return "`{$field}` {$operator} '{$value}'";
    }

    /**
     * @param array $where
     * @return string
     */
    public static function staticBuildWhere(array $where = []): string
    {
        return implode(' AND ', $where);
    }

    /**
     * @param array $where
     * @return string
     */
    public function buildWhere(array $where = []): string
    {
        return self::staticBuildWhere($where);
    }

    /**
     * @param string $toTable
     * @param CustomObject $options
     * @return bool
     * @throws Exception
     */
    public function insert(string $toTable, CustomObject $options): bool
    {
        /** @var bool $result */
        return $result;
    }

    /**
     * @param string $fromTable
     * @param array $where
     * @return array
     * @throws Exception
     */
    public function selectLastOne(string $fromTable, array $where = []): array
    {
        return $this->select($fromTable, $where, self::desc(), ['start' => 0, 'records' => self::ONE_RECORD]);
    }

    /**
     * @param string $fromTable
     * @param array $where
     * @param string $order
     * @param array $limits
     * @param array $select
     * @return array
     * @throws Exception
     */
    public function select(string $fromTable = '', array $where = [], string $order = '', array $limits = [], array $select = []): array
    {
        return [];
    }

    /**
     * @param string $query
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function query(string $query)
    {
        return $this->connection()->query($query);
    }

    /**
     * @param string $inTable
     * @param array $update
     * @param array $where
     * @param bool $ignoreSaveVersion
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function update(string $inTable, array $update = [], array $where = [], bool $ignoreSaveVersion = false)
    {
        /** @var bool|mysqli_result $result */
        return $result;
    }

    /**
     * @param string|null $contextInfo
     * @return mysqli
     * @throws Exception
     */
    public function connection(string $contextInfo = null): mysqli
    {
        /** @var mysqli $connection */
        return $connection;
    }
}