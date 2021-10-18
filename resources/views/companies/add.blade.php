@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Company') }}</div>
				<div class="card-body">
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif    

        <form  method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data" novalidate>

            @csrf

            <div class="form-group mb-2">
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" name="name" id="name">

                @error('name')
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
                <label>{{ __('Address') }}</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" id="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>{{ __('Website') }}</label>
                <input type="text" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" name="website" id="website">

                @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
            </div>
				
			<div class="form-group mb-2">
                <label>{{ __('Logo') }}</label>               
				<input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}" placeholder="image">
                @error('logo')
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
