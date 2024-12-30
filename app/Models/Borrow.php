<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrows';
    
    protected $fillable = [
        'book1',
        'book2',
        'book3',
    ];

    // Define a relationship to the User model, if needed (you'll have a User model set up in your app).
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
