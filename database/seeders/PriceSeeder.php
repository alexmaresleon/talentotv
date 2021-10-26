<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Gratis',
            'value' => 0

        ]);

        Price::create([
            'name' => '$220.00 Pesos',
            'value' => 220.00

        ]);

        Price::create([
            'name' => '$390.00 Pesos',
            'value' => 390.00

        ]);

        Price::create([
            'name' => '$630.00 Pesos',
            'value' => 630.00

        ]);

        Price::create([
            'name' => '$790.00 Pesos',
            'value' => 790.00

        ]);

        Price::create([
            'name' => '$1,078.00 Pesos',
            'value' => 1078.00

        ]);

    }
}
