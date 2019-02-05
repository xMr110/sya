<?php

use Illuminate\Database\Seeder;

class JoinusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Joinus::class, 2)->create()->each(function ($p){
            factory(\App\Models\JoinusTranslation::class,1)->create([
                'joinus_id' => $p->id
            ]);
        });
    }
}
