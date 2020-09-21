<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'settings-list','settings-update',
            'roles-list','roles-create','roles-edit','roles-delete',
            'users-list','users-create','users-edit','users-delete','company-users-list','all-users-list','vendor-users-list',
            'admins-list','admins-create','admins-edit','admins-delete','admins-multi-delete',
            'countries-list','countries-create','countries-edit','countries-delete','countries-multi-delete',
            'cities-list','cities-create','cities-edit','cities-delete','cities-multi-delete',
            'states-list','states-create','states-edit','states-delete','states-multi-delete',
            'categories-list','categories-create','categories-edit','categories-delete',
            'tradmarks-list','tradmarks-create','tradmarks-edit','tradmarks-delete',
            'manufacthrers-list','manufacthrers-create','manufacthrers-edit','manufacthrers-delete',
            'shippings-list','shippings-create','shippings-edit','shippings-delete',
            'malls-list','malls-create','malls-edit','malls-delete',
            'colors-list','colors-create','colors-edit','colors-delete',
            'sizes-list','sizes-create','sizes-edit','sizes-delete',
            'products-list','products-create','products-edit','products-delete',
            'weights-list','weights-create','weights-edit','weights-delete',
            'carts-list','carts-create','carts-edit','carts-delete',
            'about-list',
            'search','pdf','excel',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['guard_name' => 'admin','name' => $permission]);
        }
    }
}
