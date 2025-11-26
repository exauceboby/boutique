<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inscription | {{ readConfig('site_name') }}
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

    <!-- FORMULAIRE D'INSCRIPTION -->
    <section class="authentications">
        <div class="left-content">
            <figure>
                <img src="{{ asset('assets/images/authentication/register.svg') }}" alt="image inscription">
            </figure>
        </div>
        <div class="right-content">
            <form action="{{ route('signup') }}" method="post" class="authentication-form px-lg-5 needs-validation"
                novalidate>
                @csrf
                <div class="authentication-form-header">
                    <a href="{{ route('frontend.home') }}" class="logo">
                        <img src="{{ assetImage(readconfig('site_logo')) }}" width="200px" alt="logo du site">
                    </a>
                    <h3 class="form-title">Créer un compte</h3>
                    <p class="form-des">Inscrivez-vous maintenant et explorez nos services.</p>
                </div>
                <div class="authentication-form-content">
                    <div class="row g-4">
                        <!-- Nom -->
                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="fullName" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Entrez votre nom complet"
                                    autocomplete="off" name="name" value="{{ old('name') }}" required>
                                <div class="invalid-feedback">
                                    Veuillez saisir votre nom.
                                </div>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Entrez votre email"
                                    autocomplete="off" name="email" value="{{ old('email') }}" required>
                                <div class="invalid-feedback">
                                    Veuillez saisir une adresse email valide.
                                </div>
                            </div>
                        </div>
                        <!-- Mot de passe -->
                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe"
                                    autocomplete="off" name="password" required>
                                <div class="show-hide toggle-password" id="toggleIcon">
                                    <span class="eye-icon">
                                        <!-- icône oeil -->
                                    </span>
                                    <span class="eye-off d-none">
                                        <!-- icône oeil barré -->
                                    </span>
                                </div>
                                <div class="invalid-feedback">
                                    Veuillez saisir un mot de passe.
                                </div>
                            </div>
                        </div>
                        <!-- Confirmer mot de passe -->
                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    placeholder="Confirmez votre mot de passe" autocomplete="off" name="password_confirmation"
                                    required>
                                <div class="show-hide toggle-password" id="toggleIcon">
                                    <span class="eye-icon">
                                        <!-- icône oeil -->
                                    </span>
                                    <span class="eye-off d-none">
                                        <!-- icône oeil barré -->
                                    </span>
                                </div>
                                <div class="invalid-feedback">
                                    Veuillez confirmer votre mot de passe.
                                </div>
                            </div>
                        </div>
                        <!-- Acceptation des conditions -->
                        <div class="col-12">
                            <div class="single-row">
                                <div class="agreebox">
                                    <div class="customcheck ">
                                        <input type="checkbox" id="agree" class="customcheck-box" name="agree" hidden required>
                                        <label for="agree" class="customcheck-label">J'accepte tous les <a href="#">Termes</a> et la <a href="#">Politique de confidentialité</a>.</label>
                                        <div class="invalid-feedback">
                                            Veuillez accepter nos conditions.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Créer compte -->
                        <div class="col-sm-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <button type="submit" class="create-account-btn w-100">Créer un compte</button>
                            </div>
                        </div>
                        <!-- Déjà un compte -->
                        <div class="col-12">
                            <div class="authentication-form-footer">
                                <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Connexion</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- FIN FORMULAIRE INSCRIPTION -->

    <!-- JS -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip/tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/back-top/backToTop.js') }}"></script>
    <script src="{{ asset('assets/js/back-top/backtop.js') }}"></script>
    <script src="{{ asset('assets/js/copyright/copyright.js') }}"></script>
    <script src="{{ asset('assets/js/validation/validation.js') }}"></script>
    <script>
        const passwordInputs = document.querySelectorAll('.form-control[type="password"]');
        const toggleIcons = document.querySelectorAll('.toggle-password');

        toggleIcons.forEach((toggleIcon, index) => {
            toggleIcon.addEventListener('click', () => {
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
