@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Complaint Management System</div>

                <div class="panel-body">
                    
        
                <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/slide01.jpg" alt="Slide 1">
                            </div>
                            <div class="item">
                                <img src="images/slide02.jpg" alt="Slide 2">
                            </div>
                            <div class="item">
                                <img src="images/slide03.jpg" alt="Slide 3">
                            </div>
                        </div>
                        <a href="#carousel" class="left carousel-control" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#carousel" class="right carousel-control" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                </div>

                <div id="page">
                    <div id="content">
                        <div class="box">
                            <h2>Welcome to MEX Complaint Management System</h2>
                            <p>
                                This is <strong>MEX CMS</strong>, a fully standards-compliant Complaint Management website.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
