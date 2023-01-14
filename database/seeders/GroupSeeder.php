<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direktorat = ["direktorat utama", "direktorat keuangan", "direktorat operasi", "direktorat pelayanan"];

        foreach ($direktorat as $name ) {
            Group::create([
                "id" => Str::uuid(),
                "name" => $name
            ]);
        }
    }
}
