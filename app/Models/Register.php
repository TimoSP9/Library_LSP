<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'register'; // Specify the correct table name here
    // protected $connection = 'mariaDB';  // Ensure it is pointing to the 'library' database

    protected $fillable = [
        'email',
        'password',
        'status',
    ];

    // Implement required methods from Authenticatable interface

    public function getAuthIdentifierName()
    {
        return 'id'; // Your unique identifier column
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // The primary key value
    }

    public function getAuthPassword()
    {
        return $this->password; // The password field
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Optional: for "remember me" functionality
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Optional
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Optional
    }

    // Add this method if it's required
    public function getAuthPasswordName()
    {
        return 'password'; // The name of the password field
    }
}
