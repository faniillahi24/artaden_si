@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <!-- Header dengan Icon -->
        <div class="login-header">
            <div class="admin-icon">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 4V6C15 7.66 13.66 9 12 9S9 7.66 9 6V4L3 7V9C3 10.1 3.9 11 5 11V17C5 18.1 5.9 19 7 19H9C10.1 19 11 18.1 11 17V15H13V17C13 18.1 13.9 19 15 19H17C18.1 19 19 18.1 19 17V11C20.1 11 21 10.1 21 9Z" fill="currentColor"/>
                </svg>
            </div>
            <h3>Login Admin</h3>
            <p>Silakan masuk ke panel admin</p>
        </div>

        <!-- Error Alert -->
        @if($errors->any())
            <div class="alert alert-error">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22 22 17.52 22 12 17.52 2 12 2ZM13 17H11V15H13V17ZM13 13H11V7H13V13Z" fill="currentColor"/>
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="currentColor"/>
                    </svg>
                    <input type="email" id="email" name="email" required autofocus placeholder="Masukkan email Anda">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8H17V6C17 3.24 14.76 1 12 1S7 3.24 7 6V8H6C4.9 8 4 8.9 4 10V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V10C20 8.9 19.1 8 18 8ZM12 17C10.9 17 10 16.1 10 15S10.9 13 12 13 14 13.9 14 15 13.1 17 12 17ZM15.1 8H8.9V6C8.9 4.29 10.29 2.9 12 2.9S15.1 4.29 15.1 6V8Z" fill="currentColor"/>
                    </svg>
                    <input type="password" id="password" name="password" required placeholder="Masukkan password Anda">
                </div>
            </div>

            <button type="submit" class="btn-login">
                <span>Masuk</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" fill="currentColor"/>
                </svg>
            </button>
        </form>
    </div>
</div>

<style>
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #4338ca 0%, #764ba2 100%);
        padding: 20px;
    }

    .login-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 400px;
        position: relative;
        overflow: hidden;
    }

    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4338ca);
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .admin-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #4338ca);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .login-header h3 {
        margin: 0 0 10px 0;
        font-size: 28px;
        font-weight: 700;
        color: #333;
    }

    .login-header p {
        margin: 0;
        color: #666;
        font-size: 16px;
    }

    .alert-error {
        background: #fee;
        border: 1px solid #fcc;
        color: #c33;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .login-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        color: #999;
        z-index: 2;
    }

    .input-wrapper input {
        width: 100%;
        padding: 15px 15px 15px 50px;
        border: 2px solid #e1e5e9;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .input-wrapper input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .input-wrapper input::placeholder {
        color: #aaa;
    }

    .btn-login {
        background: linear-gradient(135deg, #4338ca);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    /* Responsive Design */
    @media (max-width: 480px) {
        .login-container {
            padding: 10px;
        }

        .login-card {
            padding: 30px 20px;
        }

        .login-header h3 {
            font-size: 24px;
        }

        .admin-icon {
            width: 70px;
            height: 70px;
        }

        .admin-icon svg {
            width: 50px;
            height: 50px;
        }
    }

    /* Animation */
    .login-card {
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
