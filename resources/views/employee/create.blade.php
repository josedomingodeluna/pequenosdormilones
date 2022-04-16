@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Empleados</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Empleados</li>
                            <li class="breadcrumb-item active" aria-current="page">Todo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('employee.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Ver Empleados</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Empleado</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('employee.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Nombre: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="first_name" name="first_name"  value="{{ old('first_name', '') }}" class="form-control">
                                                        @error('first_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Apellido: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="last_name" name="last_name"  value="{{ old('last_name', '') }}" class="form-control">
                                                        @error('last_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>RFC: <span class="text-danger">*</span></h5></h5>
                                                        <input type="text" id="rfc" name="rfc"  value="{{ old('rfc', '') }}" class="form-control"  onkeyup="this.value = this.value.toUpperCase();">
                                                        @error('rfc')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>CURP:</h5>
                                                        <input type="text" id="curp" name="curp"  value="{{ old('curp', '') }}" class="form-control">
                                                        @error('curp')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Teléfono: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="phone" name="phone"  value="{{ old('phone', '') }}" class="form-control">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Dirección:</h5>
                                                        <input type="text" id="address" name="address"  value="{{ old('address', '') }}" class="form-control">
                                                            @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sd-12 col-md-6">
                                                    <div class="form-group">
                                                        <h5>Periodicidad: <span class="text-danger">*</span></h5>
                                                        <select name="payment_frequency_id" id="payment_frequency_id" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="disabled">Selecciona</option>
                                                            @foreach($payment_frequencies as $payment_frequency)
                                                                <option value="{{$payment_frequency->id}}">{{$payment_frequency->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('payment_frequency_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sd-12 col-md-6">
                                                    <div class="form-group">
                                                        <h5>Salario: <span class="text-danger">*</span></h5>
                                                        <input type="number" step="0.01" id="salary" name="salary"  value="{{ old('salary', '') }}" class="form-control">
                                                        @error('salary')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    <h5>Notas: </h5>
                                                        <textarea name="notes" id="notes" class="form-control" placeholder="Textarea text" aria-invalid="false">{{ old('address', '') }}</textarea>
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