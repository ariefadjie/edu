<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="label label-danger">{{trans('labels.task')}} : {{$row->question->task->name or ''}}</label>
        <label class="label label-success">{{trans('labels.max_score')}} : {{$row->question->max_score or ''}}</label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>{{trans('labels.question')}}</label>
        <div>{!!$row->question->content or ''!!}</div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>{{trans('labels.answer')}}</label>
        <div>{!!$row->content!!}</div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>{{trans('labels.score')}}</label>
        <input type="number" name="score" class="form-control" value="{{$row->score}}" min="0" max="{{$row->question->max_score or ''}}">
      </div>
    </div>
  </div>
</div>
@include('vendor.button.create')
