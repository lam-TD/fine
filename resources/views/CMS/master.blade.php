 
@extends('CMS.components.index')

@section('content')

                @include('CMS.script.container-charts-srcipt')
<script type="text/javascript" src="{{asset('public/resourceAdminTemplate/assets\myscript\style.js')}}"></script>
<div id="page-title">
    <h2>Dashboard</h2>
    <p>Chào mừng bạn đến với trang quản trị website VietNamTour.</p>
    <div id="theme-options" class="admin-options">
        <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Cài đặt giao diện và chỉnh sửa layout">
            <i class="glyph-icon icon-linecons-cog icon-spin"></i>
        </a>
        @include('CMS.layout.setting')
    </div>
</div>
<div class="row">
	@include('CMS.components.com_dashboard.analytics')
	<div class="col-md-8">
		@include('CMS.components.com_dashboard.action_admin')
		@include('CMS.components.com_task.list_task')
		@include('CMS.components.com_task.add_task')
	</div>
	<div class="col-md-4">
		@include('CMS.components.com_dashboard.user_activity')		
	</div>
</div>

@endsection