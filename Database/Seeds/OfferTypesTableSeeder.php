<?php

namespace Raffles\Modules\Nodobroker\Database\Seeds;

use Raffles\Modules\Nodobroker\Models\OfferType;

use Illuminate\Database\Seeder;

class OfferTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offerTypes = [
            [
                'color' => 'bg-danger',
                'name' => 'Venta',
            ],
            [
                'color' => 'bg-success',
                'name' => 'Inversión',
            ],
            [
                'color' => 'bg-info',
                'name' => 'Rental',
            ]
        ];

        foreach ($offerTypes as $offerType) {
            OfferType::create($offerType);
        }
    }
}
