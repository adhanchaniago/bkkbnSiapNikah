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
            Pesan
            <small>Kata Pengantar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Pesan</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        @if ($message = Session::get('userCreated'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>User {{$message->name}} berhasi dibuat.</strong></h4>
            </div>
        @endif
        @if ($message = Session::get('userUpdated'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>User {{$message->name}} berhasi diperbarui.</strong></h4>
            </div>
        @endif
        @if ($message = Session::get('userDeleted'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Berhasil menghapus data {{$message}}.</strong></h4>
            </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Buat Kata Pengantar Baru</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="#" autocomplete="off">
                        @csrf
                        <div class="box-body">
                            <div class="form-group @error('message') has-error @enderror">
                                <label for="">Kata Pengantar</label>
                                <textarea class="form-control" rows="4" name="message" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Daftar User</h3>
                    </div>
                    <!-- /.box-header -->
                    {{-- <div class="box-body">
                        <table id="user-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px; text-align:center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th style="width:50px; text-align:left">Ubah</th>
                                    <th style="width:50px; text-align:left">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($users); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$users[$i]->name}}</td>
                                    <td>{{$users[$i]->email}}</td>
                                    <td><a href="{{route('user.management.edit.page',['userId'=>$users[$i]->id])}}"><button type="button" class="btn btn-primary btn-flat btn-block">UBAH</button></a></td>
                                    <td><a href="{{route('user.management.delete.page',['userId'=>$users[$i]->id])}}"><button type="button" class="btn btn-danger btn-flat btn-block">HAPUS</button></a></td>
                                </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Ubah</th>
                                    <th>Hapus</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> --}}
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
      $('#user-list').DataTable({
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