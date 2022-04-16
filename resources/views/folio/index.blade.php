@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Folios</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Folios</li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('folio.create')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Folio</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folios Registrados</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sucursal</th>
                                        <th>Serie</th>
                                        <th>Folio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($folios as $folio)
                                <tr>
                                    <td>{{$folio->branch_id}}</td>
                                    <td>{{$folio->serie}}</td>
                                    <td>{{$folio->folio}}</td>
                                    <td>
                                        <a class="btn btn-circle btn-danger mb-5" name="edit" href="{{ route('folio.edit',$folio->id)}}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-circle btn-danger mb-5" name="delete" href="{{ route('folio.destroy',$folio->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection