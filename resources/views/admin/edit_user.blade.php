@extends('layouts.app')
@section('content')
@if(Entrust::hasRole('admin'))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User Profile</div>
                    <div class="panel-body">

                    @if (isset($data))
                    <form method="POST" action="">
                    <table class="table">
                        <colgroup>
                        <col style="width: 120px">
                        <col style="width: 21px">
                        <col style="width: 187px">
                        </colgroup>
                          <tr>
                            <th colspan="3">User Profile<br></th>
                          </tr>
                          <tr>
                            <td>Name<br></td>
                            <td>:</td>
                            <td><input type="text" name="name" value="{{$data->name}}" required><br></td>
                          </tr>
                          <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td><input type="text" name="email" value="{{$data->email}}" required></td>
                          </tr>
                          <tr>
                            <td>User Role<br></td>
                            <td>:</td>
                            <td>
                             <select name="role">
                                <option value="{{$data->id_role}}" selected>{{$data->r_name}}</option>
                             @foreach($datarole as $role)
                             @if($role->name != $data->s_name)
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                              @endif
                              @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Date Registered<br></td>
                            <td>:</td>
                            <td>{{$data->created_at}}</td>
                          </tr>
                        </table>
                        <div style="text-align: center;">
                        <input type="submit" > <input type="reset">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        </div>
                        </form>
                        <!-- <?php
                        print_r($data); ?> -->
                    @endif

                    @if(isset($db1) || isset($db2) && $_SERVER['REQUEST_METHOD'] == 'POST')
                      @if($db1 == true || $db2 == true)
                        <div class="alert alert-success">
                          <strong>Success!</strong> Data updated successfully.
                        </div>
                        @else
                        <div class="alert alert-warning">
                          <strong>Warning!</strong> Data failed to be updated.
                        </div>
                      @endif
                    @endif
                    <a href="cms">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
