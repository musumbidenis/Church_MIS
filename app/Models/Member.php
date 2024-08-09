<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Define the primary key (optional, if different from default)
    protected $primaryKey = 'memberID';

    // Define whether the model should use timestamps (optional, if not using default timestamps)
    public $timestamps = true;

    // Specify which attributes are mass assignable
    protected $fillable = ['firstName', 'middleName', 'surname', 'gender', 'DOB', 'telephone', 'email', 'nearestPrimary', 'address', 'town', 'houseNumber', 'nearestStreet', 'village'];


}
