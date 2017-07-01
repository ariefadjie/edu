<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.course')}}</label>
        <select name="course" class="form-control select2" data-placeholder="{{trans('labels.course_select')}}" style="width: 100%;">
        @foreach($courses as $id => $name)
          <option value="{{$id}}"
          {{$row->course_id==$id ? 'selected' : ''}}
          >{{$name}}</option>
        @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.name')}}</label>
        <input type="text" name="name" class="form-control" placeholder="{{trans('labels.placeholder')}}" value="{{$row->name or old('name')}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.type')}}</label>
        <div>
        <label>
          <input type="radio" name="type" value="task" class="flat-red" checked>
          Task
        </label>
        &nbsp;
        <label>
          <input type="radio" name="type" value="quiz" class="flat-red">
          Quiz
        </label>
        </div>
      </div>
    </div>
  </div>
</div>
@include('vendor.button.create')
@section('script')
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
  });
</script>
@endsection
