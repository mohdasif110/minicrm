@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Company info') }}</div>
				<div class="card-body">
				    @if ($errors->any())

        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
		@endif 
        <form action="{{ route('companies.update',$company->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group mb-2">
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ $company->name }}" name="name" id="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>{{ __('Email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $company->email }}" name="email" id="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>{{ __('Address') }}</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $company->address }}" name="address" id="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>{{ __('Website') }}</label>
                <input type="text" class="form-control @error('website') is-invalid @enderror" value="{{ $company->website }}" name="website" id="website">

                @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
            </div>
			
			<div class="form-group mb-2">
                <label>{{ __('Logo') }}</label>               
				<input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ $company->logo }}" placeholder="image">
				
				{{ asset('storage/app/public/company/logos/'.$company->logo) }}
				
				
				
				
				<img src="{{ asset('storage/app/public/company/logos/'.$company->logo) }}" alt="" title="">
				
				@error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
            </div>
			<div class="d-grid mt-3">
              <input type="submit" name="send" value="{{__('Submit')}}" class="btn btn-dark btn-block">
            </div>
        </form>

				</div>
            </div>
        </div>
    </div>
</div>
@endsection
