<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employee = new Employee;
        $employee->firstName = 'Employee';
        $employee->lastName = 'Workperson';
        $employee->email = 'emplyeeworkperson@workplace.com';
        $employee->phone = '011';
        $employee->company_id = 1;
        $employee->save();
    }
}
