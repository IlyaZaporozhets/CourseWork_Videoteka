<?php

class User extends Entity
{
    public const NO_EMAIL = 'NO_EMAIL';
    public const NO_LOGIN = 'NO_LOGIN';
    public const STATUS_ACTIVE = 1;
    public const STATUS_BLOCKED = 2;

    /** @var Field $email */
    private $email;

    /** @var Field $login */
    private $login;

    /** @var Field $password */
    private $password;

    /** @var Field $fullName */
    private $fullName;

    /** @var Field $registeredDate */
    private $registeredDate;

    /** @var Field $phoneNumber */
    private $phoneNumber;

    /** @var Field $status */
    private $status;

    public function __construct()
    {
        $this
            ->setTableName('user')
            ->setSaveVersions(true);

        $this->login = $this
            ->field('login')
            ->type(self::varchar())
            ->null(false)
            ->default(self::NO_LOGIN);

        $this->email = $this
            ->field('email')
            ->null(false)
            ->type(self::varchar())
            ->default(self::NO_EMAIL);

        $this->password = $this
            ->field('password')
            ->null()
            ->type(self::varchar());

        $this->fullName = $this
            ->field('fullName')
            ->null()
            ->type(self::varchar());

        $this->registeredDate = $this
            ->field('registeredDate')
            ->null(false)
            ->type(self::TYPE_TIMESTAMP)
            ->default(self::CURRENT_TIMESTAMP);

        $this->phoneNumber = $this
            ->field('phoneNumber')
            ->null()
            ->type(self::varchar());

        $this->status = $this
            ->field('status')
            ->null(false)
            ->type(self::tinyint())
            ->default(self::STATUS_ACTIVE);
    }

    /**
     * @return Field
     */
    public function getEmail(): Field
    {
        return $this->email;
    }

    /**
     * @param Field $email
     */
    public function setEmail(Field $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Field
     */
    public function getPassword(): Field
    {
        return $this->password;
    }

    /**
     * @param Field $password
     */
    public function setPassword(Field $password): void
    {
        $this->password = $password;
    }

    /**
     * @return Field
     */
    public function getFullName(): Field
    {
        return $this->fullName;
    }

    /**
     * @param Field $fullName
     */
    public function setFullName(Field $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return Field
     */
    public function getRegisteredDate(): Field
    {
        return $this->registeredDate;
    }

    /**
     * @param Field $registeredDate
     */
    public function setRegisteredDate(Field $registeredDate): void
    {
        $this->registeredDate = $registeredDate;
    }

    /**
     * @return Field
     */
    public function getPhoneNumber(): Field
    {
        return $this->phoneNumber;
    }

    /**
     * @param Field $phoneNumber
     */
    public function setPhoneNumber(Field $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return Field
     */
    public function getLogin(): Field
    {
        return $this->login;
    }

    /**
     * @param Field $login
     */
    public function setLogin(Field $login): void
    {
        $this->login = $login;
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
     * @return User
     * @throws Exception
     */
    public static function getCurrentUser(): User
    {
        return self::getDataObjectByID((int)Helper::getSessionParam('user'));
    }
}