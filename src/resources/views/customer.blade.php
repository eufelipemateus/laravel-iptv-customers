@extends('IPTV::app')


@section('style')
<style>
.row-line{
    margin: 5% 0;
}

</style>
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Customers') }}</h1>
</div>
<div class="container">
    <div class="row row-line">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
						<div class="col-md-3"><b>{{ __('Customer') }} </b></div>
					</div>
                </div>

                <div class="card-body">
					<form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group">
							<label for="name" class="col-md-4 control-label">{{ __('Name') }}</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="@if(isset($Customer->name)){{ $Customer->name }}@endif" placeholder="" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

                        <div class="form-group">
							<label for="username" class="col-md-4 control-label">{{ __('Username') }}</label>
							<div class="col-md-6">
								<input id="username" type="text" class="form-control" name="username" value="@if(isset($Customer->username)){{ $Customer->username }}@endif" placeholder="" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

                        <div class="form-group">
							<label for="hash_acess" class="col-md-4 control-label">{{ __('Hash') }}</label>
							<div class="col-md-6">
								<input id="hash_acess" type="text" class="form-control" readonly value="@if(isset($Customer->hash_acess)){{ $Customer->hash_acess }}@endif" placeholder="" required autofocus>
                                @if ($errors->has('hash_acess'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hash_acess') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

                        <div class="form-group">
							<label for="plan_id" class="col-md-4 control-label">{{ __('Plan') }}</label>
							<div class="col-md-6">
								<select id="plan_id" class="form-control" name="iptv_plan_id"   >
									@foreach($Planslist as $plan)
										<option @if(isset($Customer->plan_id)) @if($Customer->plan_id==$plan->id)  selected @endif @endif value="{{ $plan->id}}">{{$plan->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

                        <div class="form-group">
							<label for="cdn_id" class="col-md-4 control-label">{{ __('CDN') }}</label>
							<div class="col-md-6">
								<select id="cdn_id" class="form-control" name="iptv_cdn_id"   >
									@foreach($Cdnslist as $cdn)
										<option @if(isset($Customer->iptv_cdn_id)) @if($Customer->iptv_cdn_id==$cdn->id)  selected @endif @endif value="{{ $cdn->id}}">{{$cdn->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

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

    <div class="row row-line">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
						<div class="col-md-3"><b>{{ __('Personal URL') }} </b></div>
					</div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">{{ __('Url') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly value="   @if(isset($Customer->personal_url)){{ $Customer->personal_url }} @endif" id="myInput">
                        </div>
					</div>

                </div>
            </div>
        </div>
	</div>
 </div>
@endsection
