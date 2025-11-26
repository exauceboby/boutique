@extends('backend.master')

@section('title', 'Créer une Devise')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('backend.admin.currencies.store') }}" method="post" class="accountForm"
      enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="name" class="form-label">
              Nom
              <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" placeholder="Entrez le nom" name="name"
              value="{{ old('name') }}" required>
          </div>
          <div class="mb-3 col-md-6">
            <label for="code" class="form-label">
              Code
              <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" placeholder="Entrez le code court" name="code"
              value="{{ old('code') }}" required>
          </div>
          <div class="mb-3 col-md-6">
            <label for="symbol" class="form-label">
              Symbole
              <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" placeholder="Entrez le symbole" name="symbol"
              value="{{ old('symbol') }}" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn bg-gradient-primary">Créer</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('style')
@endpush

@push('script')
<script src="{{ asset('js/image-field.js') }}"></script>
@endpush
