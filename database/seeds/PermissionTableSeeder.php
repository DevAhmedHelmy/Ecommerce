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
            'role-list','role-create','role-edit','role-delete',
            'user-list','user-create','user-edit','user-delete','company-users-list','all-users-list','vendor-users-list',
            'admin-list','admin-create','admin-edit','admin-delete','admin-multi-delete',
            'countries-list','countries-create','countries-edit','countries-delete','countries-multi-delete',
            'cities-list','cities-create','cities-edit','cities-delete','cities-multi-delete',
            'states-list','states-create','states-edit','states-delete','states-multi-delete',
            'categories-list','categories-create','categories-edit','categories-delete',
            'tradmarks-list','tradmarks-create','tradmarks-edit','tradmarks-delete',
            'manufacthrers-list','manufacthrers-create','manufacthrers-edit','manufacthrers-delete',
            'shippings-list','shippings-create','shippings-edit','shippings-delete',
            'product-list','product-create','product-edit','product-delete',
            'client-list','client-create','client-edit','client-delete',

            'search','pdf','excel',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['guard_name' => 'admin','name' => $permission]);
        }
    }
}
