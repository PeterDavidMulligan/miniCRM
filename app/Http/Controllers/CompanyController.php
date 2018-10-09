<?php

namespace miniCRM\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use miniCRM\Http\Requests\CompanyRequest;
use Carbon\Carbon;

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
    public function store(CompanyRequest $request)
    {
        $company = new \miniCRM\Company;

        $company->name=$request->input('name');
        $company->email=$request->input('email') !== null ? $request->input('email') : "";
        $company->website=$request->input('website') !== null ? $request->input('website') : "";
        $company->created_at=Carbon::now();
        $company->updated_at=Carbon::now();

        $filename = ""; //assign here to avoid trying to insert null
        $logo = Input::file('logo');
        if($logo !== null) {
            $extension = "." . $logo->getClientOriginalExtension();
            //chop the file extension from the filename, append _time
            //to avoid naming conflicts, append the extension back on
            $filename = chop($logo->getClientOriginalName(), $extension)
              . "_" . time() . $extension;
            $request->file('logo')->move(public_path('logos'), $filename);
        }
        $company->logo = $filename;

        $company->save();

        return redirect('/companies')->with('success', 'Information has been added');
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
    public function update(CompanyRequest $request, $id)
    {
        $company = \miniCRM\Company::find($id);
        $oldCompany = $company;
        $company->name=$request->get('name');
        $company->email=$request->get('email');
        $company->website=$request->get('website');

        $filename = ""; //assign here to avoid trying to insert null
        $logo = Input::file('logo');
        if($logo !== null) {
            $extension = "." . $logo->getClientOriginalExtension();
            //chop the file extension from the filename, append _time
            //to avoid naming conflicts, append the extension back on
            $filename = chop($logo->getClientOriginalName(), $extension)
              . "_" . time() . $extension;
            $request->file('logo')->move(public_path('logos'), $filename);
        }
        $company->logo = $filename;

        $company->save();
        return redirect('companies')->with('success', 'Information has been edited');
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
