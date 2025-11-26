<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Mot de passe oublié | {{ readConfig('site_name') }}
    </title>
    <!-- FAVICON ICON -->
    <link rel="shortcut icon" href="{{ assetImage(readconfig('site_logo')) }}" type="image/svg+xml">
    <!-- BACK-TOP CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/back-top/backToTop.css') }}">
    <!-- BOOTSTRAP CSS (5.3) -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
    <!-- APP-CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
</head>

<body>
    <x-simple-alert />

    <!-- AUTHENTICATION-START (FORGET PASSWORD) -->
    <section class="authentications">
        <div class="left-content">
            <figure class="">
                <img src="{{ asset('assets/images/authentication/register.svg') }}" alt="image d'inscription">
            </figure>
        </div>
        <div class="right-content">
            <form action="{{ route('forget.password') }}" method="post"
                class="authentication-form px-lg-5 forgot-form needs-validation" novalidate>
                @csrf
                <div class="authentication-form-header">
                    <a href="{{ route('frontend.home') }}" class="logo">
                        <img src="{{ assetImage(readconfig('site_logo')) }}" width="200px" alt="brand-logo">
                    </a>
                    <h3 class="form-title">Mot de passe oublié ?</h3>
                    <p class="form-des">Veuillez entrer l’adresse email utilisée pour vous connecter.</p>
                </div>
                <div class="authentication-form-content">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Entrez votre email"
                                    autocomplete="off" name="email" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer une adresse email valide.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="create-account-btn w-100">Réinitialiser mot de passe</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="authentication-form-footer">
                    <p>Retour à <a href="{{ route('login') }}">la connexion</a></p>
                </div>
            </form>
        </div>
    </section>
    <!-- AUTHENTICATION-END -->

    <!-- BOOTSTRAP JS (5.3) -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- BOOTSTRAP-TOOLTIP -->
    <script src="{{ asset('assets/js/tooltip/tooltip.js') }}"></script>
    <!-- BACK-TOP JS -->
    <script src="{{ asset('assets/js/back-top/backToTop.js') }}"></script>
    <script src="{{ asset('assets/js/back-top/backtop.js') }}"></script>
    <!-- COPYRIGHT JS -->
    <script src="{{ asset('assets/js/copyright/copyright.js') }}"></script>
    <!-- VALIDATION  -->
    <script src="{{ asset('assets/js/validation/validation.js') }}"></script>

</body>

</html>
