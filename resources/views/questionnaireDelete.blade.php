@extends('layouts.app2')

@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Jawaban
            <small>Hapus</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Hasil Kuesioner</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Apakah anda yakin akan menghapus jawaban ini?</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <h4>{{$answer->name}}</h4>
                    </div>
                    <div class="box-footer">
                        <a href="{{url()->previous()}}"><button type="button" class="btn btn-default pull-left">Batal</button></a>
                        <form role="form" method="POST" action="{{route('questionnaire.delete',['id'=>$answer->id])}}">
                            {{method_field('DELETE')}}
                            @csrf
                            <button type="submit" class="btn btn-danger pull-right">Hapus</button>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection