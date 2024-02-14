<?php

namespace App\Http\Controllers;

use App\Jobs\CreateUserJob;
use App\Models\User;
use Illuminate\Log\LogManager;
use Illuminate\Queue\QueueManager;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'users' => User::query()->get(),
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
