<a href="{{route('admin.'.routeModel().'.edit',$row->id)}}"><span class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{trans('labels.edit')}}</span></a>

<button type="submit" class="btn btn-danger btn-sm" form="form_delete_{{$row->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i> {{trans('labels.delete')}}</button>
<form action="{{route('admin.'.routeModel().'.destroy',$row->id)}}" method="POST" id="form_delete_{{$row->id}}">
{{csrf_field()}}
{{method_field('DELETE')}}
</form>
