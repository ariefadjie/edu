<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.name')}}</label>
        <input type="text" name="name" class="form-control" placeholder="{{trans('labels.placeholder')}}" value="{{$row->name or ''}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.email')}}</label>
        <input type="text" name="email" class="form-control" placeholder="{{trans('labels.placeholder')}}"value="{{$row->email or ''}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.password')}}</label>
        <input type="text" name="password" class="form-control" placeholder="{{trans('labels.placeholder')}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.password_confirm')}}</label>
        <input type="text" name="password_confirm" class="form-control" placeholder="{{trans('labels.placeholder')}}">
      </div>
    </div>
  </div>
</div>
