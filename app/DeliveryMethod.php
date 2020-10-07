<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\DeliveryMethod
 *
 * @property int $id
 * @property string|null $label
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereLabel($value)
 * @mixin \Eloquent
 */
class DeliveryMethod extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        ['id' => 1, 'label' => 'pickup'],
        ['id' => 2, 'label' => 'delivery'],
    ];
}
