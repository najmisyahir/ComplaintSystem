@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Complaint Management System</div>

                <div class="panel-body">
                    <table width="99%"  cellspacing="0" cellpadding="0" border="0">
                      
                      <tr><td height="0"><h1>Complaint Management System</h1></td></tr>
                      <tr><td><div style="text-align:left;float:left;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td>
                                <div align="justify"><span class="blackH3">Complaint Management System is to register the complaints of the Maju Expressway (MEX) Staff for PC &amp; &nbsp;Network Troubleshooting and process to solve them accordingly.</span><br />
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td><b><span class="blackH3">How To:</span>&nbsp;</b></td>
                            </tr>
                            <tr>
                                <td><span class="blackH3">MEX Staff Member can send his request of Complaint from below link URL.</span></td>
                            </tr>
                            <tr>
                                <td><span class="style2"><a href="{{ url('/user/complaint') }}" target="_blank">Complaint Page</a></span><span class="blackH3"></span></td>
                            </tr>
                            <tr>
                                <td><span class="blackH3 "><br>Contact the IT-Centre with any technical queries or issues.</span></td>
                            </tr>
                            <tr>
                                <td>&bull; Mr. Yong ext 9022&nbsp;<br />
                                &bull; Mr. Fuad ext 9023 <br />
                                &bull; Mr. Zukhairi ext 9172</td>
                            </tr>
                        </tbody>
                    </table></div></td></tr>
                             <tr>
                        <td height="50px" style="text-align:center; "><br><br> <img src="http://pu.edu.pk/images/back.png"  style=" border:none; padding:0px; margin:0px;"border="0" style="margin-bottom:-1px;" width="11px"/>&nbsp;<a href="{{ url('/') }}">Back to main page.</a>   </td>
                      </tr>
                       
                     
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
