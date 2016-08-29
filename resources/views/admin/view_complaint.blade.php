@extends('layouts.app')
@section('content')
@if(Entrust::hasRole('admin'))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">

                    @if (isset($data))
                    <form method="POST" action="">
                    <table class="table">
                        <colgroup>
                        <col style="width: 130px">
                        <col style="width: 21px">
                        <col style="width: 187px">
                        </colgroup>
                          <tr>
                            <th colspan="3">Complaint Detail<br></th>
                          </tr>
                          <tr>
                            <td>Complaint ID<br></td>
                            <td>:</td>
                            <td>{{$data->com_id}}<br></td>
                          </tr>
                          <tr>
                            <td>Type Of Complaint</td>
                            <td>:</td>
                            <td>{{$data->com_type}}</td>
                          </tr>
                          <tr>
                            <td>Complaint Description<br></td>
                            <td>:</td>
                            <td>{{$data->com_describtion}}</td>
                          </tr>
                          <tr>
                            <td>Date of Complaint<br></td>
                            <td>:</td>
                            <td>{{$data->com_startdate}}</td>
                          </tr>
                          <tr>
                            <td>Assign Technician<br></td>
                            <td>:</td>
                            <td>
                              <select name="tech">
                             @foreach($tech_list as $role)
                                <option value="{{$role->user_id}}" >{{$role->name}}</option>
                              @endforeach
                              </select>
                            </td>
                          </tr>
                        </table>
                        <div style="text-align: center;">
                        <input type="submit" > <input type="reset">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="com_id" value="{{$data->com_id}}">
                        </div>
                        </form>
                        <!-- <?php
                        print_r($data); ?> -->
                    @endif
                    @if(isset($db1) && $_SERVER['REQUEST_METHOD'] == 'POST')
                      @if($db1 == true)
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
