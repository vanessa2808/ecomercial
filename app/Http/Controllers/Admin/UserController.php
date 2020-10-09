<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user_list = $this->userRepository->getUsers();

        return view('admin.users.index', compact(['user_list']));

    }

    public function create()
    {
        $user = $this->userRepository->getUsers();

        return view('admin.users.add', compact(['user']));

    }

    public function store(RegisterRequest $request)
    {
        if ($this->userRepository->createUser($request->only('user_name', 'role_id','phone', 'address', 'password')))
        {

            return redirect()->route('users.index')->with('Success', trans('messages.users.success'));

        } else {

            return redirect()->route('users.index')->with('Fail', trans('messages.users.fail'));
        }
    }

    public function show($id)
    {
        $user = $this->userRepository->findUsers($id);

        if(!($user))
        {

            return redirect()->back();

        }

        return view('admin.users.detail', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = $this->userRepository->findUsers($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(RegisterRequest $request, $id)
    {
        $update = $this->userRepository->updateUser($id, $request->all());
        if ($update)
        {

            return redirect()->route('users.index')->with('Success', trans('messages.users.success'));

        } else {

            return redirect()->route('users.edit')->with('Fail', trans('messages.users.fail'));
        }
    }

    public function destroy($id)
    {
        $deleteResult = $this->userRepository->deleteUser($id);
        if ($deleteResult)
        {
            return redirect()->route('users.index')->with('Success', trans('messages.users.success'));

        } else {

            return redirect()->back()->with('Fail', trans('messages.users.fail'));
        }
    }

}
