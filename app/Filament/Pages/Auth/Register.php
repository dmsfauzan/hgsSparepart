<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\SimplePage;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Register extends SimplePage implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.pages.auth.register';
    protected static bool $shouldRegisterNavigation = false;

    public ?string $email = null;
    public ?string $name = null;
    public ?string $password = null;
    public ?string $password_confirmation = null;
    public bool $emailChecked = false;
    public ?User $existingUser = null;

    public function getTitle(): string
    {
        return 'Daftar Akun';
    }

    public function checkEmail(): void
    {
        if (!$this->email) {
            Notification::make()
                ->title('Email harus diisi')
                ->danger()
                ->send();
            return;
        }

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            Notification::make()
                ->title('Email tidak terdaftar')
                ->body('Email ini tidak diizinkan untuk mendaftar. Hubungi admin.')
                ->danger()
                ->send();
            return;
        }

        if ($user->is_registered) {
            Notification::make()
                ->title('Akun sudah terdaftar')
                ->body('Email ini sudah digunakan. Silakan login.')
                ->warning()
                ->send();
            return;
        }

        $this->existingUser = $user;
        $this->name = $user->name;
        $this->emailChecked = true;
    }

    public function register(): void
    {
        if (!$this->existingUser) return;

        if (!$this->password) {
            Notification::make()
                ->title('Password harus diisi')
                ->danger()
                ->send();
            return;
        }

        if (strlen($this->password) < 8) {
            Notification::make()
                ->title('Password minimal 8 karakter')
                ->danger()
                ->send();
            return;
        }

        if ($this->password !== $this->password_confirmation) {
            Notification::make()
                ->title('Password tidak cocok')
                ->danger()
                ->send();
            return;
        }

        $this->existingUser->update([
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'is_registered' => true,
        ]);

        Notification::make()
            ->title('Akun berhasil didaftarkan')
            ->body('Silakan login dengan akun anda.')
            ->success()
            ->send();

        $this->redirect('/admin/login');
    }
}
