@extends('backend.master')

@section('title', 'Créer un Produit')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('backend.admin.products.store') }}" method="post" class="accountForm" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <!-- Nom du produit -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Nom <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Entrez le nom" name="name" value="{{ old('name') }}" required>
          </div>

          <!-- SKU -->
          <div class="mb-3 col-md-6">
            <label class="form-label">SKU(Identifiant) <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Entrez le SKU" name="sku" value="{{ old('sku') }}" required>
          </div>

          <!-- Marque -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Marque <span class="text-danger">*</span></label>
            <select class="form-control select2" style="width: 100%;" name="brand_id" required>
              <option value="">Sélectionnez une marque</option>
              @foreach ($brands as $item)
              <option value="{{ $item->id }}" {{ old('brand_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Catégorie -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Catégorie <span class="text-danger">*</span></label>
            <select class="form-control select2" style="width: 100%;" name="category_id" required>
              <option value="">Sélectionnez une catégorie</option>
              @foreach ($categories as $item)
              <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Prix -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Prix <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Entrez le prix" name="price" value="{{ old('price') }}" required>
          </div>

          <!-- Unité -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Unité <span class="text-danger">*</span></label>
            <select class="form-control" style="width: 100%;" name="unit_id" required>
              <option value="">Sélectionnez une unité</option>
              @foreach ($units as $item)
              <option value="{{ $item->id }}" {{ old('unit_id') == $item->id ? 'selected' : '' }}>
                {{ $item->title . ' (' . $item->short_name . ')' }}
              </option>
              @endforeach
            </select>
          </div>

          <!-- Type de remise -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Type de remise</label>
            <select class="form-control form-select" name="discount_type">
              <option value="">Sélectionnez le type de remise</option>
              <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Fixe</option>
              <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Pourcentage</option>
            </select>
          </div>

          <!-- Prix d'achat -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Prix d'achat <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Entrez le prix d'achat" name="purchase_price" value="{{ old('purchase_price') }}" required>
          </div>

          <!-- Montant de remise -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Montant de la remise</label>
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Entrez la remise" name="discount" value="{{ old('discount') }}">
          </div>

          <!-- Image -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Image</label>
            <div class="image-upload-container" id="imageUploadContainer">
              <input type="file" class="form-control" name="product_image" id="thumbnailInput" accept="image/*" style="display: none;">
              <div class="thumb-preview" id="thumbPreviewContainer">
                <img src="{{ asset('backend/assets/images/blank.png') }}" alt="Aperçu image" class="img-thumbnail d-none" id="thumbnailPreview">
                <div class="upload-text">
                  <i class="fas fa-plus-circle"></i>
                  <span>Uploader l'image</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Description -->
          <div class="mb-3 col-md-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" placeholder="Entrez la description" name="description">{{ old('description') }}</textarea>
          </div>

          <!-- Date d'expiration -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Date d'expiration</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="text" placeholder="Entrez la date d'expiration" class="form-control datetimepicker-input" data-target="#reservationdate" name="expire_date" value="{{ old('expire_date') }}" />
              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>

          <!-- Statut -->
          <div class="mb-3 col-md-12">
            <div class="form-switch px-4">
              <input type="hidden" name="status" value="0">
              <input class="form-check-input" type="checkbox" name="status" id="active" value="1" checked>
              <label class="form-check-label" for="active">Actif</label>
            </div>
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
<style>
  .select2-container--default .select2-selection--single {
    height: calc(1.5em + 0.75rem + 2px) !important;
  }
</style>
@endpush

@push('script')
<script src="{{ asset('js/image-field.js') }}"></script>
<script>
  $(function() {
    $('#reservationdate').datetimepicker({
      format: 'YYYY-MM-DD'
    });
  });
</script>
@endpush
