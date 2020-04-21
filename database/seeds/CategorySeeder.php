<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = [
            'Beef'    => 'https://previews.123rf.com/images/sergeypykhonin/sergeypykhonin1605/sergeypykhonin160500012/56433417-beef-cuts-template-menu-design-for-restaurant-or-cafe.jpg',
            'Veal'    => 'https://previews.123rf.com/images/oraziopuccio/oraziopuccio2003/oraziopuccio200300026/143022877-red-meat-veal-muscle.jpg',
            'Lamb'    => 'https://previews.123rf.com/images/sergeypykhonin/sergeypykhonin1905/sergeypykhonin190500014/122842726-cuts-of-meat-lamb-.jpg',
            'Poultry' => 'https://previews.123rf.com/images/simplyvector/simplyvector1802/simplyvector180200014/95816236-chicken-cuts-diagram-facing-right-chicken-meat-part-cuts-diagram-for-butcher-shop-vector-illustratio.jpg',
        ];

        foreach ($categoryNames as $categoryName => $img_url) {
            $catModel =  Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
            ]);

            $catModel
                ->addMediaFromUrl($img_url)->preservingOriginal()
                ->toMediaCollection('category-featured');
        }
    }
}
