<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('user_roles')->count() === 0) {
            DB::table('user_roles')
                ->insert([
                    ['label' => 'Admin'],
                    ['label' => 'Publisher'],
                    ['label' => 'Public User'],
                ]);
        }
    }
}
