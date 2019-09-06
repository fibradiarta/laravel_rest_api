<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Employees $employee
     * @return EmployeeResource
     */
    public function show(Employees $employee): EmployeeResource
    {
        return new EmployeeResource($employee);
    }

    /**
     * Undocumented function
     *
     * @return EmployeeResource
     */
    public function index(): EmployeeResource
    {
        return new EmployeeResource(Employees::all());
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required'
        ]);

        $employee = Employees::create($request->all());

        return new EmployeeResource($employee);
    }

    /**
     * Undocumented function
     *
     * @param Employees $employee
     * @param Request $request
     * @return EmployeeResource
     */
    public function update(Employees $employee, Request $request): EmployeeResource
    {
        $employee->update($request->all());

        return new EmployeeResource($employee);
    }

    /**
     * Undocumented function
     *
     * @param Employees $employee
     * @return void
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();

        return response()->json("Data Berhasil di hapus!");
    }
}
