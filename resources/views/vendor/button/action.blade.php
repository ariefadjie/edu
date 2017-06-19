<a href="{{route('admin.users.edit',$row->id)}}"><span class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{trans('labels.edit')}}</span></a>

<button type="submit" class="btn btn-danger btn-sm" form="form_delete"><i class="fa fa-trash-o" aria-hidden="true"></i> {{trans('labels.delete')}}</button>
<form action="{{route('admin.users.destroy',$row->id)}}" method="POST" id="form_delete">
{{csrf_field()}}
{{method_field('DELETE')}}
</form>
