<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use DB;
use Illuminate\Support\Facades\Storage; 

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("companies.index");
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
        $this ->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1999']);

        if($request->hasFile('image')){
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME) ;
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/logos', $fileNameToStore);
        }
        
        $company = new Company(array(
            'name' => $request->get('name'),
            'email'  => $request->get('email'),
            'website'  => $request->get('website'),
            'logo'  => $fileNameToStore
          ));
      
          $company->save();
      
        //   $imageName = $company->id . '.' . 
        //       $request->file('image')->getClientOriginalExtension();
      
        //   $request->file('image')->move(
        //       base_path() . '/storage/app/public/logos', $imageName
        //   );
      
        //   return \Redirect::route('admin.products.edit', 
        //       array($product->id))->with('message', 'Product added!');   
        return redirect("/company"); 
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
        $company = Company::find($id);
        return view("companies.edit")->with('company',$company);
        // return redirect()->action('AnotherController@someMethod');
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

        $this ->validate($request, ['image' => '|image|mimes:jpeg,png,jpg,gif|max:2048']);
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME) ;
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/logos', $fileNameToStore);
            }

        $company = Company::find($id);
        $company ->name = $request->get('name')." ";
        $company ->email = $request->get('email');
        $company ->website= $request->get('website');
        if($request->hasFile('image')){
        Storage::delete('public/logos/'.$company->logo);
        $company ->logo  = $fileNameToStore;
        }
        $company->save();

        //   $imageName = $company->id . '.' . 
        //       $request->file('image')->getClientOriginalExtension();
      
        //   $request->file('image')->move(
        //       base_path() . '/storage/app/public/logos', $imageName
        //   );
      
        //   return \Redirect::route('admin.products.edit', 
        //       array($product->id))->with('message', 'Product added!');
         
        return  redirect("/company"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('companyId',$id)->get();
        foreach($employee as $x){
            $x->delete();
        }
        // $employee->delete();
        $company = Company::find($id);
        $company->delete();
        if($company->logo != 'noimage.jpg'){
            Storage::delete('public/logos/'.$company->logo);
        }
        return redirect("/company"); 
    }

    public function addCompany(){
        return view("companies.add");
    }
    public function showCompany(){
        $companies = Company::orderBy('created_at','desc')->get();
        return view("companies.show") ->with('companies',$companies);
    }
}
