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
                    <table class="table">
                        <colgroup>
                        <col style="width: 130px">
                        <col style="width: 21px">
                        <col style="width: 187px">
                        </colgroup>
                          <tr>
                            <th colspan="3">User Profile<br></th>
                          </tr>
                          <tr>
                            <td>Name<br></td>
                            <td>:</td>
                            <td>{{$data->name}}<br></td>
                          </tr>
                          <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td>{{$data->email}}</td>
                          </tr>
                          <tr>
                            <td>User Role<br></td>
                            <td>:</td>
                            <td>{{$data->r_name}}</td>
                          </tr>
                          <tr>
                            <td>Date Registered<br></td>
                            <td>:</td>
                            <td>{{$data->created_at}}</td>
                          </tr>
                        </table>
                        <!-- <?php
                        print_r($data); ?> -->
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
