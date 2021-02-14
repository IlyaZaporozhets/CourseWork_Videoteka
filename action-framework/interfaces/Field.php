<?php

/**
 * @property string name
 * @property string type
 * @property bool isNull
 * @property mixed defaultValue
 * @property mixed value
 */
class Field
{
    /**
     * Field constructor.
     * @param string $name
     */
    public function __construct(string $name) {}

    /**
     * @param string $name
     * @return Field
     */
    public static function create(string $name): Field
    {
        return new self($name);
    }
    /**
     * @param string $name
     * @return self
     */
    public function field(string $name): self { return $this; }

    /**
     * @param string $type
     * @return self
     */
    public function type(string $type): self { return $this; }

    /**
     * @param bool $isNull
     * @return self
     */
    public function null(bool $isNull = true): self { return $this; }

    /**
     * @param mixed $value
     * @return self
     */
    public function default($value): self { return $this; }

    /**
     * @param mixed $value
     * @return self
     */
    public function setValue($value): self { return $this; }

    /**
     * @return mixed
     */
    public function getValue()
    {
        /** @var mixed $value */
        return $value;
    }

    /**
     * @return string
     */
    public function getName(): string { return ''; }

    /**
     * @return string
     */
    public function getType(): string { return ''; }

    /**
     * @return mixed
     */
    public function getDefaultValue()
    {
        /** @var mixed $value */
        return $value;
    }
}