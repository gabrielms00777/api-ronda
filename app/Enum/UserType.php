<?php

namespace App\Enum;

enum UserType: string
{
    case MANAGER = 'manager';
    case EMPLOYEE = 'employee';
}
