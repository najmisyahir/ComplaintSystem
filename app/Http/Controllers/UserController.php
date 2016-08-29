<?php

namespace App\Http\Controllers;

use App\User;
use App\Complaint;
use App\Users;
use App\Role;
use Zizaco\Entrust\EntrustFacade as Entrust;
use Input;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = DB::table('users')->paginate(5);
        $com_list = DB::table('complaint')
                ->leftjoin('users', 'id', '=', 'user_id')
                ->paginate(5);

        return view('/admin/cms', ['users' => $users], ['com_list' => $com_list]);
    }
    public function view(Request $id)
    {
        $user_id = $id->input('id');
        $data = DB::table('users')
                    ->leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
                    ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                    ->where('users.id', '=', $user_id)
                    ->select('users.*', 'roles.display_name as r_name')
                    ->first();
        return view('/admin/view_user', ['data' => $data]);
    }
    public function edit(Request $id)
    {
        $user_id = $id->input('id');
        $data = DB::table('users')
                    ->leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
                    ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                    ->where('users.id', '=', $user_id)
                    ->select('users.*', 'roles.display_name as r_name', 'roles.name as s_name', 'roles.id as id_role')
                    ->first();
        $datarole = DB::table('roles')
                    ->select('roles.*')
                    ->get();
        return view('/admin/edit_user', ['data' => $data],['datarole' => $datarole]);
    }
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $id = $request->input('id');

        $db1 = DB::table('users')
                ->where('id', $id)
                ->update(array(
                    'name' => $name,
                    'email' => $email
                    ));
        $db2 = DB::table('role_user')
                ->where('user_id', $id)
                ->update(array(
                    'role_id' => $role
                    ));
        return view('/admin/edit_user', ['db1' => $db1], ['db2' => $db2]);
    }
    public function delete(Request $id)
    {
        $user_id = $id->input('id');
        if (!Entrust::hasRole('admin')) {
            App::abort(403);
        }

        $count = DB::table('users')->count();
        if($count != 1){
            $userdel = DB::table('users')->where('id', $user_id)->delete();
        }
        
        $users = DB::table('users')->paginate(5);
        return view('/admin/cms', ['usersdel' => $userdel], ['users' => $users]);
    }
    public function viewComplaint(Request $id)
    {
        $com_id = $id->input('com_id');
        $data = DB::table('complaint')
                    ->leftjoin('users', 'users.id', '=', 'complaint.user_id')
                    ->where('complaint.com_id', '=', $com_id)
                    ->first();
        $tech_list = DB::table('role_user')
                    ->leftjoin('users', 'users.id', '=', 'role_user.user_id')
                    ->where('role_user.role_id', '=', 3)
                    ->get();
        return view('/admin/view_complaint', ['data' => $data], ['tech_list' => $tech_list]);
    }
    public function updateComplaint(Request $request)
    {
        $tech = $request->input('tech');
        $id = $request->input('com_id');

        $complaint = DB::table('complaint')
                    ->select('complaint.*','users.*')
                    ->leftjoin('users', 'users.id', '=', 'complaint.user_id')
                    ->where('complaint.com_id', '=', $id)
                    ->first();

        $db1 = DB::table('complaint')
                ->where('com_id', $id)
                ->update(array(
                    'tech_id' => $tech,
                    'com_enddate' => NULL,
                    'com_status' => 'Assigned'
                    ));

        $user = User::findOrFail($tech);/*
        $complaint = Complaint::findOrFail($id);*/

        Mail::send('emails.reminders', compact('user','complaint'), function ($m) use ($user, $complaint) {
            $m->from('najmi@mex.com.my', 'CMS MEX');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });

        return view('/admin/view_complaint', ['db1' => $db1]);
    }
}

/*SELECT * FROM users u LEFT JOIN role_user ru ON u.id = ru.user_id LEFT JOIN roles r ON r.id = ru.role_id WHERE u.id s= 3*/