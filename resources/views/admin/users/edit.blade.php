@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-xs-12">
	<div class="box box-warning">
		<form action="{{route('admin.users.update',$row->id)}}" method="POST">
		{{csrf_field()}}
		{{method_field('PUT')}}
		@include('vendor.button.create')
   		@include('admin.users.form')
   		</form>
		</div>
	</div>
</div>
@endsection
