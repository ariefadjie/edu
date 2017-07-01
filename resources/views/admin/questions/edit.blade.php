@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-xs-12">
	<div class="box box-warning">
		<form action="{{route('admin.'.routeModel().'.update',$row->id)}}" method="POST">
		{{csrf_field()}}
		{{method_field('PUT')}}
   		@include('admin.'.routeModel().'.form')
   		</form>
		</div>
	</div>
</div>
@endsection
