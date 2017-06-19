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
            <th>{{trans('labels.created_at')}}</th>
            <th>{{trans('labels.action')}}</th>
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->format('Y-m-d H:i')}}</td>
            <td>
              <span class="label label-warning">{{trans('labels.edit')}}</span>
              <span class="label label-danger">{{trans('labels.delete')}}</span>
              </td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->

      <div class="box-footer clearfix">
        {!!$users->render()!!}
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
  @endsection
