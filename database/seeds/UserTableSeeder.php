<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_candidate_user = Role::where('name', 'candidate_user')->first();
        $role_company_user = Role::where('name', 'company_user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Candidate_user';
        $user->email = 'candidate-user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_candidate_user);

        $user = new User();
        $user->name = 'Company_user';
        $user->email = 'company-user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_company_user);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
