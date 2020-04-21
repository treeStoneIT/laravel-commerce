<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productArray = [
            [
                'category_id' => 1,
                'name'        => 'Regular Ground Beef',
                'sku'         => '102',
                'description' => 'Regular is no more than 30% fat – save this for when you want to be really indulgent. Perfect for dishes where you can brown the meat first before draining off excess fat, like meat sauce or tacos.',
                'price'       => '4.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/pitrs/pitrs1203/pitrs120300157/12854011-close-up-raw-ground-beef.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Lean Ground Beef',
                'sku'         => '103',
                'description' => 'Lean is no more than 17% fat – you can do virtually anything with this type. Use it as a healthier option to make your favorite dishes. It is a healthier option than regular, but still super tasty.',
                'price'       => '6.99',
                'unit_id'     => 1,
                'image_url'   => 'https://www.picserver.org/pictures/ground-beef01-lg.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Beef Stew',
                'sku'         => '104',
                'description' => 'What could be more satisfying than a big bowl of hearty stew?',
                'price'       => '6.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/tobi/tobi1711/tobi171100019/89258840-close-up-of-diced-raw-beef-meat-with-parsley.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Fresh Beef Burger',
                'sku'         => '107',
                'description' => 'Lean beef burgers moist and juicy.',
                'price'       => '11.99',
                'unit_id'     => 2,
                'image_url'   => 'https://previews.123rf.com/images/tycoon751/tycoon7511712/tycoon751171200482/92094197-raw-cutlets-for-burger-with-salt-and-aroma-spice.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Stuffed Roast Beef',
                'sku'         => '120',
                'description' => 'Serve up a spectacular centrepiece of roast beef with a rich vegetable stuffing.',
                'price'       => '9.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/dar1930/dar19302001/dar1930200100564/138833933-raw-beef-roulades-prepared-for-cooking.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Beef Philly Steak (Uncooked)',
                'sku'         => '121',
                'description' => 'Steak that has been sliced for making stir-fry, which takes a little less time, but achieves the same results.',
                'price'       => '9.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/kesu87/kesu871207/kesu87120700217/14563475-grilled-beef-steak.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Beef Shawarma (Uncooked)',
                'sku'         => '123',
                'description' => 'A delight for all the senses!',
                'price'       => '9.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/batuhantoker/batuhantoker1712/batuhantoker171200189/92762002-bbq-meat-and-chicken-for-turkish-doner-kebab-in-a-restaurant-in-istanbul-asian-street-food.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Beef Sausage Makanek',
                'sku'         => '129',
                'description' => 'Tiny sausages that are redolent of lots of spices to our butcher’s discretion.',
                'price'       => '6.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/kostrez/kostrez1408/kostrez140800026/30728956-pork-sausages-with-rosemary-isolated-on-white-background.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Breaded Beef Escalope',
                'sku'         => '130',
                'description' => 'Our all-time favorite meat item!',
                'price'       => '9.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/katyjay/katyjay1711/katyjay171100009/90394637-schnitzel.jpg'
            ],
            [
                'category_id' => 1,
                'name'        => 'Beef Inside Round',
                'sku'         => '133',
                'description' => 'Works well for a weeknight schedule. Cook to medium in less than an hour. Also, it\'s the summer barbecue option for roast beef.',
                'price'       => '7.99',
                'unit_id'     => 1,
                'image_url'   => 'https://c1.wallpaperflare.com/preview/425/376/4/beef-carving-ox-raw.jpg'
            ],

            [
                'category_id' => 2,
                'name'        => 'Boneless Veal',
                'sku'         => '220',
                'description' => 'A tender cut that cooks to perfection in less than an hour. It requires little to no prep time and has only a thin layer of fat, easy to carve and make into an elegant main course.',
                'price'       => '9.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/chassenet/chassenet1903/chassenet190300091/119381084-raw-veal-in-pieces-for-beef-stew-bourguignon.jpg'
            ],
            [
                'category_id' => 2,
                'name'        => 'Veal Shoulder',
                'sku'         => '242',
                'description' => 'Veal shoulder becomes melting tender when braised.',
                'price'       => '6.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/funandrejss/funandrejss1606/funandrejss160600246/60415172-fresh-raw-pork-shoulder-on-scrumbled-paper-.jpg'
            ],
            [
                'category_id' => 2,
                'name'        => 'Veal Chops',
                'sku'         => '257',
                'description' => 'A quick, delicious entree that is sure to impress any guest, and so easy to throw together.',
                'price'       => '7.99',
                'unit_id'     => 1,
                'image_url'   => 'https://previews.123rf.com/images/cynoclub/cynoclub1511/cynoclub151100115/48155267-veal-meat-chop-in-front-of-white-background.jpg'
            ],
        ];

        foreach ($productArray as $product){
            $image_url = $product['image_url'];
            unset($product['image_url']);
            $productModel = \App\Product::create($product);

            $productModel
                ->addMediaFromUrl($image_url)->preservingOriginal()
                ->toMediaCollection('product-featured');
        }
    }
}
