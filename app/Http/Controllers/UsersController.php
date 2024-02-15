<?php

namespace App\Http\Controllers;

use App\Jobs\CreateUserJob;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Cache\CacheManager;
use Illuminate\Queue\QueueManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(CacheManager $cacheManager): JsonResponse
    {
        try {
            $this->authorize('isInUserGroup', UserGroup::query()->where('name', 'admin')->first());
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 403);
        }

        $users = $cacheManager->remember('users', 10, function () {
            return User::query()->get();
        });

        return new JsonResponse([
            'users' => $users,
        ]);
    }

    public function show(Request $request): JsonResponse
    {
        return new JsonResponse([
            'user' => $request->user(),
        ]);
    }

    public function create(QueueManager $queueManager): JsonResponse
    {
        $queueManager->push(new CreateUserJob());

        return new JsonResponse([
            'message' => 'User created',
        ]);
    }
}
