 @extends('layouts.app')

@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Add Product Elements</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
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
                  <h2>Form Design <small>different form elements</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
 
              <form method="post" action="{{ route('add_products.store') }}" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf

                       <div class="item form-group">
                            <label for="category_id" class="col-form-label col-md-3 col-sm-3 label-align">Product Category</label>
                          <div class="col-md-6 col-sm-6 ">
                            <select  name = "category_id" class="form-control" id="category_id"> 
                            <option disabled="" selected="">Select....</option>
                            @foreach( $cat_data as $row)
                            <option value="{{$row->id}}">{{$row->cat_name}}</option>
                            @endforeach
                            </select> 
                          </div>
                      </div>




                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_name">Product Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="product_name" name="product_name" required="required" class="form-control">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form> 
                </div>
              </div>
            </div>
          </div>
        </div>

      @endsection