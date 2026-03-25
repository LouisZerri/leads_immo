<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Admin GEST'IMMO</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎯</text></svg>">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body style="background-color: #F2F0E8; font-family: 'DM Sans', sans-serif; color: #333; margin: 0;">

    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); max-width: 400px; width: 100%; padding: 40px 32px;">

            <div style="text-align: center; margin-bottom: 32px;">
                <h1 style="font-size: 24px; font-weight: 700; color: #1A3A5C; margin-bottom: 8px;">Admin GEST'IMMO</h1>
                <p style="color: #666; font-size: 14px;">Connectez-vous pour accéder au tableau de bord</p>
            </div>

            @if($errors->any())
                <div style="background-color: rgba(192, 57, 43, 0.1); border: 1px solid #C0392B; border-radius: 8px; padding: 12px; margin-bottom: 20px; color: #C0392B; font-size: 14px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div style="margin-bottom: 16px;">
                    <label for="email" style="display: block; font-size: 14px; font-weight: 500; margin-bottom: 6px;">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box; color: #333; background: #fff;"
                    >
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="password" style="display: block; font-size: 14px; font-weight: 500; margin-bottom: 6px;">Mot de passe</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box; color: #333; background: #fff;"
                    >
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: #666; cursor: pointer;">
                        <input type="checkbox" name="remember" style="width: 16px; height: 16px;">
                        Se souvenir de moi
                    </label>
                </div>

                <button
                    type="submit"
                    style="width: 100%; padding: 12px; background-color: #1A3A5C; color: #fff; font-size: 16px; font-weight: 700; border: none; border-radius: 8px; cursor: pointer;"
                >
                    Se connecter
                </button>
            </form>
        </div>
    </div>

</body>
</html>
