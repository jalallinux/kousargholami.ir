<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Seeder;

class FontAwesomeFreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icon::query()->insert($this->data());
    }

    private function data()
    {
        return array_map(fn ($path) => ['icon' => str_replace([public_path('vendor/blade-fontawesome/'), '.svg', 'brands/', 'regular/', 'solid/'], ['', '', 'fab-', 'far-', 'fas-'], $path)], glob(public_path('vendor/blade-fontawesome/**/*.svg')));
    }
}
