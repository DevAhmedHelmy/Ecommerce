<?php

namespace App\Repositories\Eloquent\Admin;

use App\Models\Admin;
use App\Repositories\Contracts\Admin\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAll()
    {
        $admins = Admin::paginate(20);
        return $admins;
    }
    public function get(Admin $admin)
    {

    }
    public function delete(Admin $admin)
    {

    }
    public function update(Admin $admin)
    {

    }
    public function multiDelete()
    {

    }
}