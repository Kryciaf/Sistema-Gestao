<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Database\Seeders\FornecedorSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\SiteContatoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(FornecedorSeeder::class);
        $this->call(SiteContatoSeeder::class);

    }
}
