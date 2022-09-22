<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use App\Models\City;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->forceDelete();

        $admin= User::create( [
            'first_name' => 'super admin',
            'email' => 'admin@admin.com',
            // 'phone' => '01000011000',
            'password' => Hash::make('12345678'),
            // 'token' => Hash::make('123456'),
            // 'birthdate' => '2022-02-14 15:30:36',
            // 'city_id' =>  City::first() ? City::first()->id : null,
        ]);
        // $admin->assignRole('admin');

    }
}
