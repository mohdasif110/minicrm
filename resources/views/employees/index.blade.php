@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>
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
      <th scope="col">{{ __('Email') }}</th>
      <th scope="col">{{ __('Phone Number') }}</th>
	  <th scope="col">{{ __('Company Name') }}</th>
	   <th scope="col">{{ __('Action') }}</th>
    </tr>
  </thead>
  <tbody>
   @if(!empty($employees) && $employees->count())
	   @foreach($employees as $key => $value) 
    <tr>
      <td>{{$value->first_name}} {{$value->last_name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->phone}}</td>
	  <td>{{$value->getCompany->name}}</td>
	  <td>
			<form onsubmit="return confirm('Are you sure to delete this employee?')" action="{{ route('employees.destroy',$value->id) }}" method="POST">
					<a class="btn btn-primary" href="{{ route('employees.edit',$value->id) }}">{{ __('Edit') }}</a>
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
	{{ $employees->links('pagination.custom') }}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
