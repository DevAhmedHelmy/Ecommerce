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
use Illuminate\Http\UploadedFile;
class UsersTest extends TestCase
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
        $permissions=['users-create','users-list', 'users-edit', 'users-delete'];
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
        $this->withoutExceptionHandling();
         
        $data = [
            'name' => 'ahmed helmy',
            'image' => UploadedFile::fake()->image('file.png', 600, 600), 
            'email' => 'ahmed@admin.com',
            'email_verified_at' => null,
            'level' => 'user',
            'password' => bcrypt('123456789'),
            'remember_token' => Str::random(10),
        ];
        
        $response =  $this->actingAs($this->admin,'admin')
                          ->post(route('admin.users.store'), $data);
         
            $this->assertDatabaseHas('users',['email' => 'ahmed@admin.com']);
    }
    /**
     * @test
    */
    public function logged_in_admin_can_show_user()
    {
        $this->withoutExceptionHandling();
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
        $this->withoutExceptionHandling();
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
        $this->withoutExceptionHandling();
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
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($this->admin,'admin')
            ->delete(route('admin.users.destroy',$user->id));
        $this->assertDatabaseCount('users',0);
    }
}
