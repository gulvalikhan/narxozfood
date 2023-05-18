<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $fillable = ['cash', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dish(){
        return $this->belongsTo(Dish::class);
    }
}
