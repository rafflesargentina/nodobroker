<?php

namespace Raffles\Modules\Nodobroker\Database\Seeds;

use Illuminate\Database\Seeder;

class NodobrokerDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OfferTypesTableSeeder::class);
        $this->call(ProjectTypesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
    }
}
