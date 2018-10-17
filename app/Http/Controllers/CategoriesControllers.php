<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Product;

class CategoriesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function unlialia(Request $request){


   }

    public function index(Request $request)
    {

        $newArrivals = Product::where('created_at', '>=', '2018-08-01 00:00:00')->paginate(6);

       $allItems = Item::all();
       //
       $getSessionArray = $request->session()->get('carts');
       $showProducts = Product::findMany($getSessionArray);
       $total = 0;
       foreach ($showProducts as $product) {
         $total+=$product->price;
       }
       //

       return view('products', ['allItems' => $allItems, 'new' =>$newArrivals, 'showProducts'=>$showProducts, 'total'=>$total]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $itemById = Item::find($id);

        //
        $getSessionArray = $request->session()->get('carts');
        $showProducts = Product::findMany($getSessionArray);
        $total = 0;
        foreach ($showProducts as $product) {
          $total+=$product->price;
        }
        //
        return view('products', ['item' => $itemById, 'showProducts'=>$showProducts, 'total'=>$total]);
    }
    public function showMore(Request $request, $id)
    {
        $categoryById = Category::find($id);

        //
        $getSessionArray = $request->session()->get('carts');
        $showProducts = Product::findMany($getSessionArray);
        $total = 0;
        foreach ($showProducts as $product) {
          $total+=$product->price;
        }
        //

        return view('products', ['category' => $categoryById, 'showProducts'=>$showProducts, 'total'=>$total]);
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
