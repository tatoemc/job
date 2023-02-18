<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Job = [
           
            ['name' => 'مهندس معماري','desc'=>'خريج بكالريوس خبرة 5 سنة'],
            ['name' => 'مهندس حاسوب','desc'=>'خريج ماجستير خبرة 3 سنة'],
            ['name' => 'محامي','desc'=>'زمالة سودانية خبرة 2 سنة'],
            ['name' => 'محاضر','desc'=>'خريج ماجستير خبرة 4 سنة'],
           
        ];
            foreach ($Job as $key => $value) {

                Job::create($value);
    
            }
    }
}
