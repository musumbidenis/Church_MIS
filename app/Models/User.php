<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    // Define the primary key (optional, if different from default)
    protected $primaryKey = 'memberID';
}
