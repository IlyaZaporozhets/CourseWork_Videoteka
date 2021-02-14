<?php

class Entity
{
    public const CURRENT_TIMESTAMP = 'CURRENT_TIMESTAMP';
    public const TYPE_TIMESTAMP = 'timestamp';
    public const LONG_TEXT = 'longtext';
    /**
     * @var array IGNORED_DEFAULTS used to exclude single or double quotes usage for default values in this array.
     * Example: CURRENT_TIMESTAMP is not string or numeric value, it is SQL variable, so it doesn't require quotes
     */
    public const IGNORED_DEFAULTS = [self::CURRENT_TIMESTAMP];

    /**
     * @param string $name
     * @return Field
     */
    public function field(string $name): Field
    {
        /** @var Field $field */
        return $field;
    }

    /**
     * @param string $fieldName
     * @return null|Field
     */
    public function getField(string $fieldName): ?Field
    {
        /** @var null|Field $field */
        return $field;
    }

    /**
     * @param string $fieldName
     * @param mixed $value
     */
    public function setField(string $fieldName, $value): void {}

    /**
     * @param string $fieldName
     * @return Field
     */
    public function defaultIDField(string $fieldName): Field
    {
        /** @var Field $field */
        return $field;
    }

    /**
     * @return Entity
     */
    public function setPid(): self { return $this; }

    /**
     * @return null|Field
     */
    public function getPid(): ?Field
    {
        /** @var null|Field $field */
        return $field;
    }

    /**
     * @return CustomObject
     */
    public function getDataObject(): CustomObject
    {
        /** @var CustomObject $map */
        return $map;
    }

    /**
     * @param string $fieldName
     * @return mixed|null
     * @throws RuntimeException
     */
    public function getFieldValue(string $fieldName) { return null; }

    /**
     * @param string $fieldName
     * @param $value
     * @return self
     */
    public function setFieldValue(string $fieldName, $value): self { return $this; }

    /**
     * @return array
     */
    public function getFields(): array { return []; }

    /**
     * @param int $length
     * @return string
     */
    public static function varchar(int $length = 255): string
    {
        return "varchar({$length})";
    }

    /**
     * @param int $length
     * @return string
     */
    public static function tinyint(int $length = 2): string
    {
        return "tinyint({$length})";
    }

    /**
     * @param int $length
     * @return string
     */
    public static function int(int $length = 11): string
    {
        return "int({$length})";
    }

    /**
     * @param int $length
     * @return string
     */
    public static function bigint(int $length = 19): string
    {
        return "bigint({$length})";
    }

    /**
     * @return bool
     */
    public function isSaveVersions(): bool { return false; }

    /**
     * @param bool $saveVersions
     * @return Entity
     */
    public function setSaveVersions(bool $saveVersions): self { return $this; }

    /**
     * @return string
     */
    public function getTableName(): string { return ''; }

    /**
     * @param string $tableName
     * @return Entity
     */
    public function setTableName(string $tableName): self{ return $this; }

    /**
     * @return string
     */
    public static function getClassName(): string
    {
        return static::class;
    }

    /**
     * @param bool $returnLastID
     * @return mixed
     * @throws Exception
     */
    public function insert(bool $returnLastID = false)
    {
        /** @var mixed $queryResult */
        return $queryResult;
    }

    /**
     * @param array $checkConditions
     * @param bool $returnLastID
     * @return bool|mixed
     * @throws Exception
     */
    public function safeInsert(array $checkConditions, bool $returnLastID = false) { /** @var mixed $mixed */ return $mixed; }

    /**
     * @param array $updateFields
     * @param bool $ignoreSaveVersion
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function update(array $updateFields = [], bool $ignoreSaveVersion = false)
    {
        /** @var bool|mysqli_result $queryResult */
        return $queryResult;
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public static function getById(int $id): array { return []; }

    /**
     * @param int $id
     * @return self
     * @throws Exception
     */
    public static function getDataObjectByID(int $id): self
    {
        /** @var self $table */
        return $table;
    }

    /**
     * @param $data
     * @return self
     */
    public static function typecast($data): self
    {
        /** @var self $table */
        return $table;
    }

    /**
     * @param int $id
     * @return CustomObject
     * @throws Exception
     */
    public static function getObjectById(int $id): CustomObject
    {
        return new CustomObject(self::getById($id));
    }

    /**
     * @param string $query
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function query(string $query)
    {
        return action::database()->query($query);
    }

    /**
     * @return bool
     */
    public function isPrimaryTable(): bool
    {
        return false;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        /** @var mixed $mixed */
        return $mixed;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        /** @var mixed $mixed */
        return $mixed;
    }
}