@extends('layouts.app')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="page-title">
              <div class="title_left">
                <h3>All Products Information</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-5 col-sm-5">
             <div class="pricing " style="padding-top: 20px; padding-bottom: 0px">
                           <div class="price_card text-center " style="padding-bottom: 0px; border: 1px solid #317eeb;">
                                    <table class = "table">
                                      <thead class="bg-primary">
                                      <tr>
                                        <th  class="text-white" >Name</th>
                                        <th  class="text-white">Qty</th>
                                        <th  class="text-white">Price</th>
                                        <th  class="text-white">Total</th>
                                        <th  class="text-white">Action</th>
                                      </tr>
                                      </thead>
                      
                                 @php
                               $cart_prod = Cart::content();
                               @endphp
                      
                                  <tbody style="padding: 20px">
                                    @foreach($cart_prod as $prod)

                                  <tr style="color: black; font-size: 18px;border-bottom: 2px solid #317eeb">     
                                    <td>{{$prod->name}}</td>
                                    <td>
                                  <form role="form" method = "post" action = "{{ route('pointofsell.update',$prod->rowId)}}">
                                      @csrf
                                        @method('PUT')

                                      <input type="number" name="qty" value="{{$prod->qty}}" style="width: 45px">
                                      <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px" ><i class="fa fa-check" style=" color :white ;font-size : 15px;" ></i></button>
                                  </form>
                                    </td>
                                    <td>{{$prod->price}}</td>
                                    <td>{{$prod->price*$prod->qty}}</td>

                                    <td>

                                  <form role="form" method = "post" action = "{{ route('pointofsell.destroy',$prod->rowId)}}">
                                      @csrf
                                       @method('PUT')
                                      <button type="submit" class="btn btn-sm btn-default" style="color :red ;font-size : 20px" ><i class="fa fa-trash" ></i></button>
                                  </form></td>
                  
                                  </tr>
                                  @endforeach
                                   </tbody>
                                </table>
                                
                                 <ul class="price-features" style="color: black; font-size: 25px;">
                                    <li>Quantity : {{Cart::count()}} </li>
                                    <li>Sub Total : {{Cart::subtotal()}}</li>
                                    <li>Vat : {{Cart::tax()}}</li>
                                </ul>
                                 <div class="pricing-footer bg-primary"  style="padding: 10px">
                                    <span  style=" font-size: 24px">Total Price : {{Cart::total()}} Tk</span>
                                </div>

                                </div>
                    </div> <!-- end Pricing_card -->

            </div>
  
              <div class="col-md-7 col-sm-7 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Products<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>    

                        <tr>
                          <th>Photo</th>
                          <th>Product Code</th>
                          <th>Product Name</th>
                          <th>Product Category</th>
                          <th>Buying Price</th>
                        </tr>
                      </thead>

				    <tbody>
                    @foreach($data as $product)
                      <tr>
                        <form action="{{route('pointofsell.store')}}" method="POST">
                            @csrf

                          <input type="hidden" name="id" value="{{$product -> id}}">
                          <input type="hidden" name="name" value="{{$product ->product->product_name}}">
                          <input type="hidden" name="qty" value="1">
                          <input type="hidden" name="price" value="{{$product -> selling_price}}">
                          <input type="hidden" name="weight" value="550">
                           <td>
                            <button type ="submit" class="btn-default" ><i class = "fa fa-plus-square" style="font-size: 20px;"> </i>
                            <img src="{{asset('public/image/'.$product->photo)}}"  style ="height:70px;width:70px"/></button></td>

                          <td>{{$product->product_code}}</td>
                          <td>{{$product->product->product_name}}</td>
                          <td>{{$product->categories->cat_name}}</td>
                          <td>{{$product->buying_price}}</td>
                        </form>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>


           </div></div></div></div>

        <!-- /page content -->
@endsection
