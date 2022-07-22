<?php
namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Contact extends DataLayer
{
    public function __construct()
    {
        parent::__construct("contacts", ['name','email','message']);
    }


}