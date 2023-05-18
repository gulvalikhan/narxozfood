<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{

    use HasFactory;
    protected $table='dish_user';
    protected $fillable=['dish_id','user_id', 'quantity','status'];

    public function  dish(){
        return $this->belongsTo(Dish::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
