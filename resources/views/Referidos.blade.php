@extends('layouts.master')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Referidos</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4 onclick=" onclick="window.location.href = 'https://webface.ubiobio.cl/';">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="h5 mb-0 font-weight-bold text-primary">FACULTAD DE CIENCIAS EMPRESARIALES</div>
                    </div>
                    <div class="col-auto">
                    <img src="https://www.ubiobio.cl/mcc/images/logosimbologia.png"  height="120">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4" onclick="window.location.href = 'https://intranet.ubiobio.cl/';">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="h5 mb-0 font-weight-bold text-success">INTRANET</div>
                    </div>
                    <div class="col-auto">
                    <img src="https://www.ubiobio.cl/mcc/images/logosimbologia.png"  height="120">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4" onclick="window.location.href = 'http://destudiantil.ubiobio.cl/dde_concepcion2/';">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="h5 mb-0 font-weight-bold text-warning">DIRECCION DE DESAROLLO ESTUDIANTIL</div>
                    </div>
                    <div class="col-auto">
                    <img src="https://www.ubiobio.cl/mcc/images/logosimbologia.png"  height="120">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
@stop