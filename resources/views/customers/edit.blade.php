 @extends('layouts.app')

@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit Elements</h3>
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

              <form method="post" action="{{ route('customers.update',$custm->id) }}" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    @method('PUT')
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="name" name="name" required="required" class="form-control" value="{{$custm->name}}">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="email" name="email" required="required" value="{{$custm->email}}" class="form-control">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="phone" class="col-form-label col-md-3 col-sm-3 label-align">Phone <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="phone" value="{{$custm->phone}}" class="form-control" type="text" name="phone">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="nid_no" class="col-form-label col-md-3 col-sm-3 label-align">NID No <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="nid_no" value="{{$custm->nid_no}}" class="form-control" type="text" name="nid_no">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="address" class="col-form-label col-md-3 col-sm-3 label-align">Address<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="address" value="{{$custm->address}}" class="form-control" type="text" name="address">
                      </div>
                    </div>

                    <div class="item form-group">
                            <label for="photo" class="col-form-label col-md-3 col-sm-3 label-align">Photo</label>
                            <img id = "output" src="#" style ="height:100px;width:100px"/>
                            <input type="file" name="photo" id="photo" accept ="image/*" class ="upload" required onchange="loadFile(event)"  class="form-control"
                                   value="{{ old('photo', $custm->photo) }}" />
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


        <script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
      @endsection