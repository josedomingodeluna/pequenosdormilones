@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Pagos</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Pagos</li>
                            <li class="breadcrumb-item active" aria-current="page">Todo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('sale.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Ver Ventas</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Pago</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('payment.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Orden de Compra: <span class="text-danger">*</span></h5>
                                                        <input type="hidden" id="sale_id" name="sale_id"  value="{{ $sale->id }}" >
                                                        <input type="text" id="purchase_order_id" name="purchase_order_id"  value="{{ $sale->purchase_order_id }}" class="form-control" readonly>
                                                        @error('purchase_order_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Usuario: <span class="text-danger">*</span></h5>
                                                        <input type="hidden" id="user_id" name="user_id"  value="{{ $sale->user->id }}" >
                                                        <input type="text" id="user_name" name="user_name"  value="{{ $sale->user->name }}" class="form-control" readonly>
                                                        @error('user_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Cliente: <span class="text-danger">*</span></h5>
                                                        <input type="hidden" id="customer_id" name="customer_id"  value="{{ $customer->id }}" class="form-control">
                                                        <input type="text" name="customer_name" id="customer_name" value="{{ $customer->first_name }} {{ $customer->last_name }}" class="form-control" readonly>
                                                        @error('customer_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Referencia:</h5>
                                                        <input type="text" id="reference" name="reference"  value="{{ old('reference', '') }}" class="form-control">
                                                        @error('reference')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Metodo de Pago: <span class="text-danger">*</span></h5></h5>
                                                        <select name="payment_method_id" id="payment_method_id" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="disabled">Selecciona</option>
                                                            @foreach($payment_methods as $payment_method)
                                                                <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('payment_method_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Saldo: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="balance" name="balance"  value="{{ $sale->balance }}" class="form-control">
                                                        @error('balance')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Abono: <span class="text-danger">*</span></h5>
                                                        <input type="number" step="0.01" id="amount" name="amount"  value="{{ old('amount', '') }}" class="form-control">
                                                        @error('amount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    <h5>Concepto: <span class="text-danger">*</span></h5>
                                                        <textarea name="concept" id="concept" class="form-control" placeholder="Textarea text" aria-invalid="false">{{ old('concept', '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Guardar">
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->       
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection