@extends('layouts.app')

@section('content')
@if(Entrust::hasRole('admin'))
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div style="width: 100%; overflow: hidden;">
                    <div id="user_table" style="width: 600px; float: left;">
                    <b>List of Users in the system</b>

                    @if (isset($users))
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Action</th>
                        </tr>
                            @foreach($users as $row1)
                                <tr>
                                    <td>{{$row1->id}}</td>
                                    <td>{{$row1->name}}</td>
                                    <td>{{$row1->email}}</td>
                                    <td>
                                        <a href="view_user?id={{$row1->id}}">Complete</a> | <a href="edit_user?id={{$row1->id}}">Edit</a> | 
                                        <a href="delete_user?id={{$row1->id}}" onclick='return confirm("Are you sure you want to delete ?")'>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    {!! $users->render() !!}
                    @endif
                    @if (isset($userdel))
                    
                    @endif
                    </div>

                    <b>Registered User Charts</b>
                    <div id="stocks-chart" style="margin-left: 620px;">

                    <?php
                    $stocksTable = Lava::DataTable();  // Lava::DataTable() if using Laravel

                    $stocksTable->addDateColumn('Day of Month')
                    ->addNumberColumn('Registered User');

                    $results = DB::select( DB::raw("SELECT DATE(created_at)AS date, COUNT(created_at)AS Count FROM users GROUP BY date"));
                    foreach ($results as $row)
                    $stocksTable->addRow([
                        $row->date, $row->Count
                    ]);


                    $chart = Lava::LineChart('Registered Users', $stocksTable);
                    // $chart = Lava::LineChart() if using Laravel
                    echo Lava::render('LineChart', 'Registered Users', 'stocks-chart');
                    ?>
                    </div>

                    <strong>List of Complaint</strong>
                    @if (isset($com_list))
                    <table class="table">
                        <tr>
                            <th>Complaint ID</th>
                            <th>Complainant</th>
                            <th>Type of Complaint</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                            @foreach($com_list as $rows)
                                <tr>
                                    <td>{{$rows->com_id}}</td>
                                    <td>{{$rows->name}}</td>
                                    <td>{{$rows->com_type}}</td>
                                    <td>{{$rows->com_startdate}}</td>
                                    <td>{{$rows->com_enddate}}</td>
                                    <td>{{$rows->com_status}}</td>
                                    <td>
                                        <a href="view_complaint?com_id={{$rows->com_id}}">View Detail</a> 
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    {!! $com_list->render() !!}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
