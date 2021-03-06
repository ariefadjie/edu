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
            <th>{{trans('labels.content')}}</th>
            <th>{{trans('labels.max_score')}}</th>
            <th>{{trans('labels.created_at')}}</th>
            <th>{{trans('labels.action')}}</th>
          </tr>
          @foreach($rows as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->task->name or ''}}</td>
            <td>{!!$row->content!!}</td>
            <td>{{$row->max_score}}</td>
            <td>{{$row->created_at->format('Y-m-d H:i')}}</td>
            <td><a href="{{route('user.questions.answer',$row->id)}}"><span class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('labels.answer')}}</span></a></td>
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
