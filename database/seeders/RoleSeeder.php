<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //creacion de roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Instructor']);
        $role3 = Role::create(['name' => 'Aprendiz']);

        //creacion de los permisos

        $permission1 = Permission::create(['name' => 'CRUD Instructor']);
        $permission2 = Permission::create(['name' => 'CRUD Aprendiz']);
        $permission3 = Permission::create(['name' => 'CRUD Competencia']);
        $permission4 = Permission::create(['name' => 'Relacionar Ins, Apr y Com']);
        $permission5 = Permission::create(['name' => 'CRUD Notas']);
        $permission6 = Permission::create(['name' => 'CRUD Asistencia']);
        $permission7 = Permission::create(['name' => 'Read Asistencias']);
        $permission8 = Permission::create(['name' => 'Read competencias']);
        $permission9 = Permission::create(['name' => 'Read notas']);

        //asignacion de permisos a los roles

        $role1->givePermissionTo([$permission1,$permission2,$permission3,$permission4]);
        $role2->givePermissionTo([$permission5,$permission6]);
        $role3->givePermissionTo([$permission7,$permission8,$permission9]);

        //asignacion del admin al usuario 1
        $user = User::findOrNew(1);
        $user->assignRole($role1);
    }
}
