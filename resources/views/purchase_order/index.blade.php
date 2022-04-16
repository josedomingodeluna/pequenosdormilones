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
        @if (count(Cart::content()))
        <a href="{{route('purchase_order.preview')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> Ver Orden de Compra</a>
        @else
        <a href="#" class="btn btn-danger btn-sm float-left disabled"><i class="fa fa-eye" aria-hidden="true"></i> Cancelar Orden de Compra</a>
        @endif
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
                                        <th>Sucursal</th>
                                        <th>Folio</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>% Desc</th>
                                        <th>C/Descuento</th>
                                        <th>% IVA</th>
                                        <th>C/IVA</th>
                                        <th>Cerrar</th>
                                        <th>Descuentos</th>
                                        <th>IVA</th>
                                        <th>Imprimir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchase_orders as $purchase_order)
                                    <tr>
                                        <td>{{ $purchase_order->id }}</td>
                                        <td>{{ $purchase_order->user->name }}</td>
                                        <td>{{ $purchase_order->branch->name }}</td>
                                        <td>{{ $purchase_order->folio }}</td>
                                        <td>{{ $purchase_order->customer_id }}</td>
                                        <td>{{ $purchase_order->amount }}</td>
                                        <td>{{ $purchase_order->discount_rate }}</td>
                                        <td>{{ $purchase_order->discount_amount }}</td>
                                        <td>{{ $purchase_order->tax_rate }}</td>
                                        <td>{{ $purchase_order->tax_amount }}</td>
                                        <td>
                                            @if($purchase_order->status == '0')
                                            <a class="btn btn-circle btn-danger" name="confirm_sale" href="{{ route('sale.generate', $purchase_order->id) }}"><i class="fa fa-handshake-o"></i></a></td>
                                            @else
                                            <a class="btn btn-circle btn-danger disabled" name="confirm_sale" href="{{ route('sale.generate', $purchase_order->id) }}"><i class="fa fa-handshake-o"></i></a></td>
                                            @endif
                                        </td>
                                        <td>
                                            @if($purchase_order->status == '0')
                                            <form action="{{route('purchase_order.addDiscount',$purchase_order->id)}}"><input style="width:60px;" type="number" name="discount_rate" id="discount_rate" min="0" max="100" value=""> <input style="color:#fff; background:#64bac2;" type="submit" value="&#xf06b" class="fa fa-refresh btn btn-circle btn-danger ml-5"></form>
                                            @else
                                            <form action="{{route('purchase_order.addDiscount',$purchase_order->id)}}"><input style="width:60px;" type="number" name="discount_rate" id="discount_rate" min="0" max="100" value="" readonly> <input style="color:#fff; background:#f79595; border-color: #EF3737; opacity: 0.5; pointer-events:none;" type="submit" value="&#xf06b" class="fa fa-refresh btn btn-circle btn-danger ml-5" disabled="disabled"></form>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            @if($purchase_order->status == '0')
                                            <form action="{{route('purchase_order.addTax',$purchase_order->id)}}"><input style="width:60px;" type="number" name="tax_rate" id="tax_rate" min="0" max="100" value=""> <input style="color:#fff; background:#64bac2;" type="submit" value="&#xf1ec" class="fa fa-refresh btn btn-circle btn-danger ml-5"></form>
                                            @else
                                            <form action="{{route('purchase_order.addTax',$purchase_order->id)}}"><input style="width:60px;" type="number" name="tax_rate" id="tax_rate" min="0" max="100" value="" readonly> <input style="color:#fff; background:#f79595; border-color: #EF3737; opacity: 0.5; pointer-events:none;" type="submit" value="&#xf1ec" class="fa fa-refresh btn btn-circle btn-danger ml-5" disabled="disabled"></form>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-circle btn-danger" name="" target="_blank" href="{{ route('purchase_order.print', $purchase_order->id) }}"><i class="fa fa-print"></i></a>
                                        </td>
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