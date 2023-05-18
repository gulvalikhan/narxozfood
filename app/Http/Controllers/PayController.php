<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function index(){
        $paycheck = Pay::all();
        return view('pay.index', ['paycheck' => $paycheck, 'categories' => Category::all()]);
    }

    public function create(){
        return view('pay.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'cash' => 'required|numeric',
            'wallet_id' => 'numeric'
        ]);
        Auth::user()->pays()->create($validated);
        return redirect()->route('pay.index')->with('message' , __('validation.pay_add'));
    }

    public function edit(Pay $paycheck){
        return view('pay.edit', ['paycheck' => $paycheck]);
    }

    public function update(Request $request, Pay $paycheck){
        $paycheck->update([
            'cash' => $request->input('cash'),
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->route('pay.index')->with('message', __('validation.pay_up'));
    }

    public function destroy(Pay $paycheck){
        $paycheck->delete();
        return redirect()->route('pay.index')->withErrors(__('validation.pay_del'));
    }
}
