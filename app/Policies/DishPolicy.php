<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class DishPolicy
{
    use HandlesAuthorization;


    public function adm(){
        return Auth::user()->role->name != 'user';
    }

}
