<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
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
        $this->actingAs($this->admin,'admin');
        $this->get(route('admin.users.index'))
            ->assertStatus(200);
    }
    /**
     * @test
    */
    public function logged_in_admin_can_add_user()
    {

        $this->actingAs($this->admin,'admin');
        $this->post(route('admin.users.store'),
            [
                'name' => 'ahmed helmy',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'level' => 'user',
                'password' => bcrypt('123456789'),
                'remember_token' => Str::random(10),
            ]);
            $this->assertDatabaseHas('users',[
                'name' => 'ahmed helmy',
                'email' => 'admin@admin.com',
            ]);
    }
    /**
     * @test
    */
    public function logged_in_admin_can_show_user()
    {
        $user = factory(User::class)->create();
        $this->actingAs($this->admin,'admin')
            ->get(route('admin.users.show',$user->id))
            ->assertSee($user->name);
    }
    /**
     * @test
    */
    public function logged_in_admin_can_show_edit_user_page()
    {
        $user = factory(User::class)->create();
        $this->actingAs($this->admin,'admin')
            ->get(route('admin.users.edit',$user->id))
            ->assertStatus(200);
    }
    /**
     * @test
    */
    public function logged_in_admin_can_update_user()
    {
        $user = factory(User::class)->create();
        $this->actingAs($this->admin,'admin')
            ->put(route('admin.users.update',$user->id),[
                'name' => 'he7my',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'level' => 'user',
                'password' => bcrypt('123456789'),
                'remember_token' => Str::random(10),
            ])
            ->assertStatus(302);
        $this->assertTrue($user->fresh()->name == 'he7my');
    }
    /**
     * @test
    */
    public function logged_in_admin_can_delete_user()
    {
        $user = factory(User::class)->create();
        $this->actingAs($this->admin,'admin')
            ->delete(route('admin.users.destroy',$user->id));
        $this->assertDatabaseCount('users',0);
    }
}
