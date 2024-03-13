<?php

declare(strict_types=1);

namespace Modules\Address\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'house_number',
        'city',
        'postcode',
        'country',
    ];
}
