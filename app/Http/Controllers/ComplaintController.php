<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use App\Role;
use Zizaco\Entrust\EntrustFacade as Entrust;
use Input;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('/user/main');
    }
    public function complaint()
    {
        return view('/user/complaint');
    }
    public function store(Request $request)
    {
        $type = $request->input('com_type');
        $desc = $request->input('com_desc');
        $id = $request->input('id');
        $status = "Unassigned";

        $db1 = DB::table('complaint')
                ->insert(array(
                    'com_type' => $type,
                    'com_describtion' => $desc,
                    'user_id' => $id,
                    'com_status' => $status
                    ));
        return view('/user/complaint', ['db1' => $db1]);
    }
    public function complaintlist()
    {
        $com_list = DB::table('complaint')
        		->leftjoin('users', 'id', '=', 'user_id')
        		->paginate(5);

        return view('/admin/cms', ['com_list' => $com_list]);
    }
}
