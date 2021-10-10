@extends('IPTV::app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-md-4"><b>{{ __('Customers Plan') }}</b></div>

						<div class="col-md-3"><a href="{{ route('list_customer') }}">{{  __('Customer List') }}</a></div>
						<div class="col-md-3"><a href="{{ route('add_plan') }}">{{ __('Add Plan')}}</a></div>
                        <div class="col-md-2"><a href="{{ route('config') }}">{{ __('Config')}}</a></div>

					</div>
				</div>

                <div class="card-body">
					@foreach($list as $plan)
					<div class="row">
						<div class="col-md-8">
						{{ $plan->name }}
						</div>
						<div class="col-md-2">
						  <a href="{{ route('delete_plan',$plan->id)  }}">{{ __('delete')}}</a>
						</div>
						<div class="col-md-2">
						  <a href="{{ route('show_plan',$plan->id)  }}">{{ __('edit') }}</a>
						</div>

					</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
