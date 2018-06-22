<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StartUpAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_id = DB::table('users')->insertGetId([
        'username' => 'manager',
        'password' => bcrypt('manager'),
        'email' => 'manager@manager.com',
        'name' => 'manager',
        'navbar_auth' => '1',
        'role' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('users_authorization')->insert([
        'user_id' => $user_id,
        'dashboard' => 'F',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
