<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Per deshabilitar momeentaneament les claus foranes
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        $this->call(PostsTableSeeder::class);

        //Per tornar a haabilitar les claus foranes
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
