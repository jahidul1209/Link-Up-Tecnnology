<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_cus = Customer::all();
        return view('customers.index',compact('all_cus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('customers.create');
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
        'name' => 'required|max:55',
        'email' => 'required|unique:customers',
        'phone' => 'required|max:11',
        'nid_no' => 'required',
        'address' => 'required|max:55',
         'photo' => 'required',
    ]);
     $data = [      
        'name' => $request['name'],
        'email' => $request['email'],
        'phone' => $request['phone'],
        'nid_no' => $request['nid_no'],
        'address' => $request['address'],
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
             // $data->photo = ' ';
        }
        $added =  Customer::create($data);
         return redirect()->route('customers.index');

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
        $custm = Customer::find($id);
        return view('customers.edit', compact('custm'));
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
     $data = [      
        'name' => $request['name'],
        'email' => $request['email'],
        'phone' => $request['phone'],
        'nid_no' => $request['nid_no'],
        'address' => $request['address'],
       ];
      $image=$request->photo;
        if ($image){
            $dltimg = Customer::findOrfail($id);
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
          Customer::where('id', $id)->update($data);
         return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


       $delete = Customer::find($id);
        $image_path ='public/image/'. $delete->photo;
        unlink( $image_path);
          $delete->delete();
          return redirect()->back();
    }
}
