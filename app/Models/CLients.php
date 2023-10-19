<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class CLients extends Model
{
    protected $fillable = [
        'nom_client',
        'adresse_client',
        'telephone_client',
        'email_client',
        'password',	
    ];
}
