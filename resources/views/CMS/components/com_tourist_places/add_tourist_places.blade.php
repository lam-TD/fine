@extends('CMS.components.index')
@section('content')


@if(!empty($errors->first()))
    <div class=" error row col-lg-12" >
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif
<script >
 $(document).ready(function () {          
        setTimeout(function() {
            $('.error').slideUp("slow");
        }, 10000);
});
</script>

<div id="page-title">
    <h2>Thêm địa điểm</h2>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
    <div class="row" style="padding-top: 25px;">
        <div class="frm-heading">
                THÔNG TIN ĐỊA ĐIỂM
                <span></span>
        </div>
        <div class=" content-box bg-white post-box col-md-12 ">
            
            <form id="frm_add_task" class="bg-success" name="frm_add_task" action="" method="post"  enctype="multipart/form-data"  >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="place_name">Tên địa điểm: </label>
                        <input type="text" id="place_name" value="{{ old('place_name') }}" title="Vui lòng nhập tên địa điểm" required  class="form-control" name="place_name">
                    </div>
                     <div class="col-md-6">
                        <label for="address">Địa chỉ: </label>
                        <input type="text" id="address" required  title="Vui lòng nhập địa chỉ" class="form-control" value="{{ old('address') }}" name="address"  placeholder="Số 194/9, đường Cách Mạng Tháng 8">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="phonenumber" >Số điện thoại: </label>
                        {{-- <input type="tel" id="phonenumber" required class="form-control" name="phonenumber">  --}}
                        <input type='tel' value="{{ old('phonenumber') }}" id="phonenumber" required class="form-control" name="phonenumber" data-inputmask="'mask':'(999) 999-9999'" title='Số điện thoại (Định dạng: (999) 999-9999'>
                    </div>
                    <div class="col-md-6">
                        <label for="task_description" >Tỉnh / thành phố: </label>                      
                        <select class="form-control"  title="Chọn một tỉnh/thành phố để hiện danh sách các quận/huyện" name="city" id="city">
                            @foreach($data1 as $item)
                                <option value="{{$item->id}}">{{$item->province_city_name}}</option>
                            @endforeach()
                        </select>
                    </div>
                </div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="task_start_date">Quận / huyện: </label>
                            <select class="form-control" title="Chọn một quận/huyện để hiển thị danh sách các xã/phường " id="district" name="districtt">
                           
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="task_end_date">Phường / xã: </label>
                        <select class="form-control" title="Vui lòng chọn phường xã để tiếp tục" id="ward" name="ward">
                        </select>

                     </div>
                </div> 
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                         <label for="description" >Mô tả: </label>
                         <input type="text" value="{{ old('description') }}" title="Vui lòng nhập mô tả cho địa điểm" id="description" required class="form-control" name="description" > 
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6">
                         <label for="lat_and_long">Tọa độ: </label>
                         <input type="text" title="Kinh độ, vĩ độ không được để trống!" id="lat_and_long" value="{{ old('lat_and_long') }}" required class="form-control" name="lat_and_long" readonly placeholder="Vui lòng chọn tọa độ chính xác ở bản đồ!"> 
                         <input type="hidden" value="{{ old('kinhdo') }}" name="kinhdo" id="kinhdo" value="">
                         <input type="hidden" value="{{ old('vido') }}" name="vido" id="vido" value="">
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <label for="content"   title="Nội dung giới thiệu địa điểm">Nội dung chi tiết: </label>
                    <textarea style="height: 500px" id="content" ></textarea>
                    <input type="hidden" value="{{ old('content') }}" name="content" id="content2">
                    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                    <script>
                        var editor = CKEDITOR.replace( 'content' );

                        // The "change" event is fired whenever a change is made in the editor.
                        editor.on('change', function( evt ) {
                            
                            var content = evt.editor.getData();
                            $("#content2").val(content);
                        });
                    </script>
                </div> 
                
                <div class="clearfix"></div>
                <div class="col-md-12" style="padding-bottom: 15px">
                    <label for="map">Bản đồ</label>
                    <div id="map" style="height:400px;"></div>
                </div>
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group" role="group">
                        <button class="btn btn-info "  type="submit" name="action" value="save_close"><span class="glyph-icon icon-elusive-ok">Lưu và thoát</span></button>
                    </div>
                    <div class="btn-group" role="group">
                        <button class="btn btn-success " style="float: right; margin-bottom: 25px; " type="submit" name="action" value="save_and_add_service">Lưu và thêm dịch vụ</button>    
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" >
    
$(document).ready(function () {
    
    load_district();
    load_ward();
    
})


//load quan theo tinh thanh pho
function load_district() {
    $('select[name=city]').change(function () {
        var path = 'loadDistrict/' + $(this).val();
        console.log(path);
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option value="' + data.id + '">' + data.district_name +'</option>';
            })
            $('#district').html(lam);
        })
    })
}

// load ward
function load_ward() {
    $('select[name=districtt]').change(function () {
        var path = 'loadWard/' + $(this).val();
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option data-longtitude="' + data.longtitude + '" data-latitude="' + data.latitude + '" value="' + data.id + '">' + data.ward_name +'</option>';
            })
            $('#ward').html(lam);
        })
    })
}

function Load_toado() {
     $('select[name=ward]').change(function () {
        var path = 'loadWard/' + $(this).val();
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
            })
            $('#ward').html(lam);
        })
    })
}

</script>

<script>
    function myMap(argument) {
         var map;
         var lat;
         var long;

        function init_map() {
            var opts = { 'center': new google.maps.LatLng(10.5404526,106.0088311), 'zoom': 8, 'mapTypeId': google.maps.MapTypeId.ROADMAP }
                map = new google.maps.Map(document.getElementById('map'), opts);

            
            google.maps.event.addListener(map, 'click', function (e) {
                // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("kinhdo").value = e.latLng.lng() ;
                document.getElementById("vido").value = e.latLng.lat() ;
                var sum = 'Vĩ độ: ' + e.latLng.lat() + ', Kinh độ: '+  e.latLng.lng() ;
                document.getElementById("lat_and_long").value = sum;

            });
            
        } 
        google.maps.event.addDomListener(window, 'load', init_map);
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQnUfJIUr14br8WuniuuUMGkq0zDFoAc4&callback=myMap"></script>
@endsection 