@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-xs-12">
	<div class="box box-warning">
		<form action="{{route('user.answer.store')}}" method="POST">
		{{csrf_field()}}
   		@include('user.'.routeModel().'.form')
   		</form>
		</div>
	</div>
</div>
@endsection
