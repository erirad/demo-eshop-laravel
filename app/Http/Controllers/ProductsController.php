<?php

namespace App\Http\Controllers;
use App\Product;
use App\Size;
use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Session;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $newArrivals = Product::all()->where('created_at', '>=', '2018-08-01 00:00:00');
      //
       $getSessionArray = $request->session()->get('carts');
        $showProducts = Product::findMany($getSessionArray);
        $total = 0;
        foreach ($showProducts as $product) {
          $total+=$product->price;
        }
        //

      return view('index', ['newArrivals' => $newArrivals,'showProducts'=>$showProducts, 'total'=>$total]);
    }


   public function liveSearch(Request $request) {
     if($request->ajax()){
       $value = $request->get('value');
       if($value != '') {
         $data = Product::where('title', 'like', '%'.$value.'%')
         ->orWhere('brand', 'like', '%'.$value.'%')
         ->get();
       }
       $total = $data->count();
       if($total > 0) {
         return view('search', ['data' => $data]);
       } else {
         $output = '<h3>Sorry, there is no product</h3>';
         return $output;
       }
     }

}
     public function sorting(Request $request) {
       if($request->ajax()){
         $value = $request->get('value');
           $data = Product::orderBy('price', $value)->get();
           return view('search', ['data' => $data]);
       }
     }

     public function ordering(Request $request)
     {
       $size = $request->get('size');
       $color = $request->get('color');
       $title = $request->get('title');
       $price = $request->get('price');

       $getOrder = $request->session()->get('order');
       $getOrder[] = $size;

       $request->session()->put('carts', $getOrder);

       return redirect()->back();

     }



    public function add(Request $request, $id)
    {
      $getValues = $request->session()->get('carts');
      $getValues[] = $id;

      $request->session()->put('carts', $getValues);

      return redirect()->back();


    }

    public function cart(Request $request){
      $getSessionArray = $request->session()->get('carts');
      $getOrderArray = $request->session()->get('order');
      $showProducts = Product::findMany($getSessionArray);
      $total = 0;
      foreach ($showProducts as $product) {
        $total+=$product->price;
      }

      return view('cart', ['showProducts'=>$showProducts, 'total'=>$total, 'getOrderArray'=>$getOrderArray]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // $id gautas prekes id kurios nereikia atvaizduoti
    public function unsetSession(Request $request, $id) {
        $getSessionArray = $request->session()->get('carts');
        foreach ($getSessionArray as $key => $value) {
            if($value == $id) {
              unset($getSessionArray[$key]);
            }
        }
        $request->session()->put('carts', $getSessionArray);

        $modifyArray = $request->session()->get('carts');

        $showProducts = Product::findMany($modifyArray);

         return redirect()->back();
    }



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
      $productById = Product::find($id);
      //
      $getSessionArray = $request->session()->get('carts');
      $showProducts = Product::findMany($getSessionArray);
      $total = 0;
      foreach ($showProducts as $product) {
        $total+=$product->price;
      }
      //


      return view('details', ['detail' => $productById, 'showProducts'=>$showProducts, 'total'=>$total]);
    }


    public function fetch(Request $request)
    {

      // $select = $request->get('select');
      // $dependent = $request->get('dependent');
       $id = $request->get('value');
       $oneSize = Size::find($id);

       return view('productColor', ['oneSize'=>$oneSize]);
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
