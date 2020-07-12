<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $company = new Company;
        $company->name = 'company';
        $company->email = 'company@workplace.com';
        $company->logo = 'company.png';
        $company->save();
    }
}
