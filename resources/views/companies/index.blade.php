@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				 <div class="card-header">{{ __('name') }}</div>
				 <div class="card-body">
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif
					  <table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">{{ __('Name') }}</th>
								<th scope="col">{{ __('Address') }}</th>
								<th scope="col">{{ __('Website') }}</th>
								<th scope="col">{{ __('Email') }}</th>
								<th scope="col">{{ __('Action') }}</th>
							</tr>
						</thead>
						<tbody>
						@if(!empty($companies) && $companies->count())
							@foreach($companies as $key => $value) 
							<tr>
								<td>{{$value->name}}</td>
								<td>{{$value->address}}</td>
								<td>{{$value->website}}</td>
								<td>{{$value->email}}</td>
								<td>
								<form  onsubmit="return confirm('Are you sure to delete this company?')" action="{{ route('companies.destroy',$value->id) }}" method="POST">
								<a class="btn btn-primary" href="{{ route('companies.edit',$value->id) }}">{{ __('Edit') }}</a>
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
								</form>
								</td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="10" align="center" ><b>{{ __('There are no data.') }}</b></td>
							</tr>
						@endif
						</tbody>
					</table>
					{{ $companies->links('pagination.custom') }}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
