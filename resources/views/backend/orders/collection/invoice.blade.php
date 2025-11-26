@extends('backend.master')
@section('title', 'Facture_Collecte_'.$transaction->id)
@section('content')
<div class="card">
  <div class="card-body">
    <!-- Contenu principal -->
    <section class="invoice">
      <!-- ligne du titre -->
      <div class="row mb-4">
        <div class="col-4">
          <h2 class="page-header">
            <img src="{{ assetImage(readconfig('site_logo')) }}" height="40" width="40" alt="Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8"> {{ readConfig('site_name') }}
          </h2>
        </div>
        <div class="col-4">
          <h4 class="page-header">Facture de collecte</h4>
        </div>
        <div class="col-4">
          <small class="float-right text-small">Date : {{date('d/m/Y')}}</small>
        </div>
      </div>

      <!-- ligne info -->
      <div class="row invoice-info mb-2">
        <div class="col-sm-5 invoice-col">
          @if(readConfig('is_show_customer_invoice'))
          À
          <address>
            <strong>Nom : {{$order->customer->name??"N/A"}}</strong><br>
            Adresse : {{$order->customer->address??"N/A"}}<br>
            Téléphone : {{$order->customer->phone??"N/A"}}<br>
          </address>
          @endif
        </div>
        <div class="col-sm-4 invoice-col">
          De
          <address>
            @if(readConfig('is_show_site_invoice'))<strong>Nom : {{ readConfig('site_name') }}</strong><br> @endif
            @if(readConfig('is_show_address_invoice'))Adresse : {{ readConfig('contact_address') }}<br>@endif
            @if(readConfig('is_show_phone_invoice'))Téléphone : {{ readConfig('contact_phone') }}<br>@endif
            @if(readConfig('is_show_email_invoice'))Email : {{ readConfig('contact_email') }}<br>@endif
          </address>
        </div>
        <div class="col-sm-3 invoice-col">
          Infos <br>
          ID Facture #{{$transaction->id}}<br>
          ID Vente #{{$order->id}}<br>
          Date de vente : {{date('d/m/Y', strtotime($order->created_at))}}<br>
          Date de collecte : {{date('d/m/Y', strtotime($transaction->created_at))}}<br>
        </div>
      </div>

      <!-- ligne tableau -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>N°</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix {{currency()->symbol??''}}</th>
                <th>Sous-total {{currency()->symbol??''}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->products as $item )
              <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->quantity}} {{optional($item->product->unit)->short_name}}</td>
                <td>
                  {{ $item->discounted_price }}
                  @if ($item->price>$item->discounted_price)
                  <br><del>{{ $item->price }}</del>
                  @endif
                </td>
                <td>{{number_format($item->total,2,'.',',')}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            @if(readConfig('is_show_note_invoice')){{ readConfig('note_to_customer_invoice') }}@endif
          </p>
        </div>
        <div class="col-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Sous-total :</th>
                <td class="text-right">{{currency()->symbol.' '.number_format($order->sub_total,2,'.',',')}}</td>
              </tr>
              <tr>
                <th>Remise :</th>
                <td class="text-right">{{currency()->symbol.' '.number_format($order->discount,2,'.',',')}}</td>
              </tr>
              <tr>
                <th>Total :</th>
                <td class="text-right">{{currency()->symbol.' '.number_format($order->total,2,'.',',')}}</td>
              </tr>
              <tr>
                <th>Déjà payé :</th>
                <td class="text-right">{{currency()->symbol.' '.number_format($order->paid - $collection_amount,2,'.',',')}}</td>
              </tr>
              <tr>
                <th>Montant collecté :</th>
                <td class="text-right">{{currency()->symbol.' '.number_format($collection_amount,2,'.',',')}}</td>
              </tr>
              <tr>
                <th>Reste à payer :</th>
                <td class="text-right">{{currency()->symbol.' '.number_format($order->due,2,'.',',')}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="row no-print">
        <div class="col-12">
          <button type="button" onclick="window.print()" class="btn btn-success float-right">
            <i class="fas fa-print"></i> Imprimer
          </button>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection

@push('style')
<style>
  .invoice {
    border: none !important;
  }
</style>
@endpush
@push('script')
<script>
  window.addEventListener("load", window.print());
</script>
@endpush
