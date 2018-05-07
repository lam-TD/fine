
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

<div class="row" style="padding-top: 25px;">
    <h2>Thêm nhiệm vụ mới</h2>
    <div class="content-box bg-white post-box">
        <form id="frm_add_task" name="frm_add_task" action="" method="post"  enctype="multipart/form-data"  >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12 form-group" style="padding-top: 20px" >
                <div class="col-md-6">
                    <label for="task_name">Tên nhiệm vụ: </label>
                    <input type="text" id="task_name"  class="form-control" name="task_name" value="{{ old('task_name') }}">
                </div>
                 <div class="col-md-6">
                    <label for="task_description">Người nhận: </label>
                    <select class="form-control" name="assigner_user_id">
                        @foreach($data11 as $item)
                        <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                        @endforeach()
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 form-group" style="padding-top: 20px" >
                <div class="col-md-12">
                    <label for="task_description" >Mô tả: </label>
                    <input type="text" id="task_description" value="{{ old('task_description') }}" class="form-control" name="task_description" >
                </div>
            </div>
            <div class="col-md-12 form-group" style="padding-top: 20px" >
                <div class="col-md-6">
                    <label for="task_start_date">Ngày bắt đầu: </label>
                    <input type="date" id="task_start_date" value="{{ old('task_start_date', date('d-m-Y')) }}" class="form-control" name="task_start_date" > 
                </div>
                <div class="col-md-6">
                    <label for="task_end_date">Ngày kết thúc: </label>
                    <input type="date" id="task_end_date" value="{{ old('task_end_date', date('d-m-Y')) }}"  class="form-control" name="task_end_date" > 
                 </div>
                 <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <label for="content" >Nội dung chi tiết: </label>
                    <textarea id="content" >{{ old('content') }}</textarea>
                    <input type="hidden" name="content" id="content2">
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
             <input  class="btn btn-success" style="margin-bottom: 20px; margin-left: 90%" type="submit" value="Xong">
        </form>
    </div>
</div>