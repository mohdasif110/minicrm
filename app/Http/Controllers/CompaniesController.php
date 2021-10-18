<?php
namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
	
	public function index()
	{
		$companies = Company::latest()->paginate(10);
		return view('companies.index',compact('companies'))->with('i', (request()->input('page', 1) - 1) * 10);
	}
	
	public function create()
	{
		return view('companies.add');
	}
	
	public function store(Request $request)
	{

		$validatedData =   $this->validate($request, [
		  'name' => 'required|max:80',
          'email' => 'required|email|max:50',
		  'address'=>'nullable|string|max:100',
		  'website'=>'nullable|url',
		  'logo'=>'nullable'
		]);
	
		if($logo = $request->file('logo'))
		{
			$destinationPath = 'public/company/logos/';
			$logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
			$request->file('logo')->storeAs($destinationPath, $logoImage);
			$validatedData['logo']  =  $logoImage;
		}

		$company = Company::create($validatedData);
		return redirect()->route('companies.index')->with('success',trans('Company have been added successfully.'));
	}
	
	public function show(Company $company){}
	
	public function edit(Company $company)
	{
		return view('companies.edit',compact('company'));
	}
	
	public function update(Request $request, Company $company)
	{
        $validatedData = $request->validate([
          'name' => 'required|max:80',
          'email' => 'required|email|max:50',
		  'address'=>'nullable|string|max:100',
		  'website'=>'nullable|url',
		  'logo'=>'nullable'
         ]);
		
		if($logo = $request->file('logo'))
		{
			
			$destinationPath = 'public/company/logos/';
			$logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
			$request->file('logo')->storeAs($destinationPath, $logoImage);
			$validatedData['logo']  =  $logoImage;
			//Unlink exiting logo;
		}
	   
	    $company->update($validatedData);
        return redirect()->route('companies.index')->with('success',trans('Company have been updated successfully.'));
    }
	
	public function destroy(Company $company)
    {
		$company->delete();
		return redirect()->route('companies.index')->with('success',trans('Company have been deleted successfully.'));
    }
}