<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() === 0) {
            DB::table('users')
                ->insert([
                    [
                        'user_roles_id' => DB::table('user_roles')->where('label', 'Admin')->value('id'),
                        'username' => 'I_Admin',
                        'email' => 'admin@test.com',
                        'created_at' => '2017-05-20 12:42:53',
                        'updated_at' => '2017-05-20 12:42:53'
                    ],
                    [
                        'user_roles_id' => DB::table('user_roles')->where('label', 'Publisher')->value('id'),
                        'username' => 'I_Publish',
                        'email' => 'publisher@test.com',
                        'created_at' => '2017-05-20 13:05:53',
                        'updated_at' => '2017-05-22 15:08:53'
                    ],
                    [
                        'user_roles_id' => DB::table('user_roles')->where('label', 'Public User')->value('id'),
                        'username' => 'I_Use',
                        'email' => 'user@test.com',
                        'created_at' => '2017-05-21 13:05:53',
                        'updated_at' => '2017-05-21 13:05:53'
                    ],
                    [
                        'user_roles_id' => DB::table('user_roles')->where('label', 'Public User')->value('id'),
                        'username' => 'I_Use_Too',
                        'email' => 'user2@test.com',
                        'created_at' => '2017-05-22 14:05:53',
                        'updated_at' => '2017-05-22 14:05:53'
                    ],
                ]);
        }
    }
}
