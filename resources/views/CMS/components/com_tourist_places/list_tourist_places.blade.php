@extends('CMS.components.index')
@section('content')
<script type="text/javascript">

    /* Datatables export */

    $(document).ready(function() {
        var table = $('#datatable-tabletools').DataTable();
        var tt = new $.fn.dataTable.TableTools( table );

        $( tt.fnContainer() ).insertBefore('#datatable-tabletools_wrapper div.dataTables_filter');

        $('.DTTT_container').addClass('btn-group');
        $('.DTTT_container a').addClass('btn btn-default btn-md');

        $('.dataTables_filter input').attr("placeholder", "Search...");

    } );

    /* Datatables reorder */

    $(document).ready(function() {
        $('#datatable-reorder').DataTable( {
            dom: 'Rlfrtip'
        });

        $('#datatable-reorder_length').hide();
        $('#datatable-reorder_filter').hide();

    });

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });

</script>

<div id="page-title">
    <h2>Danh sách địa điểm</h2>
    <p>Dưới đây là dữ liệu tất cả địa điểm hiện có.</p>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
<div class="panel">
    <div class="panel-body">
    <h3 class="title-hero">
        DANH SÁCH ĐỊA ĐIỂM
    </h3>
        <div class="example-box-wrapper">
            <table id="datatable-reorder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <?php $tmp_show = 1?>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên địa điểm</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Kinh độ</th>
                    <th>Vĩ độ</th>
                    <th>Chỉnh sửa lần cuối</th>
                    <th>Hiển thị</th>

                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên địa điểm</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Kinh độ</th>
                    <th>Vĩ độ</th>
                    <th>Chỉnh sửa lần cuối</th>
                    <th>Hiển thị</th>
                </tr>
                </tfoot>
                <tbody>
                    

                    @foreach($data as $item)
                    <tr>
                        <td><?php echo $tmp_show; $tmp_show++; ?></td>
                        <td>{{ $item->id }}</td>
                        <td><a href="">{{ $item->pl_name }}</a></td>
                        <td>{{ $item->pl_address }}</td>
                        <td>{{ $item->pl_phone_number }}</td>
                        <td>{{ $item->pl_longitude  }}</td>
                        <td>{{ $item->pl_latitude }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td><?php if($item->pl_status==0)
                            echo "Không hiển thị";
                            else{
                                echo "Hiển thị";
                            }
                        ?>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
    </div>
</div>




@endsection