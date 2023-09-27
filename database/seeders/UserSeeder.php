<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'System Admin';
        $user1->email = 'admin@email.com';
        $user1->password = Hash::make('malik005');
        $user1->email_verified_at = now();
        $user1->save();
    }
}
