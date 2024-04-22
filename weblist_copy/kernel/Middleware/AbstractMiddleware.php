<?php

namespace App\Kernel\Middleware;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Http\Redirectinterface;
use App\Kernel\Http\RequestInterface;

abstract class AbstractMiddleware
{
    public function __construct(
        protected RequestInterface $request,
        protected AuthInterface $auth,
        protected Redirectinterface $redirect
    ){
    }
    abstract public function handle(): void;
}
