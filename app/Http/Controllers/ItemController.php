<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Owner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
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

    public function chartjs(Request $request)
    {
        //transactionテーブルからカテゴリごとのprice*amountを連想配列として欲しい
        $user = Owner::find(Auth::id());

        $transactions = Product::query();

        $year = $request->year;

        if($year != ""){
            $transactions = $transactions->whereYear('transactions.created_at', $year);
            $year = $year . '年度';
        }else{
            $year = "全年度";
        }
        $transactions = $transactions->join('transactions','products.id','=','transactions.product_id')
                                        ->selectRaw('products.id,products.name,
                                        SUM(transactions.price) as price,
                                        SUM(transactions.amount) as amount,
                                        SUM(transactions.price * transactions.amount) as earnings')
                                        ->Where('products.owner_id',Auth::id())
                                        ->groupByRaw('products.id,products.name')
                                        ->get()->toArray();

        //連想配列のキーを指定して配列に格納しなおす
        $name_list = array_column($transactions,'name');
        $earnings_list = array_column($transactions,'earnings');
        $sum = array_sum($earnings_list);
        $sum = number_format($sum). "円";

       // return array($earnings_list,$name_list,$year);

       //dd($transactions,$year,$name_list,$earnings_list);
        return view('chartjs',compact('year','name_list','earnings_list','sum'));
    }

    public function chartGet(Request $request)
    {
        //transactionテーブルからカテゴリごとのprice*amountを連想配列として欲しい
        $user = Owner::find(Auth::id());

        $transactions = Product::query();

        $year = $request->input('year');

        $transactions = $transactions->whereYear('transactions.created_at', $year);
        $transactions = $transactions->join('transactions','products.id','=','transactions.product_id')
                                     ->selectRaw('products.id,products.name,
                                     SUM(transactions.price) as price,
                                     SUM(transactions.amount) as amount,
                                     SUM(transactions.price * transactions.amount) as earnings')
                                     ->Where('products.owner_id',Auth::id())
                                     ->groupByRaw('products.id,products.name')
                                     ->get()->toArray();

        //連想配列のキーを指定して配列に格納しなおす
        $name_list = array_column($transactions,'name');
        $earnings_list = array_column($transactions,'earnings');

        return array($earnings_list,$name_list,$year);
    }
}
