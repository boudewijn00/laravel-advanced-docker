<?php

declare(strict_types=1);

namespace Modules\Brand\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Brand\Models\Brand;

class BrandsController
{

    public function index(int $suppliersId)
    {

    }

    public function create(Brand $brand, Request $request): JsonResponse
    {
        $model = $brand->createBrand(
            $request->get('name'),
            $request->get('supplier_id')
        );

        return response()->json([
            'brand' => $model,
        ]);
    }

}
