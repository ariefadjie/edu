@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-xs-12">
	<div class="box box-warning">
		<form action="{{route('admin.'.routeModel().'.store')}}" method="POST">
		{{csrf_field()}}
   		@include('admin.'.routeModel().'.form')
   		</form>
		</div>
	</div>
</div>
@endsection
