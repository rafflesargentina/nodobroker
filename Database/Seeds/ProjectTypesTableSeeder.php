<?php

namespace Raffles\Modules\Nodobroker\Database\Seeds;

use Raffles\Modules\Nodobroker\Models\ProjectType;

use Illuminate\Database\Seeder;

class ProjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectTypes = [
            [
                'name' => 'Lotes',
            ],
            [
                'name' => 'Apartamentos',
            ],
            [
                'name' => 'Casas',
            ]
        ];

        foreach ($projectTypes as $projectType) {
            ProjectType::create($projectType);
        }
    }
}
