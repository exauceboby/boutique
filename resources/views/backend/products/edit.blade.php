@extends('backend.master')

@section('title', 'Modifier le Produit')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('backend.admin.products.update',$product->id) }}" method="post" class="accountForm" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <!-- Nom du produit -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Nom <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Entrez le nom" name="name" value="{{ old('name', $product->name) }}" required>
          </div>

          <!-- SKU -->
          <div class="mb-3 col-md-6">
            <label class="form-label">SKU <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Entrez le SKU" name="sku" value="{{ old('sku',$product->sku)}}" required>
          </div>

          <!-- Marque -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Marque <span class="text-danger">*</span></label>
            <select class="form-control select2" style="width: 100%;" name="brand_id" required>
              <option value="">Sélectionnez une marque</option>
              @foreach ($brands as $item)
              <option value="{{ $item->id }}" {{ $product->brand_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Catégorie -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Catégorie <span class="text-danger">*</span></label>
            <select class="form-control select2" style="width: 100%;" name="category_id" required>
              <option value="">Sélectionnez une catégorie</option>
              @foreach ($categories as $item)
              <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Prix -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Prix <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Entrez le prix" name="price" value="{{ old('price',$product->price) }}" required>
          </div>

          <!-- Unité -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Unité <span class="text-danger">*</span></label>
            <select class="form-control" style="width: 100%;" name="unit_id" required>
              <option value="">Sélectionnez une unité</option>
              @foreach ($units as $item)
              <option value="{{ $item->id }}" {{ $product->unit_id == $item->id ? 'selected' : '' }}>
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
              <option value="fixed" {{ $product->discount_type == 'fixed' ? 'selected' : '' }}>Fixe</option>
              <option value="percentage" {{ $product->discount_type  == 'percentage' ? 'selected' : '' }}>Pourcentage</option>
            </select>
          </div>

          <!-- Montant de remise -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Montant de la remise</label>
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Entrez la remise" name="discount" value="{{ old('discount',$product->discount) }}">
          </div>

          <!-- Prix d'achat -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Prix d'achat <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Entrez le prix d'achat" name="purchase_price" value="{{ old('purchase_price',$product->purchase_price) }}" required>
          </div>

          <!-- Image -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Image</label>
            <div class="image-upload-container" id="imageUploadContainer">
              <input type="file" class="form-control" name="product_image" id="thumbnailInput" accept="image/*" style="display: none;">
              <div class="thumb-preview" id="thumbPreviewContainer">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Aperçu image" class="img-thumbnail" id="thumbnailPreview" onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}'">
                <div class="upload-text d-none">
                  <i class="fas fa-plus-circle"></i>
                  <span>Uploader l'image</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Description -->
          <div class="mb-3 col-md-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" placeholder="Entrez la description" name="description">{{ old('description',$product->description) }}</textarea>
          </div>

          <!-- Date d'expiration -->
          <div class="mb-3 col-md-6">
            <label class="form-label">Date d'expiration</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="text" placeholder="Entrez la date d'expiration" class="form-control datetimepicker-input" data-target="#reservationdate" name="expire_date" value="{{ old('expire_date',$product->expire_date) }}" />
              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>

          <!-- Statut -->
          <div class="mb-3 col-md-12">
            <div class="form-switch px-4">
              <input type="hidden" name="status" value="0">
              <input class="form-check-input" type="checkbox" name="status" id="active" value="1" @if($product->status==1) checked @endif>
              <label class="form-check-label" for="active">Actif</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn bg-gradient-primary">Mettre à jour</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

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
