<?php

namespace App\Http\Controllers;
use App\taskModel;
use Illuminate\Http\Request;

class CMS_DeleteDataController extends Controller
{
  
    public function _DELETE_TASK($id)
    {
        $task =  taskModel::findOrFail($id);
        $task->status = 0;
        $task->save();
        
        return redirect('/lvtn-dashboard')->with('message', "Thanks, message has been sent");
    }
}
