<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Students;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Phan Đức Anh', 'phone' => '123456789'],
            ['name' => 'Nguyên Bảo', 'phone' => '987654321'],
            ['name' => 'Lê Bảo An', 'phone' => '555555555'],
            ['name' => 'Bảo Trân', 'phone' => '777777777'],
        ];
        foreach ($items as $item){
            Students::create($item);
        }
    }
}
