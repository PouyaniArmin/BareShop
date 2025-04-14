<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'view_products', 'label' => 'View Products'],
            ['name' => 'create_products', 'label' => 'Create Products'],
            ['name' => 'edit_products', 'label' => 'Edit Products'],
            ['name' => 'delete_products', 'label' => 'Delete Products'],
            ['name' => 'manage_users', 'label' => 'Manage Users'],
        ]);
    }
}
