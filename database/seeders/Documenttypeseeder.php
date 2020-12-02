<?php

namespace Database\Seeders;

use App\Models\Documenttype;
use Illuminate\Database\Seeder;

class Documenttypeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documenttype::create([
            'name' => 'ID card'
        ]);
        Documenttype::create([
            'name' => 'National registration Card'
        ]);
        Documenttype::create([
            'name' => 'driving license'
        ]);
        Documenttype::create([
            'name' => 'My number card'
        ]);
        Documenttype::create([
            'name' => 'Foreigners registration card'
        ]);
    }
}
