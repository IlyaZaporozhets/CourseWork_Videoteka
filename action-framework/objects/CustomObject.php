<?php

class CustomObject
{
    /**
     * CustomObject constructor.
     * @param mixed $mixed
     * @throws RuntimeException
     */
    public function __construct($mixed = [])
    {
        $this->setFields($mixed);
    }

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function setField(string $key, $value): self
    {
        $this->$key = $value;

        return $this;
    }

    /**
     * @param $mixed
     * @return CustomObject
     */
    public function setFields($mixed): self
    {
        $mixed = $this->getArrayFromInput($mixed);

        foreach ($mixed as $key => $value) {
            $this->$key = $value;
        }

        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getField(string $key)
    {
        return $this->$key ?? null;
    }

    /**
     * Alias of getField
     * @param string $key
     * @return mixed
     */
    public function field(string $key)
    {
        return $this->getField($key);
    }

    /**
     * Alias of getField
     * @param string $key
     * @return mixed
     */
    public function param(string $key)
    {
        return $this->getField($key);
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this, 256);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array)$this;
    }

    /**
     * @param mixed $mixed
     * @return array
     */
    private function getArrayFromInput($mixed = []): array
    {
        $typeOf = gettype($mixed);
        switch ($typeOf) {
            case 'string': {
                $mixed = json_decode($mixed, true) ?: [];
                break;
            }
            case 'object': {
                $mixed = (array) $mixed;
                break;
            }
            case 'array': {
                break;
            }
            default: {
                $error = 'CustomObject::getArrayFromInput() got inappropriate value of `$mixed` parameter.';
                Helper::writeLog($error, $mixed, SHOW_LAST_ERROR, REPORT_LOG);
            }
        }

        return $mixed;
    }
}