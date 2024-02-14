<?php

namespace App\Http\Controllers;

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

    public function create(QueueManager $queueManager, LogManager $logManager): JsonResponse
    {
        $logManager->channel('single')->warning('User created');
        $queueManager->push(new \App\Jobs\CreateUserJob());

        return new JsonResponse([
            'message' => 'User created',
        ]);
    }
}
