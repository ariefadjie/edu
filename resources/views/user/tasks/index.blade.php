@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>{{trans('labels.id')}}</th>
            <th>{{trans('labels.name')}}</th>
            <th>{{trans('labels.type')}}</th>
            <th>{{trans('labels.course')}}</th>
            <th>{{trans('labels.total_max_score')}}</th>
            <th>{{trans('labels.created_at')}}</th>
            <th>{{trans('labels.action')}}</th>
          </tr>
          @foreach($rows as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->type}}</td>
            <td>{{$row->course->name or ''}}</td>
            <td>{{$row->questions->sum('max_score')}}</td>
            <td>{{$row->created_at->format('Y-m-d H:i')}}</td>
            <td><a href="{{route('user.tasks.show',$row->id)}}"><span class="btn btn-primary btn-sm">{{$row->questions->count()}} {{trans('labels.questions')}}</span></a></td>
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
