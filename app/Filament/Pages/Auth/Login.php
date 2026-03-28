<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    protected function getLogoUrl(): ?string
    {
        return asset('images/HGS LOGO.png');
    }

    public function getRegisterPageUrl(): ?string
    {
        return '/admin/register';
    }

    public function hasRegistration(): bool
    {
        return true;
    }
}
