<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $qty
 * @property float $price
 * @property string $product_note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Product $RelatedProduct
 * @property-read \App\Order $parentOrder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem whereProductNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderItem extends Model
{
    protected $guarded = ['id'];

    /**
     * The users that belong to the role.
     */
    public function parentOrder()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product associated with the Line Item.
     */
    public function RelatedProduct()
    {
        return $this->belongsTo(Product::class);
    }
}
