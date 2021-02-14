<?php

class Email
{
    /** @var CustomObject $__object */
    private $__object;
    /** @var CustomObject $user */
    private $user;
    private $html;
    private $plainText;

    /**
     * Email constructor.
     * @param int $id
     * @throws Exception
     */
    public function __construct(int $id)
    {
    }

    /**
     * @return CustomObject
     */
    public function getEmail(): CustomObject
    {
        return $this->__object;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @return string
     */
    public function getPlainText(): string
    {
        return $this->plainText;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    { return ''; }

    /**
     * @return string
     */
    public function getRecipientEmail(): string
    {
        return $this->user->getField('email');
    }

}