<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Lang;
class EmployeesController extends Controller
{
	public function index()
	{
		$employees = Employee::latest()->paginate(10);
		return view('employees.index',compact('employees'))->with('i', (request()->input('page', 1) - 1) * 10);
	}

	public function create()
	{
		$companies  =  Company::get();
		return view('employees.add', compact('companies'));
	}
	
	public function store(Request $request)
	{

	$validatedData =   $this->validate($request, [
	  'first_name' => 'required',
	  'last_name' => 'required',
	  'email' => 'required|email',
	  'phone' => 'required',
	  'company_id'=>'required|exists:companies,id'
	]);

	$employee = Employee::create($validatedData);
	return redirect()->route('employees.index')->with('success',trans('Employee have been added successfully.'));

	}
	
	public function show(Employee $employee){}
	
	public function edit(Employee $employee)
	{
		$companies  =  Company::get();
		return view('employees.edit',compact(['employee','companies']));
	}
	
	public function update(Request $request, Employee $employee)
	{
        $request->validate([
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'company_id'=>'required|exists:companies,id'
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success',trans('employee have been updated successfully.'));
    }
	
	public function destroy(Employee $employee)
    {
		$employee->delete();
		return redirect()->route('employees.index')->with('success',trans('employee have been deleted successfully.'));
    }
}
