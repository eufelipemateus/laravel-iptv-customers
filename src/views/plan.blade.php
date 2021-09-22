@extends('IPTV::app')

@section('style')
<style>
.row{
    margin: 1% 0;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
						<div class="col-md-6"><b>{{ __('Plan') }}</b></div>
						<div class="col-md-3"><a href="{{ route('list_channel') }}">{{  __('Costumers List') }}</a></div>
						<div class="col-md-3"><a href="{{ route('list_plan') }}">{{ __('Plan List') }}</a></div>
					</div>
                </div>

                <div class="card-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url()->current() }}" enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group">
							<label for="name" class="col-md-4 control-label">{{ __('Name') }}</label>
							<div class="col-md-6">
								<input id="name" type="text"   class="form-control" name="name" value="@if(isset($Plan->name)){{ $Plan->name }}@endif" placeholder="" required autofocus>
							</div>
						</div>

                        <div class="form-group">
							<label for="name" class="col-md-4 control-label">{{ __('Prince') }}</label>
							<div class="col-md-6">
								<input id="name" type="number"   class="form-control" name="price" value="@if(isset($Plan->price)){{ $Plan->price }}@endif" placeholder="" required autofocus>
							</div>
						</div>


                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"  id="active"  value='1'  name="active" @if(@$Plan->active) checked @endif>
                                <label class="form-check-label" for="active">{{ __('Plan Ative') }}<label>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"  id="additional"  value='1'  name="additional" @if(@$Plan->additional) checked @endif>
                                <label class="form-check-label" for="additional">{{ __('Is additional?') }}<label>
                            </div>
                        </div>

						<div class="row">
							<div class="col-md-6 col-md-offset-5">
								<button  class="btn btn-primary">{{ __('Save')  }}</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
