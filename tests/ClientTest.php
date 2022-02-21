<?php

namespace Tests\Feature;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Trilobyte\Xilnex\Clients\ClientApi;
use Trilobyte\Xilnex\Clients\ClientQueryPayload;
use Trilobyte\Xilnex\Clients\CreateUserBody;
use Trilobyte\Xilnex\Sales\SalesSearchPayload;
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
    // public function testByQuery()
    // {
    //     $payload = new ClientQueryPayload();
    //     $payload->email = "dionneteh@yahoo.com";
    //     try {
    //         $output = $this->api->getClient()->byQuery($payload);
    //         print_r($output);

    //         $this->assertTrue(true);
    //     } catch (\Exception $e) {
    //         $output = $e->getMessage();
    //         print_r($output);
    //     }
    // }

    // public function testById()
    // {
    //     try {
    //         $output = $this->api->getClient()->byId(4017646);
    //         print_r($output);

    //         $this->assertTrue(true);
    //     } catch (\Exception $e) {
    //         $output = $e->getMessage();
    //         print_r($output);
    //     }
    // }

    public function testSalesSearch()
    {
        try {
            $payload = new SalesSearchPayload();
            $payload->status = "Completed";
            $payload->datefrom = Carbon::today()->format('Y-m-d\TH:i:s.v\Z');
            $payload->dateto = Carbon::today()->endOfDay()->format('Y-m-d\TH:i:s.v\Z');
            $output = $this->api->getSales()->bySearch($payload);
            print_r($output);

            $this->assertTrue(true);
        } catch (\Exception $e) {
            $output = $e->getMessage();
            print_r($output);
        }
    }

    // public function testCreateClient()
    // {
    //     try {
    //         $body = new CreateUserBody();
    //         $body->name = "Test";
    //         $body->email = "test@test.com";
    //         $body->type = "FREE"; //Fixed
    //         $body->group = "Retail"; //Fixed
    //         // $body->gender = "male";
    //         // $body->dob = Carbon::createFromFormat("Y-m-d", "1989-02-13")->format('Y-m-d\TH:i:s.v\Z');
    //         $body->mobile = "60177777777";
    //         $body->category = "Personal"; //Fixed
    //         $body->createdOutlet = "E-Commerce"; //Fixed

    //         $output = $this->api->getClient()->create($body);
    //         print_r($output);
    //         $this->assertTrue(true);
    //     } catch (\Exception $e) {
    //         $output = $e->getMessage();
    //         print_r($output);
    //     }
    // }

    // public function testUpdateClient()
    // {
    //     try {
    //         //Must resend all or else will get replace with empty value
    //         $body = new CreateUserBody();
    //         $body->name = "Test";
    //         $body->email = "test@test.com";
    //         $body->type = "FREE"; //Fixed
    //         $body->group = "Retail"; //Fixed
    //         $body->gender = "male";
    //         $body->dob = Carbon::createFromFormat("Y-m-d", "1989-02-13")->format('Y-m-d\TH:i:s.v\Z');
    //         $body->mobile = "60177777777";
    //         $body->category = "Personal"; //Fixed
    //         $body->createdOutlet = "E-Commerce"; //Fixed

    //         //Update Only
    //         $body->enableDOB = true;

    //         $output = $this->api->getClient()->update(9009, $body);
    //         print_r($output);
    //         $this->assertTrue(true);
    //     } catch (\Exception $e) {
    //         $output = $e->getMessage();
    //         print_r($output);
    //     }
    // }
}
