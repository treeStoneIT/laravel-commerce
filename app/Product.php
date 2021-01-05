<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Treestoneit\ShoppingCart\Buyable;
use Treestoneit\ShoppingCart\BuyableTrait;

/**
 * App\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $sku
 * @property string|null $description
 * @property float|null $price
 * @property int $fixed_price
 * @property int $taxable
 * @property int $sort
 * @property int|null $unit_id
 * @property mixed|null $options
 * @property mixed|null $variants
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFixedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTaxable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVariants($value)
 * @mixin \Eloquent
 */
class Product extends Model implements Buyable, HasMedia
{
    use BuyableTrait;
    use InteractsWithMedia;

    protected $guarded = ['id'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product-featured');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
             ->width(500)
             ->height(500)
             ->performOnCollections('product-featured');

        $this->addMediaConversion('1000')
             ->width(1000)
             ->height(1000)
             ->performOnCollections('product-featured');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * An array of options (color, size, etc.) for this buyable item.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return array_merge(['product_note' => '*'], $this->options ?? []);
    }

    /**
     * Get the price of the Buyable item.
     *
     * @param null $options
     *
     * @return float|null
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @param null $options
     *
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }
}
