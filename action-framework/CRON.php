<?php


class CRON
{
    public $service;

    /** @var string $serviceName */
    public $serviceName;

    /**
     * @param string $className
     * @param string $path
     */
    public function service(string $className, string $path = '/') {}

    /**
     * @param string $method
     * @throws RuntimeException
     */
    public function run(string $method) {}
}