@extends('layouts.app')
@section('content')
@if(Entrust::hasRole('admin'))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">

                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this case?');">
                      <input type="hidden" name="_METHOD" value="DELETE">
                      <input type="hidden" name="id" value="">
                      <button type="submit">Delete Case</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
