<?php

namespace App\Repositories\Contracts\Admin;

use App\Models\Admin;

interface AdminRepositoryInterface
{
    public function getAll();
	public function get(Admin $admin);
	public function delete(Admin $admin);
    public function update(Admin $admin);
    public function multiDelete();
}