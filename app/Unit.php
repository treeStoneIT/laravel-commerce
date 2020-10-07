<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Unit
 *
 * @property int $id
 * @property string|null $label
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereLabel($value)
 * @mixin \Eloquent
 */
class Unit extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        ['id' => 1, 'label' => 'Lbs'],
        ['id' => 2, 'label' => 'Kgs'],
        ['id' => 3, 'label' => 'Each'],
        ['id' => 4, 'label' => 'Gram'],
        ['id' => 6, 'label' => '100 Gram'],
    ];
}
