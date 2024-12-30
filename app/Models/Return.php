<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'return';
    
    protected $fillable = [
        'book1',
        'book2',
        'book3'
    ];
}