@extends('CMS.components.index')
@section('content')


<div id="page-title">
    <h2>Thêm dịch vụ</h2>
    
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
    <div class="row" style="padding-top: 25px;">
        <div class="content-box bg-white post-box col-md-12 ">
            <form id="frm_add_task" name="frm_add_task" action="" method="post"  enctype="multipart/form-data">
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="task_description" >Chọn loại hình: </label>
                        <select class="form-control" name="assigner_user_id">
                                <option>TEXT</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="task_name">Tên dịch vụ: </label>
                        <input type="text" id="task_name" required  class="form-control" name="task_name" >
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6 form-group" style="padding-top: 20px" >
                    
                        <div class="col-md-3">
                            <label for="task_description" >Từ: </label>
                            <input type="number" id="task_end_date" required class="form-control" name="task_end_date">    
                        </div>
                        <div class="col-md-3">
                            <label for="task_description" >Đến: </label>
                            <input type="number" id="task_end_date" required class="form-control" name="task_end_date">    
                        </div>
              
                </div>
                <div class="col-md-6 form-group" style="padding-top: 20px" >
                    <label for="gia">Giá</label>
                    <div class="d-inline" id="gia">
                        
                        <div class="col-md-3">
                                <label for="task_description" >Từ: </label>
                                <input type="number" id="task_end_date" required class="form-control" name="task_end_date">    
                            </div>
                            <div class="col-md-3">
                                <label for="task_description" >đến: </label>
                                <input type="number" id="task_end_date" required class="form-control" name="task_end_date"> 
                        </div> 
                    </div>
                </div>
               <div class="col-md-6 form-group" style="padding-top: 20px" >
                    <label for="giomocua">Giờ mở cửa</label>
                    <div class="d-inline" id="giomocua" >
                        
                        <div class="col-md-6">
                            <label for="task_description" >Số điện thoại: </label>
                            <select class="form-control" name="assigner_user_id">
                                    <option>TEXT</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="task_name">Website: </label>
                            <input type="text" id="task_name" required  class="form-control" name="task_name" >
                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                <input  class="btn btn-success" style=";margin-bottom: 20px; margin-left: 90%" type="submit" value="Xong">
            </form>
        </div>
    </div>
</div>



<script>
function myMap() {
var mapOptions = {
    center: new google.maps.LatLng(10.5,105.5),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQnUfJIUr14br8WuniuuUMGkq0zDFoAc4&callback=myMap"></script>
@endsection