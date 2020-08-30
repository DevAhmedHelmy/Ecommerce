<?php

namespace Tests\Feature;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\PermissionRegistrar;
class PermissionTest extends TestCase
{
    use RefreshDatabase;
    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        \Artisan::call('db:seed', ['--class' => 'SettingSeeder']);
        $this->setupPermissions();
        $this->admin = factory(\App\Models\Admin::class)->create();
        $this->admin->assignRole('superadmin');


    }
    protected function setupPermissions()
    {
        $permissions=['roles-create','roles-list', 'roles-edit', 'roles-delete'];
        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'admin','name' => $permission]);
        }
        $role = Role::create(['guard_name' => 'admin', 'name' => 'superadmin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $this->app->make(PermissionRegistrar::class)->registerPermissions();
    }
    /**
     * @test
     */
    public function logged_in_admin_can_see_role_index_page()
    {
        $this->actingAs($this->admin,'admin'); 
        $this->get(route('admin.roles.index'))
            ->assertStatus(200);
    }

    /**
     * @test
    */
    public function logged_in_admin_can_see_role_create_page()
    {   
        $this->actingAs($this->admin,'admin'); 
        $this->get(route('admin.roles.create'))
            ->assertStatus(200);
    }
    /**
     * @test
    */
    public function logged_in_admin_can_add_role()
    {
        $this->withoutExceptionHandling();
         
        $data = [
            'name' => 'test role',
            'permission'=>[
                0 => '1',
                1 => '2'
            ],   
        ];
        $response =  $this->actingAs($this->admin,'admin')
                          ->post(route('admin.roles.store'), $data);
         
        $this->assertDatabaseHas('roles',['name' => 'test role']);
    }

   
}
