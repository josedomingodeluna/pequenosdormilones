@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Ordenes de Compra</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Ordenes de Compra</li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="" class="btn btn-danger btn-sm float-left"><i class="fa fa-money" aria-hidden="true"></i> Registrar Abono</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ordenes de Compra Registradas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Orden de Compra</th>
                                        <th>Cliente</th>
                                        <th>Importe</th>
                                        <th>Saldo</th>
                                        <th>Abonar</th>
                                        <th>Ver Abonos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->id }}</td>
                                        <td>{{ $sale->user->name }}</td>
                                        <td>{{ $sale->purchase_order_id }}</td>
                                        <td>{{ $sale->customer->first_name }}</td>
                                        <td>{{ $sale->amount }}</td>
                                        <td>{{ $sale->balance }}</td>
                                        <td><a class="btn btn-circle btn-success" href="{{ route('payment.create', $sale->purchase_order_id)}}" ><i class="fa fa-money"></i></a></td>
                                        <td><a class="btn btn-circle btn-success" href="{{ route('payment.index', $sale->purchase_order_id)}}" ><i class="fa fa-info"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection