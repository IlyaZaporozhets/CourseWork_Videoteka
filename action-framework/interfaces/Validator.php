<?php

class Validator
{
    /**
     * @param string $key
     */
    public function addValidationMessages(string $key): void {}

    /**
     * @return CustomObject
     */
    public function params(): CustomObject
    {
        /** @var CustomObject $request */
        return $request;
    }

    /**
     * @param string $messageKey
     */
    public function fail(string $messageKey): void { die(400); }
}