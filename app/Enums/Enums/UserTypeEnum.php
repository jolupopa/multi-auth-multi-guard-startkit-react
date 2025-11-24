<?php

namespace App\Enums\Enums;

enum UserTypeEnum: string
{
    case CLIENT = 'client';
    case AGENT = 'agent';
    case COMPANY = 'company';
}
