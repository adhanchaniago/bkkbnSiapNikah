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
            Hasil Kuesioner
            {{-- <small>Control panel</small> --}}
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
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tabel Hasil Kuesioner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="questionnaire-result" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10px; text-align:center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat tinggal</th>
                                    <th>Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($answers); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$answers[$i]->name}}</td>
                                    <td>{{$answers[$i]->email}}</td>
                                    <td>@if ($answers[$i]->gender=="male")
                                        Laki-laki
                                        @else
                                        Perempuan
                                    @endif</td>
                                    <td>{{$answers[$i]->location}}</td>
                                    <td>{{$answers[$i]->score}}</td>
                                </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:10px; text-align:center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat tinggal</th>
                                    <th>Skor</th>
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
      $('#questionnaire-result').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    })
</script>
@endsection