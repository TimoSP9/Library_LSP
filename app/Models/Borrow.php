<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrows';
    
    protected $fillable = [
        'name',
        'book1',
        'book2',
        'book3',
        'user_id',
        'return',
    ];

   // Relasi ke User, jika diperlukan
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   // Method untuk menandai buku sudah dikembalikan
   public function tandaiSebagaiDikembalikan()
   {
       $this->update(['return' => 1]);  // Mengubah kolom 'return' jadi 1 (dikembalikan)
   }
}
