<?php

namespace Service;

class StatsStorage extends AbstractStorage
{
    private const PATH = __DIR__.'/../resources/';
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function fetchAll()
    {
        $json = file_get_contents(sprintf('%s%s.json', self::PATH, $this->name));

        return json_decode($json, true);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}