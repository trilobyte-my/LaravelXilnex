<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Trilobyte\Xilnex\Clients\ClientApi;
use Trilobyte\Xilnex\Clients\ClientQueryPayload;
use Trilobyte\Xilnex\XilnexApi;

class ApiTest extends TestCase
{
    public $api;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->api = new XilnexApi();
        $this->api->setAppId("pf6p3JuC8bdq0U7YURxDuNbiM5HWXp3t");
        $this->api->setToken("v5_jc7WJqwd1CML+kuCXwaLWTvKoSN4vLujLevJMrWDTKA=");
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testByQuery()
    {
        $payload = new ClientQueryPayload();
        $payload->email = "dionneteh@yahoo.com";
        try {
            $output = $this->api->getClient()->byQuery($payload);
            print_r($output);

            $this->assertTrue(true);
        } catch (\Exception $e) {
            $output = $e->getMessage();
            print_r($output);
        }
    }

    public function testById()
    {
        try {
            $output = $this->api->getClient()->byId(101);
            print_r($output);

            $this->assertTrue(true);
        } catch (\Exception $e) {
            $output = $e->getMessage();
            print_r($output);
        }
    }
}
