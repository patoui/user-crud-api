<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * List all users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|string|exists:user_roles,label',
            'username' => 'required|string',
            'email' => 'required|email',
        ]);

        // Fetch username and email from request
        $data = $request->only(['username', 'email']);

        // Find role label id
        $data['user_roles_id'] = Role::where('label', $request->input('role'))->value('id');

        // Create user
        $user = User::create($data);

        return response()->json($user, 201);
    }

    /**
     * Show a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::whereKey($id)->firstOrFail();
    }

    /**
     * Update a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required|string|exists:user_roles,label',
            'username' => 'required|string',
            'email' => 'required|email',
        ]);

        $user = User::whereKey($id)->firstOrFail();

        // Fetch username and email from request
        $data = $request->only(['username', 'email']);

        // Find role label id
        $roleId = Role::where('label', $request->input('role'))->value('id');

        if ($user->user_roles_id !== $roleId) {
            $data['user_roles_id'] = $roleId;
        }

        $user->fill($data);
        $user->save();

        return $user;
    }

    /**
     * Delete a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::whereKey($id)->firstOrFail();

        $user->delete();

        return [];
    }
}
