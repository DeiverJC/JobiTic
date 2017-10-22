<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'company_user';
        $role->description = 'Company user';
        $role->save();

        $role = new Role();
        $role->name = 'candidate_user';
        $role->description = 'Candidate user';
        $role->save();

    }
}
