<?php


namespace Multiviz\Request;


class Environment implements \Multiviz\Resources\Enviroment {
    private $api;

    /**
     * Environment constructor.
     *
     * @param $api
     * @param $apiQuery
     */
    private function __construct($api)
    {
        $this->api      = $api;
    }

    /**
     * @return Environment
     */
    public static function sandbox()
    {
        $api      = 'https://api-homo.multivis.com/api/';

        return new Environment($api);
    }

    /**
     * @return Environment
     */
    public static function production()
    {
        $api      = 'https://api-homo.multivis.com/api';

        return new Environment($api);
    }

    public function getUrl() {
        return $this->api;
    }
}
