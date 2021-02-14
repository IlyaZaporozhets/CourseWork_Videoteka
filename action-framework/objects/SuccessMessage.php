<?php

/**
 * @property bool success
 * @property string message
 * @property array data
 */
class SuccessMessage
{
    /**
     * SuccessMessage constructor.
     * @param string $message
     * @param bool $success
     */
    public function __construct($message = '', $success = true)
    {
        $this->success = $success;
        $this->message = $message;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message = ''): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param bool $success
     * @return $this
     */
    public function setSuccess($success = false): self
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @param mixed $object
     * @return SuccessMessage
     */
    public function setData($object = []): SuccessMessage
    {
        $this->data = $object;

        return $this;
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
}