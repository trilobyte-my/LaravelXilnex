# Install

Add in `composer.json`

```
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/trilobyte-my/laravel-xilnex"
  }
]
```

Run
```composer require trilobyte-my/laravel-xilnex```

# Usage
Setup appId and token

```
$xil = new \Trilobyte\Xilnex\XilnexApi();
$xil->setAppId("id");
$xil->setToken("token");
```

## Client

```
//Search by fields
$payload = new \Trilobyte\Xilnex\Clients\ClientQueryPayload();
$payload->email = "someone@email.com";
$data = $xil->getClient()->byQuery($payload);

//Get by ID
$data = $xil->getClient()->byId(101);

//Create User
$body = new CreateUserBody();
$body->name = "Test";
$body->email = "test@test.com";
$body->type = "FREE"; //Fixed
$body->group = "Retail"; //Fixed
$body->gender = "male";
$body->dob = Carbon::createFromFormat("Y-m-d", "1989-02-13")->format('Y-m-d\TH:i:s.v\Z');
$body->mobile = "60177777777";
$body->category = "Personal"; //Fixed
$body->createdOutlet = "E-Commerce"; //Fixed

$output = $this->api->getClient()->create($body);
```

##Sales
```
//Search Sales
$payload = new SalesSearchPayload();
$payload->status = "Completed";
$payload->clientid = "4017646";
$payload->datefrom = Carbon::today()->format('Y-m-d\TH:i:s.v\Z');
$payload->dateto = Carbon::today()->endOfDay()->format('Y-m-d\TH:i:s.v\Z');
$output = $this->api->getSales()->bySearch($payload);
```
