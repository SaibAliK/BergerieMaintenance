<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if (User::where('role','admin')->count() == 0) {
    		User::create([
    			'name' => 'Admin',
    			'email' => 'admin@bergerie.com',
    			'email_verified_at' => '2021-02-16 17:00:00',
    			'password' => bcrypt('12345678'),
    			'role' => 'admin',
    		]);
    	}
        User::create([
            'name' => 'Internal Maintainer',
            'email' => 'internal@bergerie.com',
            'email_verified_at' => '2021-02-16 17:00:00',
            'password' => bcrypt('12345678'),
            'role' => 'internal',
        ]);

        User::create([
            'name' => 'External Maintainer',
            'email' => 'external@bergerie.com',
            'email_verified_at' => '2021-02-16 17:00:00',
            'password' => bcrypt('12345678'),
            'role' => 'external',
        ]);
    }
}
