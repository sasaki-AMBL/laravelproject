<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Owner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('owner_id', '=', Auth::id())->get();
        //dd($products);
        return view('owner.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();

        return view('owner.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validate([
            'image' => 'image',
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'display' => 'required'
        ]);


        if ($request->has('image')) {
            $file_path = $request->image->store('images', 'public');
        } else {
            $file_path = "";
        }
        /* UploadImage オブジェクトを生成 */
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $file_path,
            'category_id' => $request->category_id,
            'owner_id' => Auth::id(),
            'stock' => $request->stock,
            'display' => $request->display
        ]);

        return redirect('owner/item/index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        // url直打ち対策
        if (is_null($product) || $product->owner_id != Owner::find(Auth::id())->id) {
            return redirect()->route('owner.item.index');
        }

        return view('owner.edit', compact('product'));
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
        //validationだが効果不明
        $validated = $request->validate([
            // 'price' => 'integer', =>'string'でも引っかからない
            'image' => 'image',
        ]);

        $stock = Product::find($id);
        // url直打ち対策
        if (is_null($stock) || $stock->owner_id != Owner::find(Auth::id())->id) {
            return redirect()->route('owner.item.index');
        }

        if ($request->has('image')) {
            $file_path = $request->image->store('images', 'public');
        } else {
            $file_path = $stock->image;
        }

        //$now = $stock->stock + $request->stock;
        //dd($stock->stock,$request->stock,$now);
        Product::where('id', $id)->update([
            'price' => $request->price,
            'image' => $file_path,
            'stock' => $stock->stock + $request->stock,
            'display' => $request->display
        ]);

        return redirect('owner/item/index');
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

    public function chartjs()
    {
        return view('chartjs');
    }

    public function chartGet()
    {
        //transactionテーブルからカテゴリごとのprice*amountを連想配列として欲しい
        $user = User::find(Auth::id());


        // 固定データを返却。DBからデータを取得すると良い
        return [12, 19, 31, 25, 2, 26, 87];
    }
}
