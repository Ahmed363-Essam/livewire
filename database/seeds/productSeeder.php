<?php

use Illuminate\Database\Seeder;

use App\Model\product;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $products = 
        [
            [
                'title'=>'title3',
                'body'=>'title3title3title3title3title3',
                'image'=>'3.jpg',
                
                'cat_id'=>1,
                'user_id'=>1
            ],
            [
                'title'=>'title4',
                'body'=>'title4title4title4title4title4',
                'image'=>'4.jpg',
                'cat_id'=>1,
                'user_id'=>1
            ],
        ];

        foreach($products as $product)
        {
            product::create($product);
        }

    }
}
