<?php

namespace App;

use App\Exceptions\NoViewException;

class View
{
    private string $path;

    private array $variables;

    public function __construct(string $path, array $variables = [])
    {
        $path = \str_replace('.', DIRECTORY_SEPARATOR, $path) . '.php';

        if (! \file_exists($path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $path)) {
            throw new NoViewException();
        }

        $this->path = $path;
        $this->variables = $variables;
    }

    public function with(string $name, mixed $value): self
    {
        $this->variables[$name] = $value;

        return $this;
    }

    public function render(): string
    {
        ob_start();
        extract($this->variables);
        include($this->path);

        return ob_end_flush();
    }
}