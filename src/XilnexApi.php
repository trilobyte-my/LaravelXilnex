<?php

namespace Trilobyte\Xilnex;

use Trilobyte\Xilnex\Clients\ClientApi;
use Trilobyte\Xilnex\XilnexCore;

class XilnexApi extends XilnexCore
{
    public function getClient()
    {
        return new ClientApi($this);
    }
}
