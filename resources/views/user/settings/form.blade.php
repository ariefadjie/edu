<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.name')}}</label>
        <input type="text" name="name" class="form-control" placeholder="{{trans('labels.placeholder')}}" value="{{$row->name or old('name')}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.email')}}</label>
        <input type="text" name="email" class="form-control" placeholder="{{trans('labels.placeholder')}}"value="{{$row->email or old('email')}}">
      </div>
    </div>
    @if(isset($row))
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.password_current')}}</label>
        <input type="password" name="current_password" class="form-control" placeholder="{{trans('labels.placeholder')}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.password_new')}}</label>
        <input type="password" name="new_password" class="form-control" placeholder="{{trans('labels.placeholder')}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.password_new_confirm')}}</label>
        <input type="password" name="new_password_confirmation" class="form-control" placeholder="{{trans('labels.placeholder')}}">
      </div>
    </div>
    @else
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.password')}}</label>
        <input type="password" name="password" class="form-control" placeholder="{{trans('labels.placeholder')}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.password_confirm')}}</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="{{trans('labels.placeholder')}}">
      </div>
    </div>
    @endif
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.courses')}}</label>
        <select name="courses[]" class="form-control select2" multiple="multiple" data-placeholder="{{trans('labels.courses_select')}}" style="width: 100%;">
        @foreach($courses as $id => $name)
          <option value="{{$id}}"
          @if(isset($row))
          @foreach($row->courses as $course)
          {{$course->id==$id ? 'selected' : ''}}
          @endforeach
          @endif
          >{{$name}}</option>
        @endforeach
        </select>
      </div>
    </div>
  </div>
</div>
@include('vendor.button.create')
