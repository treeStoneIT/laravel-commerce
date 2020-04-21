<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\OrderStatus
 *
 * @property int $id
 * @property string|null $label
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus whereLabel($value)
 * @mixin \Eloquent
 */
class OrderStatus extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        ['id' => 1, 'label' => 'processing'],
        ['id' => 2, 'label' => 'verified'],
        ['id' => 3, 'label' => 'complete'],
        ['id' => 4, 'label' => 'canceled'],
    ];
}
