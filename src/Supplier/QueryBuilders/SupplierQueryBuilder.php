<?php

declare(strict_types=1);

namespace Modules\Supplier\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class SupplierQueryBuilder extends Builder
{
    public function getSupplier(int $id): array|Collection
    {
        return $this->get()->where('id', $id);
    }

    public function getSuppliers(): array|Collection
    {
        return $this->get();
    }

    public function createSupplier(string $name): Model
    {
        return $this->create([
            'name' => $name
        ]);
    }

    public function updateSupplier(int $id, string $name): int
    {
        return $this->where('id', $id)->update([
            'name' => $name
        ]);
    }

    public function deleteSupplier(int $id): bool
    {
        return $this->where('id', $id)->delete();
    }
}
