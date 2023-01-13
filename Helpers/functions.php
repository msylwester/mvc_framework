<?php

function asset(string $name): string
{
    if (! \file_exists($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . ($asset = 'Public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $name))) {
        return '';
    }

    return $asset;
}

function view(string $path): \App\View
{
    return new \App\View($path);
}