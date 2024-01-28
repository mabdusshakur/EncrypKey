<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncrypKey | Unbreakable Software Protection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    {{-- Fontawesome --}}
    <link href="{{ asset('assets/plugins/fontawesome-free-6.4.2-web/css/all.min.css') }}" rel="stylesheet" />
    <style>
        body {
            background-color: #1e2129;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        .hero-section {
            background-image: url({{ asset('assets/images/background/cover.png') }});
            background-size: cover;
            background-position: center;
            /* height: 80vh; */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 300;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.5rem;
        }

        .hero-image {
            width: 85px;
            margin-bottom: 1rem;
        }

        .hero-btn {
            margin-bottom: 1rem;
        }

        .features-section {
            background-color: #252a35;
            padding: 5rem 0;
        }

        .feature-card {
            background-color: #353b48;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 1rem;
        }
        .features-card {
            display: flex;
            justify-content: center;
        }

        .feature-icon {
            width: 100px;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .feature-description {
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <header class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3" style="margin-top: 35rem;">
                    {{-- <h1 class="hero-title">EncrypKey</h1> --}}
                    <p class="hero-subtitle shadow-lg text-dark mb-2 p-2 rounded">Secure Your Software, Unleash Potential</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary hero-btn">Get Started</a>
                </div>
            </div>
        </div>
    </header>

    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 features-card">
                    <div class="feature-card">
                        <i class="fa-solid fa-shield-halved"></i>
                        <h3 class="feature-title">Ironclad Hardware Verification</h3>
                        <p class="feature-description">Bind licenses to specific devices for impenetrable security.</p>
                    </div>
                </div>
                <div class="col-md-4 features-card">
                    <div class="feature-card">
                        <i class="fa-solid fa-key"></i>
                        <h3 class="feature-title">Multi-Factor Authentication</h3>
                        <p class="feature-description">Layer up protection with IP, device name, and MAC verification.</p>
                    </div>
                </div>
                <div class="col-md-4 features-card">
                    <div class="feature-card">
                        <i class="fa-solid fa-table-list"></i>
                        <h3 class="feature-title">Total Control Panel</h3>
                        <p class="feature-description">Manage licenses, users, and settings with ease.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
