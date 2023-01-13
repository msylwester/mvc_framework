<?php
declare(strict_types=1);

namespace App\Models;

class IndexModel
{
    private string $message = 'Strona główna MVC';

    public function __construct()
    {

    }

    public function welcomeMessage(): string
    {
        return $this->message;
    }
}