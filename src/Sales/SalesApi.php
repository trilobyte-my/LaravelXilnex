<?php

namespace Trilobyte\Xilnex\Sales;

use Trilobyte\Xilnex\XilnexCore;

class SalesApi
{
    protected $core;

    function __construct($core)
    {
        $this->core = $core;
    }

    public function bySearch(SalesSearchPayload $payload)
    {
        $url = "sales/search";
        return $this->core->get($url, (array)$payload);
    }
}
