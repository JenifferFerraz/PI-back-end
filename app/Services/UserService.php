<?php

namespace App\Services;

use App\Models\User;
use App\Interface\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function index()
    {
        return User::all();
    }

    public function store(array $data)
    {
        return User::create($data);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
