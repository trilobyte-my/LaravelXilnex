<?php

namespace Trilobyte\Xilnex\Clients;

use Trilobyte\Xilnex\XilnexCore;

class ClientApi
{
    protected $core;

    function __construct($core)
    {
        $this->core = $core;
    }

    public function byQuery(ClientQueryPayload $payload)
    {
        $url = "clients/query";
        return $this->core->get($url, (array)$payload);
    }

    public function byId($id)
    {
        $url = "clients/$id";
        return $this->core->get($url);
    }

    public function create(CreateUserBody $body)
    {
        $url = "clients";

        $realBody = [];
        $realBody['client'] = (array)$body;
        return $this->core->post($url, $realBody);
    }

    public function update($id, CreateUserBody $body)
    {
        $url = "clients/$id";

        $realBody = [];
        $realBody['client'] = (array)$body;

        return $this->core->put($url, $realBody);
    }
}
