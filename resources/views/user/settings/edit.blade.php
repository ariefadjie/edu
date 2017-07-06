@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-xs-12">
	<div class="box box-warning">
		<form action="{{route('user.'.routeModel().'.update',$row->id)}}" method="POST">
		{{csrf_field()}}
		{{method_field('PUT')}}
   		@include('user.'.routeModel().'.form')
   		</form>
		</div>
	</div>
</div>
@endsection
