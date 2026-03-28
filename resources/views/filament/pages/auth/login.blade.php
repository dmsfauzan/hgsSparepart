@extends('filament-panels::pages.auth.login')

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        if (form) {
            const div = document.createElement('div');
            div.style.textAlign = 'center';
            div.style.marginTop = '16px';
            div.style.fontSize = '14px';
            div.innerHTML = 'Belum punya akun? <a href="/admin/register" style="color:#F59E0B;font-weight:500;">Daftar di sini</a>';
            form.appendChild(div);
        }
    });
</script>
@endpush
