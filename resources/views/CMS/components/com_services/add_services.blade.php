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
    <h2>Thêm dịch vụ</h2>
    <small>Địa điểm: {{ $data_place->id }}, {{ $data_place->pl_name }}</small>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
    <div class="row"  style="padding-top: 25px;">
        <div class="col-md-9 col-md-offset-1">
            <div class="book-tour-container bg-success">
                <div class="frm-heading">
                THÔNG TIN DỊCH VỤ
                <span></span>
                </div>    
            </div>
            <div class="content-box  post-box   ">
            <form id="frm_add_task" class="bg-success" name="frm_add_task" action="" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id_diadiem" value="{{ $data_place->id }}">
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-4">
                        <label for="type_services" >Chọn loại hình: </label>
                        <select class="form-control" name="type_services">
                            <option value="1">Ăn uống - Ẩm thực</option>
                            <option value="2">Khách sạn - Nơi ở</option>
                            <option value="3">Di chuyển - Phương tiện</option>
                            <option value="4">Tham quan - Mua sắm</option>
                            <option value="5">Vui chơi - Giải trí</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label for="services_name" >Tên dịch vụ: </label>
                        <input type="text" value="{{ old('services_name') }}"  id="services_name" required  class="form-control" name="services_name" >
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-2">
                        <label for="giomocua">Giờ mở cửa</label>
                    </div>
                    <div class="col-md-2">
                        <label for="sv_open">Từ (AM): </label>
                    </div>
                    <div class="col-md-3">
                        <input type="time" style="text-align: center;" value="{{ old('sv_open') }}"  id="sv_open" required class="form-control" name="sv_open">    
                    </div>
                    <div class="col-md-2">
                        <label for="sv_close" >Đến (PM): </label>
                    </div>
                    <div class="col-md-3">
                        <input type="time" style="text-align: center;" value="{{ old('sv_close') }}"  min="1" max="12" id="sv_close" required class="form-control" name="sv_close">    
                    </div>
                </div>

                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="d-inline" id="gia">
                        <div class="col-md-2">
                            <label for="giomocua">Giá (VNĐ): </label>
                        </div>
                        <div class="col-md-2">
                            <label for="sv_lowest_price">Từ: </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align: center;" value="{{ old('sv_lowest_price') }}"  min="0" max="10000000000" id="sv_lowest_price" required class="form-control" name="sv_lowest_price">    
                        </div>
                        <div class="col-md-2">
                            <label for="sv_highest_price" >Đến: </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align: center;" value="{{ old('sv_highest_price') }}"  min="0" max="10000000000" id="sv_highest_price" required class="form-control" name="sv_highest_price">    
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="d-inline" id="giomocua" >
                        <div class="col-md-4">
                            <label for="sv_phone_number" >Số điện thoại: </label>
                            <input type='tel' value="{{ old('sv_phone_number') }}"  id="sv_phone_number" required class="form-control" name="sv_phone_number" data-inputmask="'mask':'(999) 999-9999'" title='Số điện thoại (Định dạng: (999) 999-9999'>
                        </div>
                        <div class="col-md-6">
                            <label for="website">Website: </label>
                            <input type="text" value="{{ old('website') }}" id="website" required  class="form-control" name="website" >
                        </div>
                        <div class="col-md-7">
                            <label for="star">Số sao: </label>
                            <input type="text" value="{{ old('website') }}" id="star" required  class="form-control" name="star" >
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="d-inline" id="giomocua" >
                        <div class="col-md-12">
                            <label for="description" >Mô tả: </label>
                            <input type="text" value="{{ old('description') }}"  class="form-control" id="description" required  class="form-control" name="description" >
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="col-md-4">
                        <label>Hình ảnh 1</label>
                        <input type="file" value="{{ old('banner') }}"  class="form-control" accept="image/*" name="banner" >
                    </div>        
                    <div class="col-md-4">
                        <label>Hình ảnh 2</label>
                        <input type="file" value="{{ old('details1') }}"  class="form-control" accept="image/*" name="details1" >
                    </div>        
                    <div class="col-md-4">
                        <label>Hình ảnh 3</label>
                        <input type="file" value="{{ old('details2') }}"  class="form-control" accept="image/*" name="details2" >
                    </div>        
                </div>

                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-12">
                         <label for="content"  title="Nội dung giới thiệu địa điểm">Nội dung chi tiết: </label>
                        <textarea style="height: 500px" id="content" >{{ old('content') }}" </textarea>
                        <input type="hidden" value="{{ old('content') }}"  name="content" id="content2">
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
                </div> 
                
                <div class="clearfix"></div>
                <input  class="btn btn-success" style=";margin-bottom: 20px; margin-left: 90%" type="submit" value="Xong">
            </form>
        </div>
        </div>
        
    </div>
</div>



@endsection