<?php

namespace miniCRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'name' => 'required|unique',
          'email' => 'required|unique',
          'logo' => 'image|dimensions:max_width=100,max_height=100',
          'website' => 'unique'
        ]);

        $company = new \miniCRM\Company;
        $company->name=$request->get('name');
        $company->email=$request->get('email');
        $company->website=$request->get('website');

        $logo = $request->get('logo');
        Storage::disk('uploads')->put($company->name, $logo);

        $company->created_at=Carbon::now();
        $company->updated_at=Carbon::now();

        $company->save();

        return redirect('companies')->with('success', 'Information has been added');
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
        $company = \miniCRM\Company::find($id);
        return view('companies/edit', ['company' => $company]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = \miniCRM\Company::find($id);
        $company->delete();
        return redirect('companies')->with('success','Company has been  deleted');
    }
}
