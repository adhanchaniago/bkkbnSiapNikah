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
        @if (Session::get('deletedQuestionnaireSuccessed'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Berhasil menghapus jawaban.</strong></h4>
            </div>
        @endif
        @if (Session::get('deleteQuestionnaireFailed'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><strong>Gagal menghapus jawaban.</strong></h4>
            </div>
        @endif
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
                                    <th style="width:50px">Detail</th>
                                    <th style="width:50px">Hapus</th>
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
                                    <td><a href="#"><button onclick="detailModal('{{route('api.answer.get',[$answers[$i]->id])}}')" class="btn btn-primary btn-flat btn-block">DETAIL</button></a></td>
                                    <td><a href="{{route('questionnaire.delete.page',['id'=>$answers[$i]->id])}}"><button class="btn btn-danger btn-flat btn-block">HAPUS</button></a></td>
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
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal fade" id="detail-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Detail Jawaban </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="responden-name" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="responden-email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="responden-gender" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <input type="text" class="form-control" id="responden-location" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Skor</label>
                                        <input type="text" class="form-control" id="responden-score" disabled>
                                    </div>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Pertanyaan</th>
                                            <th style="width:50px">Jawaban</th>
                                        </thead>
                                        <tbody id="answer-table">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                </div>
                                
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
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
<script>
    function detailModal(url){
        $.ajax({url: url, success: function(result){
            console.log(result.data);
            document.getElementById("responden-name").value = result.data.name;
            document.getElementById("responden-email").value = result.data.email;
            document.getElementById("responden-gender").value = (result.data.gender=="male"?"Laki-laki":"Perempuan");
            document.getElementById("responden-location").value = result.data.location;
            document.getElementById("responden-score").value = result.data.score;
            var table = "";
            for (let i = 0; i < result.data.answer.length; i++) {
                var tr = "<tr>";
                tr += "<td>"+result.data.answer[i].id+"</td>";
                tr += "<td>"+(result.data.answer[i].answer==0?"Tidak":"Ya")+"</td>";
                tr += "</tr>";
                table += tr;
            }
            document.getElementById("answer-table").innerHTML += table;
            $('#detail-modal').modal('show');
        }});
    }
</script>
@endsection