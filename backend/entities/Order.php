<?php


class Order extends Entity
{
    public const STATUS_PENDING = 1;
    public const STATUS_ACCEPTED = 2;
    public const STATUS_COMPLETED = 3;
    public const STATUS_CANCELED = 4;
    public const EXPIRATION_NOT_SET = 'not set';

    /** @var Field $user */
    private $user;

    /** @var Field $item */
    private $item;

    /** @var Field $status */
    private $status;

    /** @var Field $date */
    private $date;

    /** @var Field $expiration */
    private $expiration;

    public function __construct()
    {
        $this
            ->setTableName('order')
            ->setSaveVersions(true);

        $this->user = $this->defaultIDField('user');

        $this->item = $this->defaultIDField('item');

        $this->status = $this
            ->field('status')
            ->type(self::tinyint());

        $this->date = $this
            ->field('date')
            ->type(self::varchar());

        $this->expiration = $this
            ->field('expiration')
            ->type(self::varchar());
    }

    /**
     * @return Field
     */
    public function getUser(): Field
    {
        return $this->user;
    }

    /**
     * @param Field $user
     */
    public function setUser(Field $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Field
     */
    public function getItem(): Field
    {
        return $this->item;
    }

    /**
     * @param Field $item
     */
    public function setItem(Field $item): void
    {
        $this->item = $item;
    }

    /**
     * @return Field
     */
    public function getStatus(): Field
    {
        return $this->status;
    }

    /**
     * @param Field $status
     */
    public function setStatus(Field $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Field
     */
    public function getDate(): Field
    {
        return $this->date;
    }

    /**
     * @param Field $date
     */
    public function setDate(Field $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Field
     */
    public function getExpiration(): Field
    {
        return $this->expiration;
    }

    /**
     * @param Field $expiration
     */
    public function setExpiration(Field $expiration): void
    {
        $this->expiration = $expiration;
    }


}