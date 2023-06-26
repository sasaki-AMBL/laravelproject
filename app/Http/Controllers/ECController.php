<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ECController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $products = Product::pagenate(5);
        // return view('user.index',compact('products'));

        $categorys = Category::all();

        // if($request->category != ""){
        //     $products = Product::where('category_id',"$request->category_id")->paginate(5);
        // }else{
        //     $products = Product::paginate(5);
        //     //$products = Product::all();
        // }

        //$products = DB::table('products');
        $products = Product::paginate(5);
        //$products = Product::select('*');

        if($request->search != ""){
            $products->where('name','LIKE',"%$request->search%");
        }
        if($request->category_id != ""){
            $products->where('category_id',"$request->category_id");
        }
        if($request->sort == "desc"){
            $products->orderByDesc('id');
        }

        //$products->paginate(5);
        return view('user.index',compact('products','categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $products = Product::find($request->product_id);
        // dd($products);
        $products->stock -= $request->amount;
        $products->save();

        return redirect('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $products = Product::find($id);
        return view('user.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
