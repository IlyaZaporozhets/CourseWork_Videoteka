<?php


class action
{
    /**
     * @return ActionCore
     */
    public static function core(): ActionCore
    {
        /** @var ActionCore $core */
        global $core;
        return $core;
    }

    /**
     * @return string
     */
    public static function serverInstance(): string
    {
        global $runConfig;
        return $runConfig;
    }

    /**
     * @param string $key
     * @return ALGCore
     */
    public static function encryptCore(string $key = ''): ALGCore
    {
        $encrypt = new ALGCore();
        if ($key !== '')
            $encrypt->setKey($key);

        return $encrypt;
    }

    /**
     * @return ActionDatabase
     */
    public static function database(): ActionDatabase
    {
        return self::core()->database();
    }

    /**
     * @param string $entityName
     * @param string $path
     * @param bool $return
     * @return mixed
     */
    public static function entity(string $entityName, string $path = SAME_PATH, bool $return = true)
    {
        return self::instance($entityName, ENTITIES_PATH, 'Entity', $path, $return);
    }

    /**
     * @param string $serviceClassName
     * @param string $path
     * @param bool $return
     * @return mixed
     */
    public static function service(string $serviceClassName, string $path = SAME_PATH, bool $return = true)
    {
        return self::instance($serviceClassName, SERVICES_PATH, 'Service', $path, $return);
    }

    /**
     * @param string $daoClassName
     * @param string $path
     * @param bool $return
     * @return mixed
     */
    public static function dao(string $daoClassName, string $path = SAME_PATH, bool $return = true)
    {
        return self::instance($daoClassName, DAO_PATH, 'DAO', $path, $return);
    }

    /**
     * @param string $cronServiceClassName
     * @param string $path
     * @param bool $return
     * @return mixed
     */
    public static function cron(string $cronServiceClassName, string $path = SAME_PATH, bool $return = true)
    {
        return self::instance($cronServiceClassName, CRON_SERVICES_PATH, 'CRON Service', $path, $return);
    }

    /**
     * @param string $validatorClassName
     * @param string $path
     * @param bool $return
     * @return Validator
     */
    public static function validator(string $validatorClassName, string $path = SAME_PATH, bool $return = true)
    {
        return self::instance($validatorClassName, VALIDATORS_PATH, 'Validator', $path, $return);
    }

    /**
     * @param string $moduleClassName
     * @param string $path
     * @param bool $return
     * @return mixed
     */
    public static function module(string $moduleClassName, string $path = SAME_PATH, bool $return = true)
    {
        /** @var mixed $module */
        return $module;
    }

    /**
     * @param $className
     * @param array $options
     * @return mixed
     */
    public static function include($className, array $options = [])
    {
        /** @var mixed $include */
        return $include;
    }

    /**
     * @param string $moduleClassName
     * @param string $path
     * @param bool $return
     * @return mixed
     */
    public static function loadGlobalModule(string $moduleClassName, string $path = SAME_PATH, bool $return = false)
    {
        /** @var mixed $module */
        return $module;
    }

    /**
     * @param string $className
     * @param string $destinationPath
     * @param string $instanceDescription
     * @param string $subPath
     * @param bool $returnInstance
     * @return mixed
     */
    private static function instance(
        string $className,
        string $destinationPath = '',
        string $instanceDescription = '',
        string $subPath = SAME_PATH,
        bool $returnInstance = true
    ) {
        /** @var mixed $instance */
        return $instance;
    }
}