<?php

namespace App\Enums;

enum SettingType: string {
    case Text = 'text';
    case Boolean = 'bool';
    case DateTime = 'datetime';
}