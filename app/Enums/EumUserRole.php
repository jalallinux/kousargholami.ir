<?php

namespace App\Enums;

use App\Contracts\EnumHasLabelOption;

enum EumUserRole: string
{
    use EnumHasLabelOption;

    case DEVELOPER = 'Developer';
    case ADMIN = 'Admin';
    case SUPPORT = 'Support';
    case USER = 'User';
}
