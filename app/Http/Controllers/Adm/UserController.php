<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cart;
class UserController extends Controller
{

    public function cart(){
        $dishesInCart = Cart::where('status','ordered')->with(['dish','user'])->get();
        return view('adm.cart',['dishesInCart'=>$dishesInCart]);
    }

    public function index(Request $request){
        if ($request->search){
            $users = User::where('name', 'LIKE', '%' .$request->search. '%')
                ->orWhere('email', 'LIKE', '%' .$request->search. '%')
                ->with('role')->get();
        }else{
            $users = User::with('role')->get();
        }
        return view('adm.users', ['users' => $users, 'user'=>User::all()]);
    }


    public function ban(User $user){
        $user->update([
            'is_active' => false,
        ]);
        return back()->withErrors(__('validation.user_ban'));
    }

    public function unban(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back()->with('message', __('validation.user_unban'));
    }

    public function edit(User $user){
        return view('adm.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(Request $request, User $user){
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
        ]);
        return redirect()->route('adm.users')->with('message', __('validation.role_upd'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('adm.users')->withErrors(__('validation.user_delete'));
    }}
