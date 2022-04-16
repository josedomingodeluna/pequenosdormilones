@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Productos</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Productos</li>
                            <li class="breadcrumb-item active" aria-current="page">Registro</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> Ver Productos</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Producto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('product.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6 col-md-2">
                                                    <div class="form-group">
                                                        <h5>Codigo:</h5>
                                                        <input type="text" id="code" name="code" value="{{old('code', '')}}" class="form-control">
                                                        @error('code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <div class="form-group">
                                                        <h5>Nombre: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="name" name="name" value="{{old('name', '')}}" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="form-group">
                                                        <h5>Categoria: <span class="text-danger">*</span></h5>
                                                        <select class="form-control" name="category" id="category" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disable="">Selecciona</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="form-group">
                                                        <h5>Precio de Compra:</h5>
                                                        <input type="number" step="0.01" id="purchase_price" name="purchase_price" value="{{old('purchase_price', '')}}" class="form-control">
                                                            @error('purchase_price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="form-group">
                                                        <h5>Precio de Venta: <span class="text-danger">*</span></h5>
                                                        <input type="number" step="0.01" id="sale_price" name="sale_price" value="{{old('sale_price', '')}}" class="form-control">
                                                            @error('sale_price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="form-group">
                                                        <h5>Stock minimo: <span class="text-danger">*</span></h5>
                                                        <input type="number" id="minstock" name="minstock" value="{{old('minstock', '')}}" class="form-control">
                                                            @error('minstock')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    <h5>Descripcion: </h5>
                                                        <textarea name="description" id="description" class="form-control" placeholder="Textarea text" aria-invalid="false">{{old('description', '')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5><span class="text-danger">*</span> Campos Obligtorios </h5>
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