

<div class="panel" style="padding-top: 25px">
    <h2>Danh sách nhiệm vụ</h2>
    <div class="panel-body">
        <ul class="todo-box">
            @foreach($data10 as $item)
            <li class="border-blue">
                <input type="checkbox" name="todo-3" id="todo-3">
                <label for="todo-3">{{ $item->task_title  }}</label>
                <span class="bs-label bg-blue" title="">{{ $item->date_start  }}</span>
                <a href="{{route('DELETE_TASK', $item->id)}}"  class="btn btn-xs btn-danger float-right" title="Xóa bỏ">
                    <i class="glyph-icon icon-remove"></i>
                </a>
                <a href="#" class="btn btn-xs btn-success float-right" title="Xem chi tiết">
                    <i class="glyph-icon icon-linecons-eye"></i>
                </a>
            </li>
           @endforeach
        </ul>
    </div>
</div>
<?php

