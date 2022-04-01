<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'bejelentkezett']);
        Status::create(['name' => 'megjelent']);
        Status::create(['name' => 'nem_jelent_meg']);
        Status::create(['name' => 'bejelentkezes_nelkul_jelent_meg']);
    }
}