<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_ru','name_kz','name_en', 'price', 'description','description_kz','description_ru','description_en', 'massa','category_id','img'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersRated()
    {
        return $this->belongsTomany(User::class)
            ->withTimestamps()
            ->withPivot('rating');
    }

    public function usersBought(){
        return $this->belongsTomany(User::class)
            ->withTimestamps()
            ->withPivot('quality','status');
    }

    public function pays(){
        return $this->hasMany(Pay::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
