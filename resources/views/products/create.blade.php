 @extends('layouts.app')

@section('content')
<!-- Latest compiled and minified CSS -->
      <!-- page content -->
      <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Product Elements</h3>
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

              <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_code">Product Code<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" id="product_code" name="product_code" required="required" class="form-control ">
                      </div>
                    </div>
                       <div class="item form-group">
                            <label for="category_id" class="col-form-label col-md-3 col-sm-3 label-align">Product Category</label>
                          <div class="col-md-6 col-sm-6 ">
                          <select  name = "category_id" class="form-control productcategory" id="category_id"> 
                           <option value="0" disabled="true" selected="true">-Select-</option>
                            @foreach( $cat_data as $row)
                            <option value="{{$row->id}}">{{$row->cat_name}}</option>
                            @endforeach
                            </select> 
                          </div>
                      </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="Product_name">Product Name <span class="required">*</span>
                      </label>
                       <div class="col-md-6 col-sm-6 ">
                            <select  name = "Product_name" class="form-control product_name" id="Product_name" ><option value="0" disabled="true" selected="true">Product Name</option>
                            </select> 
                       </div>
                  </div>
                    <div class="item form-group">
                      <label for="cutsomer_name" class="col-form-label col-md-3 col-sm-3 label-align">Cutsomer Name <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="cutsomer_name" class="form-control" type="text" name="cutsomer_name">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="place" class="col-form-label col-md-3 col-sm-3 label-align">Place<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="place" class="form-control" type="text" name="place">
                      </div>
                    </div>
                     <div class="item form-group">
                      <label for="buying_price" class="col-form-label col-md-3 col-sm-3 label-align">Buying Price<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="buying_price" class="form-control" type="text" name="buying_price">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="selling_price" class="col-form-label col-md-3 col-sm-3 label-align">Selling Price<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="selling_price" class="form-control" type="text" name="selling_price">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="buy_date" class="col-form-label col-md-3 col-sm-3 label-align">Buy Date<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="buy_date" class="form-control" type="date" name="buy_date">
                      </div>
                    </div>

                    <div class="item form-group">
                            <label for="photo" class="col-form-label col-md-3 col-sm-3 label-align">Photo</label>
                            <img id = "output" src="#" style ="height:100px;width:100px"/>
                            <input type="file" name="photo" id="photo" accept ="image/*" class ="upload" required onchange="loadFile(event)"  class="form-control"
                                   value="{{ old('photo', '') }}" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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


<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
$('.productcategory').on('change',function(e) {
var cat_id = e.target.value;
$.ajax({
url:"{!!URL::to('findProductName')!!}",
type:"GET",
data: {
'cat_id': cat_id
},

success:function (data) {
  console.log(data);
  console.log(cat_id);
$('.product_name').empty();

for(var i=0;i<data.length;i++){
$('.product_name').append('<option value="'+data[i].id+'">'+data[i].product_name+'</option>');
           }

}
})
});
});
</script>


<!-- Dropdawn RelationShip -->

@endsection