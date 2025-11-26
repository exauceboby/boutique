@extends('backend.master')

@section('title', 'Unités')

@section('content')
<div class="card">
  @can('unit_create')
  <div class="mt-n5 mb-3 d-flex justify-content-end">
    <a href="{{ route('backend.admin.units.create') }}" class="btn bg-gradient-primary">
      <i class="fas fa-plus-circle"></i>
      Ajouter une unité
    </a>
  </div>
  @endcan

  <div class="card-body p-2 p-md-4 pt-0">
    <div class="row g-4">
      <div class="col-md-12">
        <div class="card-body p-0" id="table_data">
          <table id="datatables" class="table table-hover">
            <thead>
              <tr>
                <th data-orderable="false">#</th>
                <th>Titre</th>
                <th>Nom court</th>
                <th data-orderable="false">Actions</th>
              </tr>
            </thead>
          </table>
          <!-- Liens de pagination -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
  $(function() {
    $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      ordering: true,
      order: [[1, 'asc']],
      ajax: {
        url: "{{ route('backend.admin.units.index') }}"
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'title', name: 'title' },
        { data: 'short_name', name: 'short_name' },
        { data: 'action', name: 'action' },
      ],
      language: {
        processing: "Traitement en cours...",
        search: "Rechercher&nbsp;:",
        lengthMenu: "Afficher _MENU_ éléments",
        info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
        infoEmpty: "Affichage de 0 à 0 sur 0 éléments",
        infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
        loadingRecords: "Chargement en cours...",
        zeroRecords: "Aucun élément trouvé",
        emptyTable: "Aucune donnée disponible dans le tableau",
        paginate: {
          first: "Premier",
          previous: "Précédent",
          next: "Suivant",
          last: "Dernier"
        },
        aria: {
          sortAscending: ": activer pour trier la colonne par ordre croissant",
          sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
      }
    });
  });
</script>
@endpush
