<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomSeeder extends Seeder
{
    public function run()
    {
        Classroom::create(['name' => 'Class 1']);
        Classroom::create(['name' => 'Class 2']);
        Classroom::create(['name' => 'Class 3']);
         Classroom::create(['name' => 'Class 4']);
          Classroom::create(['name' => 'Class 5']);
           Classroom::create(['name' => 'Class 6']);
            Classroom::create(['name' => 'Class 7']);
             Classroom::create(['name' => 'Class 8']);
              Classroom::create(['name' => 'Class 9']);
               Classroom::create(['name' => 'Class 10']);
                
                
    }
}
