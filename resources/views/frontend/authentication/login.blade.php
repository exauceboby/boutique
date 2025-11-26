<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Connexion | {{ readConfig('site_name') }}
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

    <!-- AUTHENTICATION-START (LOGIN) -->
    <section class="authentications">
        <div class="left-content">
            <figure class="">
                <img src="{{ asset('assets/images/authentication/register.svg') }}" alt="image d’inscription ">
            </figure>
        </div>
        <div class="right-content">
            <form action="{{ route('login') }}" method="post" class="authentication-form px-lg-5 needs-validation"
                novalidate>
                @csrf
                <div class="authentication-form-header">
                    <a href="{{ route('frontend.home') }}" class="logo">
                        <img src="{{ assetImage(readconfig('site_logo')) }}" width="200px" alt="brand-logo">
                    </a>
                    <h3 class="form-title">Connexion</h3>
                    <p class="form-des">Bienvenue ! Connectez-vous pour accéder à votre compte.</p>
                </div>
                <div class="authentication-form-content">
                    <div class="row g-4">

                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Entrez votre email"
                                    autocomplete="off" name="email" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer une adresse email valide.
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" placeholder="Entrez le mot de passe"
                                    autocomplete="off" name="password" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer un mot de passe.
                                </div>
                                <div class="show-hide toggle-password" id="toggleIcon">
                                    <span class="eye-icon">
                                        <!-- SVG unchanged -->
                                    </span>

                                    <span class="eye-off d-none">
                                        <!-- SVG unchanged -->
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="single-row mb-2">
                                <div class="rememberbox d-flex justify-content-between">
                                    <div class="customcheck">
                                        <input type="checkbox" id="rememberMe" class="customcheck-box"
                                            name="remember_me" hidden>
                                        <label for="rememberMe" class="customcheck-label">Se souvenir de moi</label>
                                    </div>
                                    <a href="{{ route('forget.password') }}" class="forget">Mot de passe oublié ?</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <button type="submit" class="create-account-btn w-100">Se connecter</button>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('assets/js/validation/validation.js') }}"></script>
    <script>
        // Get all password input elements and toggle icons
        const passwordInputs = document.querySelectorAll('.form-control[type="password"]');
        const toggleIcons = document.querySelectorAll('.toggle-password');

        // Add click event listeners to toggle icons
        toggleIcons.forEach((toggleIcon, index) => {
            toggleIcon.addEventListener('click', () => {
                // Toggle the visibility of the respective password field
                if (passwordInputs[index].type === 'password') {
                    passwordInputs[index].type = 'text';
                    toggleIcon.querySelector('.eye-icon').classList.add('d-none');
                    toggleIcon.querySelector('.eye-off').classList.remove('d-none');
                } else {
                    passwordInputs[index].type = 'password';
                    toggleIcon.querySelector('.eye-icon').classList.remove('d-none');
                    toggleIcon.querySelector('.eye-off').classList.add('d-none');
                }
            });
        });
    </script>

</body>
</html>