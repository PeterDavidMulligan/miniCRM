<?php

namespace miniCRM\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use miniCRM\Http\Requests\CompanyRequest;
use Carbon\Carbon;
use miniCRM\Company;
use Lang;

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

        $now=Carbon::now();
        $company->created_at=$now;
        $company->updated_at=$now;

        $logo = Input::file('logo');
        if($logo !== null) {
            $extension = "." . $logo->getClientOriginalExtension();
            //chop the file extension from the filename, append _time
            //to avoid naming conflicts, append the extension back on
            $filename = chop($logo->getClientOriginalName(), $extension)
              . "_" . time() . $extension;
              //Savethe file in /public/logos
            $request->file('logo')->move(public_path('logos'), $filename);
        }
        $company->save();

        return redirect('/companies')->withErrors('success', $company->name . Lang::get('ui.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::find($id);
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
        $filename=$company->logo;

        $logo = Input::file('logo');
        if($logo !== null) {
            $extension = "." . $logo->getClientOriginalExtension();
            //chop the file extension from the filename, append _time
            //to avoid naming conflicts, append the extension back on
            $filename = chop($logo->getClientOriginalName(), $extension)
              . "_" . time() . $extension;
              //Save the image in public/logos and add the path to the table
            $request->file('logo')->move(public_path('logos'), $filename);
        }

        $company->update([
          $company->email=$request->get('email'),
          $company->logo = $filename,
          $company->website=$request->get('website'),
        ]);
        $company->save();

        return redirect('companies')->withErrors('success', $company->name . Lang::get('ui.edited'));
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

        return redirect('companies')->withErrors('success', $company->name . Lang::get('ui.deleted'));
    }
}
