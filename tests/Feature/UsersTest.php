<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    public function setUp(): void
    {
        parent::setUp();

        $this->setupPermissions();

        $this->admin = factory(\App\Models\Admin::class)->create();
        $this->admin->assignRole('superadmin');


    }
    protected function setupPermissions()
    {
        $permissions=['create users','show user', 'edit users', 'delete user'];
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

    public function logged_in_admin_can_see_user_page()
    {
        // dd($this->admin);
        $this->withoutExceptionHandling();
        $this->actingAs($this->admin,'admin');
        $this->get(route('admin.users.index'))
            ->assertStatus(200);
    }
}
