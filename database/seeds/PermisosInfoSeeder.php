<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permisos\Models\Roles;
use App\Permisos\Models\Permisos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermisosInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles_user')->truncate();
        DB::table('permisos_roles')->truncate();
        Permisos::truncate();
        Roles::truncate();
        

        //user admin
        $superadmin=User::where('email','admin@admin.com')->first();
        if($superadmin){
            $superadmin->delete();
        }
        $superadmin=User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);
        
        //roladmin
        $roladmin=Roles::create([
            'nombre'=>'Admin',
            'slug'=>'admin',
            'descripcion'=>'Administrador',
            'acceso-ilimitado'=>'yes'
        ]);

        //tabla roles_user
        $superadmin->roles()->sync([$roladmin->id]);
        
        //permisos
        $permisos_all=[];
        

        //permisos roles
        $permisos=Permisos::create([
            'nombre'=>'List roles',
            'slug'=>'roles.index',
            'descripcion'=>'A user can list roles'
        ]);

        $permisos_all[]=$permisos->id;

        $permisos=Permisos::create([
            'nombre'=>'Show roles',
            'slug'=>'roles.show',
            'descripcion'=>'A user can see roles'
        ]);

        $permisos_all[]=$permisos->id;

        $permisos=Permisos::create([
            'nombre'=>'Create roles',
            'slug'=>'roles.create',
            'descripcion'=>'A user can create roles'
        ]);

        $permisos_all[]=$permisos->id;

        $permisos=Permisos::create([
            'nombre'=>'Edit roles',
            'slug'=>'roles.edit',
            'descripcion'=>'A user can edit roles'
        ]);

        $permisos_all[]=$permisos->id;

        $permisos=Permisos::create([
            'nombre'=>'Destroy roles',
            'slug'=>'roles.destroy',
            'descripcion'=>'A user can destroy roles'
        ]);

        $permisos_all[]=$permisos->id;


        //permisos user
        $permisos=Permisos::create([
            'nombre'=>'List user',
            'slug'=>'user.index',
            'descripcion'=>'A user can list user'
        ]);

        $permisos_all[]=$permisos->id;

        $permisos=Permisos::create([
            'nombre'=>'Show user',
            'slug'=>'user.show',
            'descripcion'=>'A user can see user'
        ]);

        $permisos_all[]=$permisos->id;

        $permisos=Permisos::create([
            'nombre'=>'Edit user',
            'slug'=>'user.edit',
            'descripcion'=>'A user can edit user'
        ]);

        $permisos_all[]=$permisos->id;

        $permisos=Permisos::create([
            'nombre'=>'Destroy user',
            'slug'=>'user.destroy',
            'descripcion'=>'A user can destroy user'
        ]);

        $permisos_all[]=$permisos->id;

        /*$permisos=Permisos::create([
            'nombre'=>'Create roles',
            'slug'=>'roles.create',
            'descripcion'=>'A user can create roles'
        ]);

        $permisos_all[]=$permisos->id;
        */

        //tabla permisos_roles
        $roladmin->permisos()->sync($permisos_all);
    }
}
