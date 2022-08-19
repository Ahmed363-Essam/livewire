<?php

use Illuminate\Database\Seeder;

use App\Model\category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        category::create([
            'title'=>'electonic',
            'description'=>'The field of electronics is a branch of physics and electrical engineering that deals with the emission, behaviour and effects of electrons using electronic'
        ]);


        


    }
}
