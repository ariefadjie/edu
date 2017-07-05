@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>{{trans('labels.id')}}</th>
            <th>{{trans('labels.user')}}</th>
            <th>{{trans('labels.task')}}</th>
{{--             <th>{{trans('labels.question')}}</th>
            <th>{{trans('labels.answers')}}</th> --}}
{{--             <th style="min-width: 115px;">{{trans('labels.answered_at')}}</th> --}}
            <th>{{trans('labels.score')}}</th>
            <th>{{trans('labels.max_score')}}</th>
            <th>{{trans('labels.action')}}</th>
          </tr>
          @foreach($rows as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td><a href="{{route('admin.reports.index',['user_id'=>$row->user_id])}}">{{$row->user->name or ''}}</a></td>
            <td><a href="{{route('admin.reports.index',['task_id'=>$row->question->task->id])}}">{{$row->question->task->name}}</a></td>
{{--             <td><a href="{{route('admin.reports.index',['question_id'=>$row->question_id])}}">{!!$row->question->content or ''!!}</a></td>
            <td>{!!$row->content!!}</td> --}}
{{--             <td>{{$row->updated_at->format('Y-m-d H:i')}}</td> --}}
            <td>{{$row->sum('score')}}</td>
            <td>{{$row->question->sum('max_score')}}</td>
            <td>{{-- <a href="{{route('admin.answers.edit',$row->id)}}"><span class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('labels.correct')}}</span></a> --}}</td>
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
