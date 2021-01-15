@extends('layouts.app')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">

            <div class="page-title">
              <div class="title_left">
                <h3>All Customers Information</h3>
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
                    <h2>Customers<small>Users</small></h2>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phome</th>
                          <th>NID No</th>
                          <th>Address</th>
                          <th>Photo</th>
                         <th>Action</th>
                        </tr>
                      </thead>
				@php
				$data = DB::table('customers')->get();
				@endphp
				    <tbody>
                      	@foreach($data as $cus)
                        <tr>
                          <td>{{$cus->name}}</td>
                          <td>{{$cus->email}}</td>
                          <td>{{$cus->phone}}</td>
                          <td>{{$cus->nid_no}}</td>
                          <td>{{$cus->address}}</td>
                          <td><img src="{{asset('public/image/'.$cus->photo)}}"  style ="height:80px;width:80px"/></td>
                          <td class=" last"><a href="#">View</a>
                          	|| <a href="{{route('customers.edit',$cus->id)}}">Edit</a>
                          	|| <form class="inline-block" action="{{ route('customers.destroy', $cus->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
