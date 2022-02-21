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
```
