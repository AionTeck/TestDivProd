<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Services\Login\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
