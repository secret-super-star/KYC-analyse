<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'category_id' => 1,
            'name' => 'Top',
        ]);
        Tag::create([
            'category_id' => 1,
            'name' => 'Tire 1',
        ]);
        Tag::create([
            'category_id' => 1,
            'name' => 'Tire 2',
        ]);
        Tag::create([
            'category_id' => 1,
            'name' => 'Tire 3',
        ]);
        Tag::create([
            'category_id' => 1,
            'name' => 'Tire 4',
        ]);
        Tag::create([
            'category_id' => 1,
            'name' => 'Tire 5',
        ]);
        Tag::create([
            'category_id' => 2,
            'name' => 'Black listed',
        ]);
        Tag::create([
            'category_id' => 2,
            'name' => 'High risk',
        ]);
        Tag::create([
            'category_id' => 2,
            'name' => 'Middle risk',
        ]);
        Tag::create([
            'category_id' => 2,
            'name' => 'Low risk',
        ]);
    }
}
