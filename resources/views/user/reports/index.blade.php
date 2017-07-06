@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>{{trans('labels.id')}}</th>
            <th>{{trans('labels.task')}}</th>
            <th>{{trans('labels.score')}}</th>
            <th>{{trans('labels.max_score')}}</th>
          </tr>
          @foreach($rows as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->course_type_task}}</td>
            <td>{{$row->sum_score}}</td>
            <td>{{$row->sum_max_score}}</td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->

      <div class="box-footer clearfix">
        {!!$rows->render()!!}
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
  @endsection
