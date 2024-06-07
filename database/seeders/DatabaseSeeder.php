<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            LevelSeeder::class,
            PriceSeeder::class,
        ]);

        $user = User::factory()->create([
            'name' => 'Harumi Catalan',
            'email' => 'harumixd123.hca@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('Admin');

    }
}
