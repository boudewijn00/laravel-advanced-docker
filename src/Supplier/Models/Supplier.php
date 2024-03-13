<?php

declare(strict_types=1);

namespace Modules\Supplier\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Address\Model\Address;
use Modules\Supplier\QueryBuilders\SupplierQueryBuilder;

/**
 * @mixin SupplierQueryBuilder
 */
class Supplier extends Model
{
    protected $fillable = [
        'name',
    ];

    public function newEloquentBuilder($query): SupplierQueryBuilder
    {
        return new SupplierQueryBuilder($query);
    }

    public function users(): MorphMany
    {
        return $this->morphMany(User::class, 'userable');
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
