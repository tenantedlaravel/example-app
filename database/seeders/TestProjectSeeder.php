<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class TestProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        Project::query()->truncate();

        for ($i = 0; $i < 10; $i++) {
            if (random_int(0, 1) === 1) {
                $p = Project::factory()->active()->create();
            } else {
                $p = Project::factory()->inactive()->create();
            }

            $this->command->info('Project create: ' . $p->getKey() . ':' . $p->subdomain);
        }
    }
}
