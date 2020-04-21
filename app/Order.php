<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $purchase_date
 * @property int $order_status_id
 * @property int $delivery_method_id
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property string $address
 * @property string|null $note
 * @property string|null $admin_note
 * @property mixed $products
 * @property float $subtotal
 * @property float $tax
 * @property float $total
 * @property string|null $paid_date
 * @property string|null $paid_detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderItem[] $OrderItems
 * @property-read int|null $order_items_count
 * @property-read \App\DeliveryMethod $deliveryMethod
 * @property-read \App\OrderStatus $orderStatus
 * @property-read \App\User $submittedByUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAdminNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeliveryMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePaidDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePaidDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $guarded = ['id'];

    /**
     * The user that owns the order.
     */
    public function submittedByUser()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order status.
     */
    public function orderStatus()
    {
        return $this->belongsTo(Orderstatus::class);
    }

    /**
     * Get the order status.
     */
    public function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class);
    }

    /**
     * The lineItems that belong to the order.
     */
    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
