<?php

namespace App\Exceptions;

use App\Exceptions\Traits\RenderToJson;
use Exception;

class BaseJsonException extends Exception
{
    use RenderToJson;
}
