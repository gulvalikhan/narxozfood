<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Role;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{

    public function confirm(Cart $cart){
        $cart->update([
            'status' => 'confirmed'
        ]);
        return back()->with('message', __('validation.confirm_pro'));
    }

    public function cartIndex(){
        $x = Auth::user()->dishesCart()->get();
        return view('cart.index', ['cart' => $x]);
    }

    public function product(Request $request){
        if ($request->search){
            $shops = dish::where('name', 'LIKE', '%' .$request->search. '%')
                ->with('category')->get();
        }else{
            $shops = Dish::with('category')->get();
        }
        return view('adm.dishes.product', ['products' => $shops, 'product'=>Dish::all()]);
    }

    public function dishCategory(Category $category){
        $dish = $category->dishes;
        return view('adm.dishes.index', ['dish' =>$dish, 'categories' => Category::all()]);
    }


    public function index(){
        $all = Dish::with('category')->get();
        return view('adm.dishes.index', ['dish'=>$all, 'categories' => Category::all()]);
    }

    public function create(){
        return view('adm.dishes.create', ['categories' => Category::all()]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_kz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'description_kz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'massa' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'img' => 'required|image|mimes:jpg,png,jpeg,,gif,svg'
        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('dishes', $fileName, 'public');
        $validated['img'] = '/storage/'.$image_path;

        Auth::user()->dishes()->create($validated);

        return redirect()->route('adm.dishes.product')->with('message', __('validation.save_pst'));
    }

    public function show(Dish $dish){
        return view('adm.dishes.show', ['dish' => $dish, 'categories' => Category::all()]);
    }

    public function edit(Dish $dish){
        return view('adm.dishes.edit', ['dish' => $dish, 'categories' => Category::all()]);
    }

    public function update(Request $request, Dish $dish){
        $dish->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'massa' => $request->input('massa'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('adm.dishes.product',['categories' => Category::all()])->with('message',__('validation.update_pst'));
    }

    public function destroy(Dish $dish){
        $dish->delete();
        return redirect()->route('adm.dishes.product')->withErrors(__('validation.delete_pst'));
    }
}
