<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'long.nguyen@motbit.com',
          'password' => bcrypt('123456$q'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
    }
}
