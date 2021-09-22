@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
						<div class="col-md-3"><b>{{ __('Customer') }} </b></div>
						<div class="col-md-3"><a href="{{ route('list_channel') }}">{{  __('Customers List') }}</a></div>
						<div class="col-md-3"><a href="{{ route('list_group') }}">{{ __('Plan List') }}</a></div>
                        <div class="col-md-3"><a href="{{ route('add_cdn') }}">{{ __('Add CDN') }}</a></div>
					</div>
                </div>

                <div class="card-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url()->current()  }}" enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group">
							<label for="number" class="col-md-4 control-label">{{ __('Number') }}</label>
							<div class="col-md-6">
								<input id="number" type="number" min="1"   class="form-control" name="number" value="@if(isset($Channel->number)){{ $Channel->number }}@endif" placeholder="" required autofocus>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>


						<div class="form-group">
							<label for="image" class="col-md-4 control-label">{{ __('Logo') }}</label>
							<div class="col-md-6">
								<input id="image" type="file"   class="form-control" name="image" @if(!isset($Channel->logo)) required @endif placeholder=""  >

								@if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>


						<div class="form-group">
							<label for="name" class="col-md-4 control-label">{{ __('Name') }}</label>
							<div class="col-md-6">
								<input id="name" type="text"   class="form-control" name="name" value="@if(isset($Channel->name)){{ $Channel->name }}@endif" placeholder="" required >
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>




						<div class="form-group">
							<label for="group_id" class="col-md-4 control-label">{{ __('Group') }}</label>
							<div class="col-md-6">
								<select id="group_id" class="form-control" name="group_id"   >
									@foreach($Planslist as $plan)
										<option @if(isset($Channel->group_id)) @if($Channel->group_id==$plan->id)  selected @endif @endif value="{{ $plan->id}}">{{$plan->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
                        @if($radio_stream )
						<div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault"  value='1'  name="radio" @if(@$Channel->radio) checked @endif>
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{ __('is Radio?') }}</label>
                            </div>
                        </div>
                        @endif
						<div class="row">
							<div class="col-md-6 col-md-offset-5">
								<button class="btn btn-primary">{{ __('Save')}}</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
 </div>
@endsection
