<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbps extends Model
{
    use HasFactory;

   
    protected $table = 'mbps'; 

 
    protected $fillable = [
        'name',         
        'deskripsi',            
    ];
}
