<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $employees = Employee::all();
            return view('employees.index', ['employees' => $employees]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('employees.create');
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'department' => 'required',
            'job' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required'
        ]);

        try {

            // ONE WAY TO DO IT:

            // $employee = new Employee;
            // $employee->name = $request->input('name');
            // $employee->department = $request->input('department');
            // $employee->job = $request->input('job');
            // $employee->phone = $request->input('phone');
            // $employee->email = $request->input('email');
            // $employee->address = $request->input('address');
            // $employee->save();

            // SECOND WAY TO DO IT (passing an array):

            $employee = Employee::create([
                'name' => $request->input('name'),
                'department' => $request->input('department'),
                'job' => $request->input('job'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address')
            ]);

            return redirect('employees');
        
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
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
        try {
            $employee = Employee::find($id);
            return view('employees.show', ['employee' => $employee]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $employee = Employee::find($id);
            return view('employees.edit', ['employee' => $employee]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
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

        try {
            $employee = Employee::where('id', $id)
            ->update([
            'name' => $request->input('name'),
            'department' => $request->input('department'),
            'job' => $request->input('job'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address')
        ]);

        return redirect('/employees');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);
            $employee->delete();

            return redirect('/employees');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function search (Request $request) {

        try {
            $employees = Employee::where('job', $request->input('job'))->get();
            
            return view('employees.search', [
                'employees' => $employees,
                'job' => $request->input('job')
            ]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
        
    }
}
