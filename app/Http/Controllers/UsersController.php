<?php

namespace App\Http\Controllers;

use App\Jobs\CreateUserJob;
use App\Models\User;
use Illuminate\Cache\CacheManager;
use Illuminate\Log\LogManager;
use Illuminate\Queue\QueueManager;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    public function index(CacheManager $cacheManager): JsonResponse
    {
        $users = $cacheManager->remember('users', 10, function () {
            return User::query()->get();
        });

        return new JsonResponse([
            'users' => $users,
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
