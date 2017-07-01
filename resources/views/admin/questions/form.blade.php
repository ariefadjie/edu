<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.task')}}</label>
        <select name="task" class="form-control select2" data-placeholder="{{trans('labels.course_select')}}" style="width: 100%;">
        @foreach($tasks as $id => $name)
          <option value="{{$id}}"
          {{isset($row) && $row->task_id==$id ? 'selected' : ''}}
          >{{$name}}</option>
        @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.max_score')}}</label>
        <input type="number" name="max_score" class="form-control" placeholder="{{trans('labels.placeholder')}}" value="{{$row->max_score or old('max_score')}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>{{trans('labels.content')}}</label>
        <textarea name="content" class="form-control" id="editor1" placeholder="{{trans('labels.placeholder')}}">{{$row->content or old('content')}}</textarea>
      </div>
    </div>
  </div>
</div>
@include('vendor.button.create')
@section('script')
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>
@endsection
