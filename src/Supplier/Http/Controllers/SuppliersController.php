<?php

declare(strict_types=1);

namespace Modules\Supplier\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Supplier\Http\Requests\SupplierRequest;
use Modules\Supplier\Models\Supplier;

class SuppliersController extends Controller
{
    public function index(Supplier $supplier): JsonResponse
    {
        return new JsonResponse([
            'suppliers' => $supplier->getSuppliers(),
        ]);
    }

    public function show(Supplier $supplier, int $id): JsonResponse
    {
        return new JsonResponse([
            'supplier' => $supplier->getSupplier($id),
        ]);
    }

    public function create(Supplier $supplier, SupplierRequest $request): JsonResponse
    {
        /** @var Supplier $model */
        $model = $supplier->createSupplier($request->get('name'));

        $model->users()->create([
            'name' => $request->get('user_name'),
            'email' => $request->get('user_email'),
            'password' => bcrypt($request->get('user_password')),
        ]);

        $model->addresses()->create([
            'street' => $request->get('street'),
            'house_number' => $request->get('house_number'),
            'city' => $request->get('city'),
            'postcode' => $request->get('postcode'),
            'country' => $request->get('country'),
        ]);

        return new JsonResponse([
            'supplier' => $model,
        ]);
    }

    public function update(Supplier $supplier, int $id): JsonResponse
    {
        return new JsonResponse([
            'supplier' => $supplier->updateSupplier($id, request()->get('name')),
        ]);
    }

    public function delete(Supplier $supplier, int $id): JsonResponse
    {
        return new JsonResponse([
            'supplier' => $supplier->deleteSupplier($id),
        ]);
    }
}
