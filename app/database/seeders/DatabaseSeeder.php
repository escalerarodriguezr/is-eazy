<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public static int $userRootId = 1;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call([
             ShopSeeder::class
         ]);

    }
}
