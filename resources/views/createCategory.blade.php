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
            Pertanyaan
            <small>Kategori Pertanyaan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Pertanyaan</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        @if ($message = Session::get('category'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Kategori {{$message->name}} berhasi dibuat.</strong></h4>
            </div>
        @endif
        @if ($message = Session::get('editedCategory'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Berhasil mengubah kategori menjadi {{$message->name}}.</strong></h4>
            </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kategori Pertanyaan Baru</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('category.create')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" class="form-control" id="" name="name">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Kategori Pertanyaan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="category-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px; text-align:center">No</th>
                                    <th>Kategori</th>
                                    <th style="width:50px; text-align:left">Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($categories); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td><a href="{{route('category.detail.id',['id'=>$categories[$i]->id])}}">{{$categories[$i]->name}}</a></td>
                                    <td><a href="{{route('category.edit.page',['id'=>$categories[$i]->id])}}"><button type="button" class="btn btn-primary btn-flat btn-block">UBAH</button></a></td>
                                </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Ubah</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
      $('#category-list').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
    })
</script>
@endsection