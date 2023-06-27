<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMail;

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


        $products = Product::query();
        $products->where('display','!=',0);
        if($request->search != ""){
            $products = $products->where('name','LIKE',"%$request->search%");
        }
        if($request->category_id != ""){
            $products = $products->where('category_id',"$request->category_id");
        }
        if($request->sort == "desc"){
            $products = $products->orderByDesc('id');
        }

        $products = $products->paginate(5);
        //dd($products);
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

        // url直打ち対策　
        if (is_null($products) || $products->display === 0) {
            return redirect()->route('user.index');
        }

        //異常な数値を送信された場合用
        DB::beginTransaction();
        try {

            $products->stock -= $request->amount;
            $products->save();

            $user = User::find(Auth::id());
            $user->products()->attach($request->product_id,[
                'amount'=>$request->amount,
                'created_at'=>new Carbon('now'),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        // Transaction::create([
        //     'user_id'=>$user->id,
        //     'product_id'=>$request->product_id,
        //     'amount'=>$request->amount
        // ]);

        SendMail::dispatch();

        return redirect()->route('user.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $products = Product::find($id);
        // url直打ち対策　
        if (is_null($products) || $products->display === 0) {
            return redirect()->route('user.index');
        }

        return view('user.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function history(){
        $user=User::find(Auth::id());
        return view('user.history',compact('user'));

    }



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
