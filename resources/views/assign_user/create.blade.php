@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Asignar</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Asignar</li>
                            <li class="breadcrumb-item active" aria-current="page">Empleado</li>
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
                        <h3 class="box-title">Asignar Empleado a Usuario</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('assign_user.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Empleado: <span class="text-danger">*</span></h5>
                                                        <input type="hidden" name="employee_id" id="employee_id" value="{{ $employee->id }}">
                                                        <input type="text" id="employee_name" name="employee_name"  value="{{ $employee->first_name }} {{ $employee->last_name }}" class="form-control" readonly>
                                                        @error('employee_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sd-12 col-md-6">
                                                    <div class="form-group">
                                                        <h5>A Usuario: <span class="text-danger">*</span></h5>
                                                        <select name="user_id" id="user_id" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="disabled">Selecciona</option>
                                                            @foreach($users as $user)
                                                                <option value="{{$user->id}}">{{$user->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('user_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Asignar">
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