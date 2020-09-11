<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function getUsers()
    {

        return $this->model->paginate(Config::get('app.paginate'));

    }

    public function createUser(array $data)
    {
        $user = $this->model->create([
            'user_name' => $data['user_name'],
            'role_id' => $data['role_id'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => $data['password'],
        ]);
    }

    public function findUsers($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            return $result;
        }

        return false;
    }

    public function updateUser($id, array $data)
    {
        try {
            $user = $this->model->find($id);
            $user->user_name = $data['user_name'];
            $user->role_id = $data['role_id'];
            $user->phone = $data['phone'];
            $user->email = $data['email'];
            $user->address = $data['address'];
            $user->password = $data['password'];
            $user->save();
        } catch (Exception $exception) {

            return false;
        }
        return true;
    }


    public function deleteUser($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

}
