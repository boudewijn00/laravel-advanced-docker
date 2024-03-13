<?php

declare(strict_types=1);

namespace Modules\Brand\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BrandQueryBuilder extends Builder
{
    public function getBrand(int $id): array|Collection
    {
        return $this->get()->where('id', $id);
    }

    public function getBrands(): array|Collection
    {
        return $this->get();
    }

    public function createBrand(string $name, int $supplier_id): Model
    {
        return $this->create([
            'name' => $name,
            'supplier_id' => $supplier_id
        ]);
    }

    public function updateBrand(int $id, string $name): int
    {
        return $this->where('id', $id)->update([
            'name' => $name
        ]);
    }

    public function deleteBrand(int $id): bool
    {
        return $this->where('id', $id)->delete();
    }
}
