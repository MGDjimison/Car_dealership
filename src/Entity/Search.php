<?php

namespace App\Entity;

class Search
{
    public $page = 1;

    public string $q = '';

    public array $categories = [];
}