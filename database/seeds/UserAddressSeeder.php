<?php

use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('user_addresses')->count() === 0) {
            DB::table('user_addresses')
                ->insert([
                    [
                        'user_id' => DB::table('users')->where('username', 'I_Admin')->value('id'),
                        'address' => '123 fake street',
                        'province' => 'Ontario',
                        'city' => 'Ottawa',
                        'country' => 'Canada',
                        'postal_code' => '123 w4t',
                    ],
                    [
                        'user_id' => DB::table('users')->where('username', 'I_Publish')->value('id'),
                        'address' => '123 queen street',
                        'province' => 'Quebec',
                        'city' => 'Gatineau',
                        'country' => 'Canada',
                        'postal_code' => '123 tdf',
                    ],
                    [
                        'user_id' => DB::table('users')->where('username', 'I_Use')->value('id'),
                        'address' => '123 major road',
                        'province' => 'Ontariofdgdgdfg',
                        'city' => 'Ottawa',
                        'country' => 'Canada',
                        'postal_code' => '145 w4t',
                    ],
                    [
                        'user_id' => DB::table('users')->where('username', 'I_Use_Too')->value('id'),
                        'address' => '123 blue street',
                        'province' => 'Ontario',
                        'city' => 'Ottawa',
                        'country' => 'Canada',
                        'postal_code' => '145 lpo',
                    ],
                ]);
        }
    }
}
