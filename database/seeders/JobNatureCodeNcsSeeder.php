<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobNatureCodeNcs;

class JobNatureCodeNcsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobscodes = [
            ['code' => 'C', 'name' => 'Contractual'],
            ['code' => 'D', 'name' => 'Deputation'],
            ['code' => 'F', 'name' => 'Full Time'],
            ['code' => 'I', 'name' => 'Internship'],
            ['code' => 'P', 'name' => 'Part Time'],
        ];
        foreach ($jobscodes as $code){
            JobNatureCodeNcs::create($code);
        }
    }
}
