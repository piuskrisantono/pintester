<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'anime'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'nature'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'painting'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'people'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'work'
        ]);
    }
}
