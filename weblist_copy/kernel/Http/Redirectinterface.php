<?php

namespace App\Kernel\Http;

interface Redirectinterface
{
    public function to(string $url);
}