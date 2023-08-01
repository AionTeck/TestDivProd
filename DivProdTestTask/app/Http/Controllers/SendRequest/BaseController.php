<?php

namespace App\Http\Controllers\SendRequest;

use App\Http\Controllers\Controller;
use App\Services\SendRRequest\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
