@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Employee') }}</div>
				<div class="card-body">
					@if(Session::has('success'))
						<div class="alert alert-success text-center">
							{{Session::get('success')}}
						</div>
					@endif    
					<form  method="post" action="{{ route('employees.store') }}" novalidate>
					@csrf
						<div class="form-group mb-2">
							<label>{{ __('First Name') }}</label>
							<input type="text" class="form-control @error('first_name') is-invalid @enderror"  value="{{ old('first_name') }}" name="first_name" id="first_name">
							@error('first_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>{{ __('Last Name') }}</label>
							<input type="text" class="form-control @error('last_name') is-invalid @enderror"  value="{{ old('last_name') }}" name="last_name" id="last_name">
							@error('last_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group mb-2">
						<label>{{ __('Email') }}</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email">
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>{{ __('Phone Number') }}</label>
							<input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone">
							@error('phone')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>{{ __('Company Name') }} </label>
							<select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror" style="width:200px">
							<option value="">---{{ __('Select Company') }}---</option>
							@foreach ($companies as $key => $value)
							<option value="{{ $value->id }}">{{ $value->name }}</option>
							@endforeach
							</select>
							@error('company_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror                
						</div>
						<div class="d-grid mt-3">
							<input type="submit" name="send" value="{{ __('Submit') }}" class="btn btn-dark btn-block">
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
