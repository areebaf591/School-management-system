<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getTrashedUsers();
    public function restoreUser($id);
    public function forceDeleteUser($id);
}
