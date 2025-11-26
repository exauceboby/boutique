@extends('backend.master')

@section('title', 'Produits')

@section('content')
<div class="card">

  @can('product_create')
  <div class="mt-n5 mb-3 d-flex justify-content-end">
    <a href="{{ route('backend.admin.products.create') }}" class="btn bg-gradient-primary">
      <i class="fas fa-plus-circle"></i>
      Ajouter Nouveau
    </a>
  </div>
  @endcan

  <div class="card-body p-2 p-md-4 pt-0">
    <div class="row g-4">
      <div class="col-md-12">
        <div class="card-body table-responsive p-0" id="table_data">
          <table id="datatables" class="table table-hover">
            <thead>
              <tr>
                <th data-orderable="false">#</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix {{ currency()->symbol ?? '' }}</th>
                <th>Stock</th>
                <th>Créé le</th>
                <th>Statut</th>
                <th data-orderable="false">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')

<script type="text/javascript">
  $(function() {
    let table = $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      ordering: true,
      ajax: {
        url: "{{ route('backend.admin.products.index') }}"
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { 
          data: 'image', 
          name: 'image',
          render: function(data){
            return data ? '<img src="'+data+'" alt="Image Produit" height="40" width="40" class="img-thumbnail">' : '-';
          },
          orderable: false
        },
        { data: 'name', name: 'name' },
        { 
          data: 'price', 
          name: 'price',
          render: function(data) {
            return '{{ currency()->symbol ?? "" }}' + parseFloat(data).toFixed(2);
          }
        },
        { data: 'quantity', name: 'quantity' },
        { 
          data: 'created_at', 
          name: 'created_at',
          render: function(data) {
            return moment(data).format('DD/MM/YYYY');
          }
        },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false }
      ]
    });
  });
</script>
@endpush
