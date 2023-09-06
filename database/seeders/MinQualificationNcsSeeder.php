<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MinQualificationNcs;

class MinQualificationNcsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualifications = [
            ['name' => 'Upto 9th', 'EducationGroup' => 1, 'EducationLevel' => 2],
            ['name' => '10th', 'EducationGroup' => 2, 'EducationLevel' => 3],
            ['name' => '11th', 'EducationGroup' => 2, 'EducationLevel' => 4],
            ['name' => '12th', 'EducationGroup' => 2, 'EducationLevel' => 5],
            ['name' => 'Diploma After 10th', 'EducationGroup' => 2, 'EducationLevel' => 6],
            ['name' => 'Diploma After 12th', 'EducationGroup' => 2, 'EducationLevel' => 7],
            ['name' => 'Graduate', 'EducationGroup' => 2, 'EducationLevel' => 8],
            ['name' => 'Post Graduate', 'EducationGroup' => 2, 'EducationLevel' => 10],
            ['name' => 'Phd', 'EducationGroup' => 2, 'EducationLevel' => 11],
            ['name' => 'No Schooling', 'EducationGroup' => 0, 'EducationLevel' => 0],
            ['name' => 'ITI', 'EducationGroup' => 2, 'EducationLevel' => 6],
            ['name' => 'PG Diploma', 'EducationGroup' => 2, 'EducationLevel' => 9],
            ['name' => 'Upto 8th', 'EducationGroup' => 1, 'EducationLevel' => 1],
        ];

        foreach ($qualifications as $qualification) {
            MinQualificationNcs::create($qualification);
        }
    }
}
