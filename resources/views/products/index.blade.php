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
              <div class="col-md-12 col-sm-12 ">
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
                          <th>Product Code</th>
                          <th>Product Name</th>
                          <th>Product Category</th>
                          <th>Customer Name</th>
                          <th>Place</th>
                          <th>Buying Price</th>
                          <th>Selling Price</th>
                          <th>Buy Date</th>
                          <th>Photo</th>
                         <th>Action</th>
                        </tr>
                      </thead>

				    <tbody>
                      	@foreach($data as $product)
                        <tr>
                          <td>{{$product->product_code}}</td>
                          <td>{{$product->product->product_name}}</td>
                          <td>{{$product->categories->cat_name}}</td>
                          <td>{{$product->cutsomer_name}}</td>
                          <td>{{$product->place}}</td>
                          <td>{{$product->buying_price}}</td>
                          <td>{{$product->selling_price}}</td>
                          <td>{{$product->buy_date}}</td>
                          <td><img src="{{asset('public/image/'.$product->photo)}}"  style ="height:80px;width:80px"/></td>
                          <td class=" last"><a href="{{route('products.show',$product->id)}}">View</a>
                          	|| <a href="{{route('products.edit',$product->id)}}">Edit</a>
                          	|| <form class="inline-block" action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                          <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="text-danger" value="Delete">
                                            </form>
                            </td>
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
