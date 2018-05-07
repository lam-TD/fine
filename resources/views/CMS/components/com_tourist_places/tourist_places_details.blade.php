@extends('CMS.components.index')
@section('content')
<div id="page-title">
    <h2>{{ $data2[0]->pl_name  }}</h2>
    <p hidden="">Example invoice page build with MonarchUI Framework</p>

	<div class="content-box pad25A">
	    <div class="row">
	        <div class="col-sm-3">
	            <div class="dummy-logo">
	                img
	            </div>
	            <address class="invoice-address">
	                {{ $data2[0]->province_city_name  }}
	                <br>
	                {{ $data2[0]->district_name  }}
	                <br>
	                {{ $data2[0]->pl_address  }}, {{ $data2[0]->ward_name }}
	            </address>
	        </div>
	        <div class="col-sm-6 float-right text-right">
	            <h4 class="invoice-title">{{ $data2[0]->pl_name  }}</h4>
	            Số điện thoại. <b>{{ $data2[0]->pl_phone_number  }}</b>
	            <div class="divider"></div>
	            <div class="invoice-date mrg20B">{{ $data2[0]->created_at  }}</div>
	            <button onclick="printInvoice()" class="btn btn-alt btn-hover btn-info">
	                <span><a href="" title="" style="color: #fff">Thêm dịch vụ</a></span>
	                <i class="glyph-icon icon-plus"></i>
	            </button>
	            <button onclick="printInvoice()" class="btn btn-alt btn-hover btn-danger">
	                <span>Ẩn địa điểm</span>
	                <i class="glyph-icon icon-trash"></i>
	            </button>
	        </div>
	    </div>

	    <div class="divider"></div>

	    <div class="row">
	        <div class="col-md-4">
	            <h2 class="invoice-client mrg10T">Vị trí:</h2>
	            <h5>{{ $data2[0]->pl_name  }}</h5>
	            <address class="invoice-address">
	                Kinh độ: {{ $data2[0]->pl_longitude   }}
	                <br>
	                Vĩ độ: {{ $data2[0]->pl_latitude   }} 
	            </address>
	        </div>
	        <div class="col-md-4">
	            <h2 class="invoice-client mrg10T">Trạng thái:</h2>
	            <ul class="reset-ul">
	                <li><b>Chỉnh sửa lần cuối:</b> {{ $data2[0]->updated_at  }}</li>
	                <li><b>Trạng thái:</b> <span class="bs-label label-<?php 
	                if( $data2[0]->updated_at == 0 )
	                {echo "warning";}
	                else {	echo "success";}
	                ?>"><?php 
	                if( $data2[0]->updated_at == 0 )
	                {echo "Không hiển thị";}
	                else {	echo "Hiển thị";}
	                ?></span></li>
	                <li><b>Id:</b> #{{ $data2[0]->id  }}</li>
	            </ul>
	        </div>
	        <div class="col-md-4">
	            <h2 class="invoice-client mrg10T">Mô tả:</h2>
	            <p>{{ $data2[0]->pl_details  }}</p>
	        
	        </div>
	    </div>

	    <table class="table mrg20T table-hover">
	        <thead>
	            <tr>
	            	<?php $stt = 1; ?>
	                <th style="width: 1%">STT</th>
	                <th style="width: 1%">ID</th>
	                <th style="width: 20%">Tên dịch vụ</th>
	                <th style="width: 10%" class="text-center">Hình ảnh</th>
	                <th style="width: 5%">Hiển thị</th>
	                <th style="width: 10%">#</th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	            	@foreach($data1 as $item)
	                <td style="padding-top: 20px" class="text-center"><?php echo $stt; $stt++; ?></td>
	                <td style="padding-top: 20px" class="text-center">{{ $item->id  }}</td>
	                <td style="padding-top: 20px"> <a href="#" title="Chi tiết dịch vụ">
	                	@if($item->hotel_name != null)
                                {{$item->hotel_name}} 
                            @elseif($item->eat_name != null)
                                - {{ $item->eat_name }}
                            @elseif($item->transport_name != null)
                                -{{ $item->transport_name }}
                            @elseif($item->sightseeing_name != null)
                                -{{ $item->sightseeing_name }}
                            @elseif($item->eat_name != null)
                                -{{ $item->eat_name }}
                        @endif
		                </a>
	                </td>
	                <td style="padding-top: 20px" class="text-center">
	                	<img src="/public/icons/{{ $item->image_banner  }}" alt="{{ $item->id  }}">
	                </td>
	                <td style="padding-top: 20px">
	                	<span class="bs-label label-<?php 
	                								if( $item->sv_status == 0 )
										                {echo "warning";}
									                else {	echo "success";}
									                ?>">
									                <?php 
										                if( $item->sv_status == 0 )
										                {echo "Không hiển thị";}
										                else {	echo "Hiển thị";}
									                ?>
									                	
		                </span>
		            </td>
	                <td style="padding-top: 0px">
	                	<a href="#" title="Chi tiết dịch vụ">
	                		<i  class="glyph-icon bg-info demo-icon icon-external-link-square"></i>
	                	</a>
		                <a href="#" title="Ẩn dịch vụ">
		                	<i class="glyph-icon bg-danger demo-icon icon-ban"></i>
		                </a>
		            </td>
	                
                   @endforeach
	            </tr>
	            	            
	        </tbody>
	    </table>

	</div>
</div>
@endsection