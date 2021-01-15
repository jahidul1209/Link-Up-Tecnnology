<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Add_product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $cat_data  = Category::all();
        return view('products.create',compact('cat_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $validatedData = $request->validate([
        'product_code' => 'required',
        'Product_name' => 'required',
        'category_id' => 'required',
        'cutsomer_name' => 'required',
        'place' => 'required',
         'buying_price' => 'required',
         'selling_price' => 'required',
          'buy_date' => 'required',
         'photo' => 'required',
         
    ]);
     $data = [      
        'product_code' => $request['product_code'],
        'Product_name' => $request['Product_name'],
        'category_id' => $request['category_id'],
        'cutsomer_name' => $request['cutsomer_name'],
        'place' => $request['place'],
        'buying_price' => $request['buying_price'],
        'selling_price' => $request['selling_price'],
        'buy_date' => $request['buy_date'],
       ];

       if($request->hasfile('photo')){
            $path = $request->file('photo');
            $ext=strtolower($path->getClientOriginalExtension());
            $image_full_name =time().'.'.$ext;
            $upload_path= 'public/image/';
            $path->move($upload_path,$image_full_name);
            $data['photo']=$image_full_name;
        }else{
            return $request;
        }
        $added =  Product::create($data);
         return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrfail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro = Product::find($id);
        return view('products.edit', compact('pro'));  
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
          $validatedData = $request->validate([
        'product_code' => 'required|unique:products',
        'Product_name' => 'required',
        'product_category' => 'required',
        'cutsomer_name' => 'required',
        'place' => 'required',
         'buying_price' => 'required',
         'selling_price' => 'required',
         'photo' => 'required',
          'buy_date' => 'required',
    ]);
     $data = [      
        'product_code' => $request['product_code'],
        'Product_name' => $request['Product_name'],
        'product_category' => $request['product_category'],
        'cutsomer_name' => $request['cutsomer_name'],
        'place' => $request['place'],
        'buying_price' => $request['buying_price'],
        'selling_price' => $request['selling_price'],
        'buy_date' => $request['buy_date'],
       ];

      $image=$request->photo;
        if ($image){
            $dltimg = Product::findOrfail($id);
            $image_path ='public/image/'. $dltimg->photo;
            unlink( $image_path);

           $path = $request->file('photo');
            $ext=strtolower($path->getClientOriginalExtension());
            $image_full_name =time().'.'.$ext;
            $upload_path= 'public/image/';
            $path->move($upload_path,$image_full_name);
            $data['photo']=$image_full_name;
        }else{
            return $request;
             // $data->photo = ' ';
        }
          Product::where('id', $id)->update($data);
         return redirect()->route('products.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $delete = Product::find($id);
        $image_path ='public/image/'. $delete->photo;
        unlink( $image_path);
          $delete->delete();
          return redirect()->back();
    }


        public function findProductName(Request $request){

        
        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Add_product::select('product_name','id')->where('category_id',$request->cat_id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }

}
