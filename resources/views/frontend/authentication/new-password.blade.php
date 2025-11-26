<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Nouveau mot de passe | {{ readConfig('site_name') }}
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

    <!-- AUTHENTIFICATION (NOUVEAU MOT DE PASSE) -->
    <section class="authentications">
        <div class="left-content">
            <figure>
                <img src="{{ asset('assets/images/authentication/register.svg') }}" alt="image réinitialisation mot de passe">
            </figure>
        </div>
        <div class="right-content">
            <form action="{{ route('new.password') }}" method="post" class="authentication-form px-lg-5"
                id="resetPasswordForm" novalidate>
                @csrf
                <div class="authentication-form-header">
                    <a href="{{ route('frontend.home') }}" class="logo">
                        <img src="{{ assetImage(readconfig('site_logo')) }}" width="200px" alt="logo du site">
                    </a>
                    <h3 class="form-title">Réinitialiser le mot de passe</h3>
                    <p class="form-des">Veuillez saisir votre nouveau mot de passe.</p>
                </div>
                <div class="authentication-form-content">
                    <div class="row g-4">
                        <div class="col-xl-8">
                            <div class="form-group">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" placeholder="Entrez le mot de passe"
                                    autocomplete="off" name="password" required>
                                <div class="invalid-feedback" id="passwordValidationText">Veuillez saisir le mot de passe</div>
                                <div class="show-hide toggle-password" id="toggleIcon">
                                    <span class="eye-icon">
                                        <!-- icône oeil (visible) -->
                                    </span>
                                    <span class="eye-off d-none">
                                        <!-- icône oeil barré (invisible) -->
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="form-group">
                                <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    placeholder="Confirmez le mot de passe" autocomplete="off" name="password_confirmation"
                                    required>
                                <div class="invalid-feedback" id="confirmPasswordValidationText">Veuillez confirmer le mot de passe</div>
                                <div class="show-hide toggle-password" id="toggleIcon">
                                    <span class="eye-icon">
                                        <!-- icône oeil (visible) -->
                                    </span>
                                    <span class="eye-off d-none">
                                        <!-- icône oeil barré (invisible) -->
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="form-group">
                                <button type="submit" class="create-account-btn w-100" onclick="validateForm()">
                                    Réinitialiser le mot de passe
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="authentication-form-footer">
                                <p>Retour à la <a href="{{ route('login') }}">connexion</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- FIN AUTHENTIFICATION -->

    <!-- BOOTSTRAP JS (5.3) -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- BOOTSTRAP-TOOLTIP -->
    <script src="{{ asset('assets/js/tooltip/tooltip.js') }}"></script>
    <!-- BACK-TOP JS -->
    <script src="{{ asset('assets/js/back-top/backToTop.js') }}"></script>
    <script src="{{ asset('assets/js/back-top/backtop.js') }}"></script>
    <!-- COPYRIGHT JS -->
    <script src="{{ asset('assets/js/copyright/copyright.js') }}"></script>

    <script>
        // Gestion des icônes oeil pour mot de passe
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
