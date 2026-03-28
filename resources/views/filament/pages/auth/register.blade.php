<div>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        .register-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 50%);
            animation: pulse 15s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        .shape {
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 20s infinite;
        }
        .shape:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { width: 120px; height: 120px; top: 70%; left: 80%; animation-delay: 2s; }
        .shape:nth-child(3) { width: 60px; height: 60px; top: 40%; left: 70%; animation-delay: 4s; }
        .shape:nth-child(4) { width: 100px; height: 100px; top: 80%; left: 20%; animation-delay: 6s; }
        .shape:nth-child(5) { width: 50px; height: 50px; top: 20%; left: 85%; animation-delay: 8s; }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 0.8; }
        }
        .register-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
            padding: 40px;
            margin: 20px;
            position: relative;
            z-index: 1;
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .logo-section {
            text-align: center;
            margin-bottom: 32px;
        }
        .logo-section img {
            height: 70px;
            margin-bottom: 16px;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }
        .logo-section h1 {
            font-size: 26px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 4px;
        }
        .logo-section p {
            color: #6B7280;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }
        .form-group input {
            width: 100%;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #F9FAFB;
        }
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102,126,234,0.1);
        }
        .form-group input::placeholder {
            color: #9CA3AF;
        }
        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245,158,11,0.4);
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245,158,11,0.5);
        }
        .btn-submit:active {
            transform: translateY(0);
        }
        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        .login-link {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #E5E7EB;
            font-size: 14px;
            color: #6B7280;
        }
        .login-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .login-link a:hover {
            color: #764ba2;
        }
        .input-wrapper {
            position: relative;
        }
    </style>

    <div class="register-container">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <div class="register-card">
            <div class="logo-section">
                <img src="{{ asset('images/HGS LOGO.png') }}" alt="Logo">
                <h1>HGS Sparepart</h1>
                <p>Daftar Akun Baru</p>
            </div>

            @if(!$emailChecked)
            <form wire:submit="checkEmail">
                <div class="form-group">
                    <label>📧 Email</label>
                    <div class="input-wrapper">
                        <input type="email" wire:model="email" placeholder="Masukkan email anda">
                    </div>
                </div>
                <button type="submit" class="btn-submit" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="checkEmail">🔍 Cek Email</span>
                    <span wire:loading wire:target="checkEmail">⏳ Memeriksa...</span>
                </button>
            </form>
            @else
            <form wire:submit="register">
                <div class="form-group">
                    <label>👤 Nama Lengkap</label>
                    <input type="text" wire:model="name" placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <label>🔒 Password</label>
                    <input type="password" wire:model="password" placeholder="Minimal 8 karakter">
                </div>
                <div class="form-group">
                    <label>🔐 Konfirmasi Password</label>
                    <input type="password" wire:model="password_confirmation" placeholder="Ulangi password">
                </div>
                <button type="submit" class="btn-submit" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="register">✨ Daftar Sekarang</span>
                    <span wire:loading wire:target="register">⏳ Mendaftar...</span>
                </button>
            </form>
            @endif

            <div class="login-link">
                Sudah punya akun? <a href="/admin/login">Login di sini</a>
            </div>
        </div>
    </div>
</div>
