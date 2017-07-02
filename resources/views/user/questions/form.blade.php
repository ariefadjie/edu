<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="label label-danger">{{trans('labels.task')}} : {{$row->task->name}}</label>
        <label class="label label-success">{{trans('labels.max_score')}} : {{$row->max_score}}</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>{{trans('labels.question')}}</label>
        <div>{!!$row->content!!}</div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>{{trans('labels.answer')}}</label>
        <textarea name="answer" class="form-control" id="editor1" placeholder="{{trans('labels.placeholder')}}">{{old('answer')}}</textarea>
        <input type="hidden" name="question_id" value="{{$row->id}}">
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
