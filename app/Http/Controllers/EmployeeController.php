<?php

namespace miniCRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use miniCRM\Http\Requests\EmployeeRequest;
use miniCRM\Company;
use miniCRM\Employee;
use Carbon\Carbon;
use Lang;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')->paginate(10);
        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
      $employee = new \miniCRM\Employee;

      $employee->first_name=$request->input('first_name');
      $employee->last_name=$request->input('last_name');
      $employee->company=$request->input('company');
      $employee->email=$request->input('email') !== null ? $request->input('email') : "";
      $employee->phone=$request->input('phone') !== null ? $request->input('phone') : "";

      $now=Carbon::now();
      $employee->created_at=$now;
      $employee->updated_at=$now;

      $employee->save();

      return redirect('employees')->withErrors(Lang::get('ui.employee') . Lang::get('ui.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::find($id);
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
        return view('employees/edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
      $employee = Employee::find($id);
      $employee->update([
        $employee->first_name=$request->input('first_name'),
        $employee->last_name=$request->input('last_name'),
        $employee->company=$request->input('company'),
        $employee->email=$request->input('email'),
        $employee->phone=$request->input('phone'),
        $employee->updated_at=Carbon::now(),
      ]);

      $employee->save();

      return redirect('employees')->withErrors(Lang::get('ui.employee') . Lang::get('ui.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('employees')->withErrors(Lang::get('ui.employee') . Lang::get('ui.deleted'));

    }
}
