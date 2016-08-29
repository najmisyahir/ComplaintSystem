@extends('layouts.app')
@section('content')
@if(Entrust::hasRole('user'))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">User Dashboard</div>
                    <div class="panel-body">
                      <a href="{{ url('/user/complaint') }}">Complaint</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
