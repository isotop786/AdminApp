<?php

use App\Role;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       $this->call(RoleSeeder::class);
       $this->call(UserTableSeed::class);
       $this->call(ProductSeeder::class);
    }
}
