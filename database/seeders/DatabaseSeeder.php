<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      //Car::factory(5)->create();
   Product::factory(100)->create();
      
    }
  }