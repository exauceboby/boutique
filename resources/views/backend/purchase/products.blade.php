@extends('backend.master')

@section('title', 'Clients')

@section('content')
<div class="card">
  <div class="card-body p-2 p-md-4 pt-0">
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Fournisseur
        <address>
          <strong>Nom : {{ $purchase->supplier->name }}</strong><br>
        </address>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-md-12">
        <div class="card-body table-responsive p-0" id="table_data">
          <table id="datatables" class="table table-bordered text-center">
            <thead>
              <tr>
                <th data-orderable="false">#</th>
                <th>Produit</th>
                <th>Prix d'achat {{currency()->symbol??''}}</th>
                <th>Quantité</th>
                <th>Sous-total {{currency()->symbol??''}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($purchase->items as $key => $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ number_format($item->purchase_price, 2) }}</td>
                <td>{{ $item->quantity }} {{ optional($item->product->unit)->short_name }}</td>
                <td>{{ number_format(($item->purchase_price * $item->quantity), 2) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- colonne notes -->
      <div class="col-6">
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          {{ $purchase->note ?? '' }}
        </p>
      </div>

      <!-- colonne résumé -->
      <div class="col-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Sous-total :</th>
              <td class="text-right">{{ number_format($purchase->sub_total,2,'.',',') }}</td>
            </tr>
            <tr>
              <th>Taxe :</th>
              <td class="text-right">{{ number_format($purchase->tax,2,'.',',') }}</td>
            </tr>
            <tr>
              <th>Remise :</th>
              <td class="text-right">{{ number_format($purchase->discount_value,2,'.',',') }}</td>
            </tr>
            <tr>
              <th>Livraison :</th>
              <td class="text-right">{{ number_format($purchase->shipping,2,'.',',') }}</td>
            </tr>
            <tr>
              <th>Total :</th>
              <td class="text-right">{{ number_format($purchase->grand_total,2,'.',',') }}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
  </div>
</div>
@endsection

@push('script')
@endpush
