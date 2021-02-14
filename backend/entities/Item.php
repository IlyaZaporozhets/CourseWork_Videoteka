<?php


class Item extends Entity
{
    public const STATUS_AVAILABLE = 1;
    public const STATUS_NOT_AVAILABLE = 2;
    public const STATUS_HIDDEN = 3;

    /** @var Field $name */
    private $name;

    /** @var Field $cost */
    private $cost;

    /** @var Field $description */
    private $description;

    /** @var Field $type */
    private $type;

    /** @var Field $amount */
    private $amount;

    /** @var Field $image */
    private $image;

    /** @var Field $date */
    private $date;

    public function __construct()
    {
        $this
            ->setTableName('item')
            ->setSaveVersions(true);

        $this->name = $this
            ->field('name')
            ->type(self::varchar());

        $this->cost = $this
            ->field('cost')
            ->type(self::int());

        $this->description = $this
            ->field('description')
            ->type(self::varchar());

        $this->type = $this
            ->field('type')
            ->type(self::tinyint());

        $this->amount = $this
            ->field('amount')
            ->type(self::int());

        $this->image = $this
            ->field('image')
            ->type(self::varchar());

        $this->date = $this
            ->field('date')
            ->type(self::varchar());
    }

    /**
     * @return Field
     */
    public function getName(): Field
    {
        return $this->name;
    }

    /**
     * @param Field $name
     */
    public function setName(Field $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Field
     */
    public function getCost(): Field
    {
        return $this->cost;
    }

    /**
     * @param Field $cost
     */
    public function setCost(Field $cost): void
    {
        $this->cost = $cost;
    }

    /**
     * @return Field
     */
    public function getDescription(): Field
    {
        return $this->description;
    }

    /**
     * @param Field $description
     */
    public function setDescription(Field $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Field
     */
    public function getType(): Field
    {
        return $this->type;
    }

    /**
     * @param Field $type
     */
    public function setType(Field $type): void
    {
        $this->type = $type;
    }

    /**
     * @return Field
     */
    public function getAmount(): Field
    {
        return $this->amount;
    }

    /**
     * @param Field $amount
     */
    public function setAmount(Field $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return Field
     */
    public function getImage(): Field
    {
        return $this->image;
    }

    /**
     * @param Field $image
     */
    public function setImage(Field $image): void
    {
        $this->image = $image;
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

}