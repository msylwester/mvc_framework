<?php

namespace App;

class ServerError
{
    public function __construct(public int $code, public string $message)
    {
    }
}