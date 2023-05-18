<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function dishesCart(){
        return $this->belongsToMany(Dish::class,'dish_user')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function dishesRated()
    {
        return $this->belongsToMany(Dish::class)
            ->withTimestamps()
            ->withPivot('rating');
    }

    public function dishesBought()
    {
        return $this->belongsToMany(Dish::class)
            ->withTimestamps()
            ->withPivot( 'quantity', 'status');
    }

    public function productsWithStatus($status)
    {
        return $this->belongsToMany(Dish::class)
            ->wherePivot('status', $status)
            ->withTimestamps()
            ->withPivot( 'quantity', 'status')
            ->using(Cart::class);
    }

    public function pays(){
        return $this->hasMany(Pay::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
