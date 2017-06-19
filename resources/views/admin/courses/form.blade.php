<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.name')}}</label>
        <input type="text" name="name" class="form-control" placeholder="{{trans('labels.placeholder')}}" value="{{$row->name or old('name')}}">
      </div>
    </div>
  </div>
</div>
@include('vendor.button.create')
