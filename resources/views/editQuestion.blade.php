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
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Pertanyaan</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Pertanyaan {{--$category->name--}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('category.detail.question.edit',['categoryId'=>$categoryId,'questionId'=>$question->id])}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Pertanyaan</label>
                                <input type="text" class="form-control" id="" name="question" value="{{$question->question}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pertanyaan Khusus Untuk Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="all" @if($question->gender == "all") selected @endif>All</option>
                                    <option value="male" @if($question->gender == "male") selected @endif>Laki-laki</option>
                                    <option value="female" @if($question->gender == "female") selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jawaban yang benar</label>
                                <select class="form-control" name="answer" required>
                                    <option @if ($question->answer == 1)
                                        selected
                                    @endif value="1">Ya</option>
                                    <option @if ($question->answer == 0)
                                        selected
                                    @endif value="0">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Rekomendasi Bila Jawaban Benar</label>
                                <textarea class="form-control" rows="4" placeholder="" name="correctAnswerRecommendation" required>{{$question->correctAnswerRecommendation}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Rekomendasi Bila Jawaban Salah</label>
                                <textarea class="form-control" rows="4" placeholder="" name="wrongAnswerRecommendation" required>{{$question->wrongAnswerRecommendation}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Ubah</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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