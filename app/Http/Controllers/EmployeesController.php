<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('name','asc')->get();
        return view("employees.index")->with('companies',$companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('firstname') == false and $request->has('lastname')==false){
            $getId = $request->get('selectc');
            $selectCompany = Company::find($getId) ->name;
            $employees = Employee::where('companyId',$getId)->orderBy('created_at','desc')->get();
            $data = [
                "selectedC" => $selectCompany,
                "employeesP" => $employees
            ];
            return view("employees.show") ->with('data',$data);
        }
        else{
        $companies = Company::all();
        // $companyId = Company::where('name',$request->get('cname')) ->get()->id;
        $employee = new Employee(array(
            'firstname' => $request->get('firstname')." ",
            'lastname' => $request->get('lastname'),
            'email'  => $request->get('email'),
            'phone'  => $request->get('phone'),
            'companyId' => $request->get('select')
          ));
      
          $employee->save();
        return redirect("/employee")->with('companies',$companies); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::orderBy('name','asc')->get();
        $data = [
            "employee" => $employee,
            "companies" => $companies
        ];
        return view("employees.edit")->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companies = Company::all();
        // $companyId = Company::where('name',$request->get('cname')) ->get()->id;
        $employee = Employee::find($id);
        $employee ->firstname = $request->get('firstname')." ";
        $employee ->lastname = $request->get('lastname');
        $employee ->email= $request->get('email');
        $employee ->phone  = $request->get('phone');
        $employee ->companyId = $request->get('select');
      
        $employee->save();
        return redirect("/employee")->with('companies',$companies);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::all();
        $employee = Employee::find($id);
        $employee->delete();
        return redirect("/employee")->with('companies',$companies); 
    }

    public function addEmployee(){
        $companies = Company::orderBy('name','asc')->get();
        // $companies = $companies::orderBy('name','asc')->get();
        return view("employees.add")->with('companies',$companies);
    }

    public function showEmployee(Request $request){
        $getId = $request->get('selectc');
        $selectCompany = Company::find($getId);
        $employees = Employee::where('companyId',$getId)->orderBy('created_at','desc')->get();
        $data = [
            $selectedC => $selectCompany,
            $employeesP => $employees
        ];
        return view("employees.show") ->with('data',$data);
    }
}
