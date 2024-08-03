<?php

namespace App\Models;

use App\Models\Traits\WithUuidColumn;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Propaganistas\LaravelPhone\PhoneNumber;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, WithUuidColumn;
    use HasPanelShield, HasRoles;

    protected $fillable = ['uuid', 'name', 'email', 'mobile', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function __toString()
    {
        return $this->getAttribute('name');
    }

    public function setMobileAttribute($value): void
    {
        $this->attributes['mobile'] = (string) new PhoneNumber($value, 'IR');
    }
}
