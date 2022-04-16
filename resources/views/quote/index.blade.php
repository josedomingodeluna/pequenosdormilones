@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Cotizaciones</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Cotizaciones</li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (count(Cart::instance('quote')->content()))
        <a href="{{route('quote.preview')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> Ver Cotización</a>
        @else
        <a href="#" class="btn btn-danger btn-sm float-left disabled"><i class="fa fa-eye" aria-hidden="true"></i> Cancelar Cotización</a>
        @endif
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cotizaciones Registradas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Sucursal</th>
                                        <th>Folio</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Imprimir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotes as $quote)
                                    <tr>
                                        <td>{{ $quote->id }}</td>
                                        <td>{{ $quote->user->name }}</td>
                                        <td>{{ $quote->branch->name }}</td>
                                        <td>{{ $quote->folio_id }}</td>
                                        <td>{{ $quote->customer_name }}</td>
                                        <td>{{ $quote->amount }}</td>
                                        <td>
                                            <a class="btn btn-circle btn-danger" name="" target="_blank" href="{{ route('quote.print', $quote->id) }}"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Sucursal</th>
                                        <th>Folio</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                    </tr>
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