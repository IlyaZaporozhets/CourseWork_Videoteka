<?php


class Waitlist extends Entity
{
    public const STATUS_PENDING = 1;
    public const STATUS_NOT_PENDING = 2;

    /** @var Field $item */
    private $item;

    /** @var Field $status */
    private $status;

    /** @var Field $user */
    private $user;

    public function __construct()
    {
        $this
            ->setTableName('waitlist')
            ->setSaveVersions(true);

        $this->item = $this->defaultIDField('item');

        $this->user = $this->defaultIDField('user');

        $this->status = $this
            ->field('status')
            ->default(self::STATUS_PENDING)
            ->type(self::tinyint());
    }

    /**
     * @param $item
     * @return bool|mixed
     * @throws Exception
     */
    public static function add($item): bool
    {
        $wait = new Waitlist();

        $wait->getItem()->setValue($item);
        $wait->getUser()->setValue(Helper::getSessionParam('user'));

        return $wait->safeInsert(whereConditions(
            equals('item', $item),
            equals('user', $wait->getUser()->getValue()),
            equals('status', self::STATUS_PENDING)
        ));
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function updateStatus($id)
    {
        /** @var Waitlist $wait */
        $wait = self::getDataObjectByID((int)$id);

        $wait->getStatus()->setValue(self::STATUS_NOT_PENDING);

        return $wait->update(['status']);
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


}