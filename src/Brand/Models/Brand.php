<?php

declare(strict_types=1);

namespace Modules\Brand\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Brand\QueryBuilders\BrandQueryBuilder;
use Modules\Supplier\Models\Supplier;

/**
 * @mixin BrandQueryBuilder
 */
class Brand extends Model
{
    protected $fillable = [
        'name',
        'supplier_id'
    ];

    public function newEloquentBuilder($query): BrandQueryBuilder
    {
        return new BrandQueryBuilder($query);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
