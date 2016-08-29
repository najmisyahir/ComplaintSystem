@extends('layouts.app')
@section('content')
@if(Entrust::hasRole('user'))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Complaint Form</div>
                    <div class="panel-body">
        
                    <form method="POST" action="">
                    <table class="table">
                        <colgroup>
                        <col style="width: 120px">
                        <col style="width: 21px">
                        <col style="width: 187px">
                        </colgroup>
                          <tr>
                            <th colspan="3">Fill Up Complaint Form<br></th>
                          </tr>
                          <tr>
                            <td>Complaint Type</td>
                            <td>:</td>
                            <td>
                                <select name="com_type" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Hardware">Hardware</option>
                                <option value="Software">Software</option>
                                <option value="System">System</option>
                                <option value="Toll Operation System">Toll Operation System</option>
                                <option value="Printer">Printer</option>
                                <option value="Network">Network</option>
                                <option value="Website">Website</option>
                                </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Complaint Description<br></td>
                            <td>:</td>
                            <td><textarea style="overflow:auto;resize:none" rows="5" cols="30" name="com_desc" placeholder="Complaint Description" required></textarea><br></td>
                          </tr>
                        </table>
                        <div style="text-align: center;">
                        <input type="submit"> <input type="reset">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        </div>
                        </form>
                            @if(isset($db1) && $_SERVER['REQUEST_METHOD'] == 'POST')
                                @if($db1 == true)
                                    <div class="alert alert-success">
                                      <strong>Success!</strong> Data stored successfully.
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                      <strong>Warning!</strong> Error Sending Data.
                                    </div>
                              @endif
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
