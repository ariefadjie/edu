@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
    @include('vendor.button.index')
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>{{trans('labels.id')}}</th>
            <th>{{trans('labels.name')}}</th>
            <th>{{trans('labels.email')}}</th>
            <th>{{trans('labels.roles')}}</th>
            <th>{{trans('labels.courses')}}</th>
            <th style="min-width: 115px;">{{trans('labels.created_at')}}</th>
            <th style="min-width: 141px;">{{trans('labels.action')}}</th>
          </tr>
          @foreach($rows as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>
              @foreach($row->roles as $role)
              <span class="label {{$role->name=='admin'?'label-danger':'label-success'}}">{{$role->display_name}}</span>
              @endforeach
            </td>
            <td>
              @foreach($row->courses as $course)
              <span class="label label-primary">{{$course->name}}</span>
              @endforeach
            </td>
            <td>{{$row->created_at->format('Y-m-d H:i')}}</td>
            <td>@include('vendor.button.action')</td>
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
