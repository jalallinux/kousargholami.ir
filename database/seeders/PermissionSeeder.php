<?php

namespace Database\Seeders;

use App\Enums\EumUserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (EumUserRole::cases() as $role) {
            Role::query()->firstOrCreate(['name' => $role->value]);
        }

        Artisan::call('shield:generate', ['--all' => true]);

        foreach (self::users() as $data) {
            $user = User::factory()->create(Arr::except($data, 'roles'));
            $user->assignRole(...$data['roles']);
        }

        Artisan::call('shield:super-admin', ['--user' => 1]);
    }

    public static function users()
    {
        return [
            [
                'name' => 'سیدمحمدجواد جلال زاده',
                'mobile' => '09177876563',
                'email' => 'smjjalalzadeh93@gmail.com',
                'roles' => [
                    EumUserRole::DEVELOPER->value,
                ],
            ],
            [
                'name' => 'امیرحسین زحمت مند',
                'mobile' => '09389441791',
                'email' => 'amirzm51@gmail.com',
                'roles' => [
                    EumUserRole::ADMIN->value,
                ],
            ],
        ];
    }
}
