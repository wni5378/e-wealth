<?php

namespace App\Http\Controllers;

use App\Models\Api\UserProfile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class UserProfileController extends Controller
{
    /**
     * @return Middleware[]
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

    /**
     * List all users.
     * @return Collection
     */
    public function index(): Collection
    {
        return UserProfile::all();
    }

    /**
     * Create a new user.
     * @param Request $request
     * @return UserProfile
     */
    public function store(Request $request): UserProfile
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);

        return UserProfile::create($fields);
    }

    /**
     * Show a specified user.
     * @param int $id
     * @return UserProfile
     */
    public function show(int $id): UserProfile
    {
        return UserProfile::where('id', $id)->first();
    }

    /**
     * Update the specified user.
     * @param Request $request
     * @param int $id
     * @return UserProfile
     */
    public function update(Request $request, int $id): UserProfile
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'required'
        ]);

        $userProfile = UserProfile::where('id', $id)->first();
        $userProfile->update($fields);

        return $userProfile;
    }

    /**
     * Delete the specified user.
     */
    public function destroy(int $id): JsonResponse
    {
        UserProfile::destroy($id);

        return response()->json([
            'message' => 'User profile deleted successfully.'
        ]);
    }
}
