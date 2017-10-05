<?php

namespace Models;

class Product extends \Database
{
    public $table = 'products';
    public $allowed = ['title', 'description', 'price'];
}