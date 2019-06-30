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
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Pesan selamat datang baru berhasi dibuat.</strong></h4>
            </div>
        @endif
        @if ($message = Session::get('success-deleted'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Pesan berhasi dihapus.</strong></h4>
            </div>
        @endif
        @if ($message = Session::get('success-edited'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Pesan berhasil diubah.</strong></h4>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Error! {{$message}}.</strong></h4>
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
                    <form role="form" method="POST" action="{{route('message.preface.create')}}" autocomplete="off">
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
                        <h3 class="box-title">Daftar Kata Pengantar</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="preface-messages" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px; text-align:center">No</th>
                                    <th>Pesan</th>
                                    <th>Status</th>
                                    <th style="width:50px; text-align:left">Ubah</th>
                                    <th style="width:50px; text-align:left">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($messages); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{(strlen($messages[$i]->message)>150?substr($messages[$i]->message,0,147).'...':$messages[$i]->message)}}</td>
                                    <td>{{($messages[$i]->isActive==true?"Aktif":"Tidak Aktif")}}</td>
                                    <td><button onclick="editModal('{{route('api.message.welcome.get',['id'=>$messages[$i]->id])}}')" type="button" class="btn btn-primary btn-flat btn-block">UBAH</button></td>
                                    <td><button onclick="deleteModal('{{route('api.message.welcome.get',['id'=>$messages[$i]->id])}}')" type="button" class="btn btn-danger btn-flat btn-block">HAPUS</button></td>
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
                    </div>
                    <!-- /.box-body -->
                    <div class="modal fade" id="edit-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="message-form" role="form" method="POST" action="#">
                                    @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Ubah Pesan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Pesan</label>
                                            <textarea class="form-control" rows="10" name="message" id="message-message" required></textarea>
                                            {{-- <input type="text" name="message" class="form-control" id="message-message" required> --}}
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="isActive" id="message-isActive" class="form-control" required>
                                                <option value="0">Tidak Aktif</option>
                                                <option value="1">Aktif</option>
                                            </select>
                                            {{-- <input type="text" class="form-control" id="message-isActive"> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                        {{-- <button type="button" class="btn btn-danger">HAPUS</button> --}}
                                        <button type="submit" class="btn btn-primary pull-right">UBAH</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="delete-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Apakah Anda Yakin Menghapus Pesan Ini?</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Pesan</label>
                                        <textarea class="form-control" rows="10" name="message" id="delete-message-message" disabled></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                    <form id="delete-message-form" role="form" method="POST" action="#">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger pull-right">HAPUS</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $('#preface-messages').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
    })
    })
</script>
<script>
    function editModal(url){
        $.ajax({url: url, success: function(result){
            console.log(result.data);
            document.getElementById("message-message").value = result.data.message;
            document.getElementById("message-isActive").selectedIndex = result.data.isActive;//(result.data.isActive==1?"Aktif":"Tidak Aktif");
            document.getElementById("message-form").action = "{{Request::url()}}/update/"+result.data.id;
            console.log("{{Request::url()}}/update/"+result.data.id);
            $('#edit-modal').modal('show');
        }});
    }
    function deleteModal(url){
        $.ajax({url: url, success: function(result){
            console.log(result.data);
            document.getElementById("delete-message-message").value = result.data.message;
            document.getElementById("delete-message-form").action = "{{Request::url()}}/delete/"+result.data.id;
            console.log("{{Request::url()}}/delete/"+result.data.id);
            $('#delete-modal').modal('show');
        }});
    }
</script>
@endsection