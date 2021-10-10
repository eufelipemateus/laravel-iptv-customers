@extends('IPTV::app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-md-3"><b>{{ __('Customers') }}</b></div>
                        <div class="col-md-3"><a href="{{ route('add_customer') }}">{{ __('Add Customer') }}</a></div>
                        <div class="col-md-2"><a href="{{ route('list_plan') }}">{{ __('Plan List') }}</a></div>
                        <div class="col-md-2"><a href="{{ route('config') }}">{{ __('Config')}}</a></div>
                    </div>
				</div>

                <div class="card-body">
					@foreach($list as $customer)

						<div class="row">
							<div class="col-md-4">
								<b>{{ $customer->username }}</b>
                            </div>
							<div class="col-md-4">
								{{ $customer->plan->name }}
							</div>

							<div class="col-md-2">
							  <a href="{{  route('show_customer',$customer->id) }}">{{ __('edit') }}</a>
							</div>
							<div class="col-md-2">
							  <a href="{{  route('delete_customer',$customer->id) }}">{{ __('delete')}}</a>
							</div>
						</div>
					@endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
