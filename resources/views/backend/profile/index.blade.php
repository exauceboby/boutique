@extends('backend.master')

@section('title', 'Profil')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('backend.admin.profile.update') }}" method="post" class="accountForm" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fullName" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Entrez le nom complet"
                            name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="thumbnail">Image de profil</label>
                        <div class="image-upload-container" id="imageUploadContainer">
                            <input type="file" class="form-control" name="profile_image" id="thumbnailInput" accept="image/*" style="display: none;">
                            <div class="thumb-preview" id="thumbPreviewContainer">
                                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Aperçu de l'image"
                                    class="img-thumbnail" id="thumbnailPreview" onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}'">
                                <div class="upload-text d-none">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Uploader l'image</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="font-weight-bold">Changer le mot de passe</h4>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe actuel</label>
                        <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe"
                            name="current_password" autocomplete="new-password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="new_password" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_password" placeholder="Nouveau mot de passe"
                            name="new_password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmer le mot de passe"
                            name="new_password_confirmation">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block bg-gradient-primary">Mettre à jour</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('js/image-field.js') }}"></script>
@endpush
