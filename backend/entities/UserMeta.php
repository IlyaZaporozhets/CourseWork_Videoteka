<?php


class UserMeta extends Entity
{
    /** @var Field $key */
    private $key;

    /** @var Field $value */
    private $value;

    /** @var Field $user */
    private $user;

    public function __construct()
    {
        $this
            ->setTableName('userMeta')
            ->setSaveVersions(true);

        $this->user = $this->defaultIDField('user');

        $this->key = $this
            ->field('key')
            ->type(self::varchar());

        $this->value = $this
            ->field('value')
            ->type(self::varchar());
    }

    /**
     * @param string $key
     * @param int $user
     * @param bool $returnValue
     * @return UserMeta|false
     * @throws Exception
     */
    public static function get(string $key, int $user, bool $returnValue = true)
    {
        $userMeta = self::typecast(action::database()->select(
            self::getClassName(),
            whereConditions(
                equals('key', $key),
                equals('player', $user)
            )
        ));

        if (!$userMeta->getID()) {
            return false;
        }

        $result = $userMeta->getValue()->getValue();
        return $returnValue ? $userMeta : $result;
    }

    /**
     * @param int $user
     * @param string $key
     * @param string $value
     * @return bool
     * @throws Exception
     */
    public static function set(int $user, string $key, string $value): bool
    {
        /** @var self $preference */
        $preference = self::get($user, $key);

        if (!$preference) {
            $userPreference = new UserMeta();
            $userPreference->getKey()->setValue($key);
            $userPreference->getValue()->setValue($value);
            $userPreference->getUser()->setValue($user);

            return $userPreference->insert();
        }

        $preference->getValue()->setValue($value);

        return $preference->update(['value']);
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
    public function getKey(): Field
    {
        return $this->key;
    }

    /**
     * @param Field $key
     */
    public function setKey(Field $key): void
    {
        $this->key = $key;
    }

    /**
     * @return Field
     */
    public function getValue(): Field
    {
        return $this->value;
    }

    /**
     * @param Field $value
     */
    public function setValue(Field $value): void
    {
        $this->value = $value;
    }
}