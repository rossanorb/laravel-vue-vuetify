<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);        
        $this->call(ProdutoTableSeeder::class);
        $this->call(HistoricoTableSeeder::class);
        $this->call(ProdutosPedidosTableSeeder::class);
    }
}
