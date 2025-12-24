@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto p-6">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-sky-700">Daftar Mata Pelajaran</h1>

    <div class="flex items-center space-x-3">
      <a href="{{ route('mapel.create') }}" class="inline-flex items-center px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded shadow">
        + Tambah Mapel
      </a>
    </div>
  </div>

  <!-- Search + Mass Delete -->
  <div class="bg-white shadow rounded p-4 mb-4">
    <form method="GET" action="{{ route('mapel.index') }}" class="flex flex-col md:flex-row md:items-center md:space-x-4">
      <div class="flex-1">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama mapel..." class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500" />
      </div>
      <div class="mt-3 md:mt-0 flex space-x-2">
        <button type="submit" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded">Cari</button>
        <a href="{{ route('mapel.index') }}" class="px-4 py-2 border rounded text-sky-600">Reset</a>
      </div>
    </form>

    <form id="mass-delete-form" method="POST" action="{{ route('mapel.massDestroy') }}">
      @csrf
      <!-- Hidden input to hold selected ids -->
      <input type="hidden" name="ids" id="mass-ids">

      <div class="mt-4 flex items-center justify-between">
        <div>
          <button type="button" id="btn-delete-selected" class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded" disabled>
            Hapus Terpilih
          </button>
        </div>

        <div class="text-sm text-gray-600">
          Menampilkan <strong>{{ $mapel->firstItem() ?? 0 }}</strong> - <strong>{{ $mapel->lastItem() ?? 0 }}</strong> dari <strong>{{ $mapel->total() }}</strong>
        </div>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto mt-3">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-sky-50">
            <tr>
              <th class="px-4 py-3">
                <input id="check-all" type="checkbox" class="h-4 w-4 text-sky-600 rounded border-gray-300">
              </th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">#</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nama Mapel</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Slug</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Dibuat</th>
              <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 uppercase">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-100">
            @forelse($mapel as $index => $m)
              <tr>
                <td class="px-4 py-3">
                  <input type="checkbox" class="row-check h-4 w-4 text-sky-600 rounded border-gray-300" value="{{ $m->id }}">
                </td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ $mapel->firstItem() + $index }}</td>
                <td class="px-4 py-3 text-sm text-gray-800">{{ $m->nama }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ $m->slug }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ $m->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3 text-center">
                  <a href="{{ route('mapel.edit', $m) }}" class="inline-block px-3 py-1 text-sm bg-yellow-400 text-white rounded">Edit</a>
                  <form action="{{ route('mapel.destroy', $m) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus mapel ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block px-3 py-1 text-sm bg-red-600 text-white rounded ml-2">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada data mata pelajaran.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </form>

    <!-- Pagination -->
    <div class="mt-4">
      {{ $mapel->withQueryString()->links() }}
    </div>
  </div>
</div>

<!-- Mass delete JS -->
@section('scripts')
<script>
  (function () {
    const checkAll = document.getElementById('check-all');
    const rowChecks = document.querySelectorAll('.row-check');
    const btnDelete = document.getElementById('btn-delete-selected');
    const massIds = document.getElementById('mass-ids');
    const form = document.getElementById('mass-delete-form');

    function updateButtonState() {
      const checked = Array.from(rowChecks).filter(c => c.checked);
      btnDelete.disabled = checked.length === 0;
    }

    // toggle all
    checkAll?.addEventListener('change', function () {
      rowChecks.forEach(c => c.checked = this.checked);
      updateButtonState();
    });

    rowChecks.forEach(c => c.addEventListener('change', updateButtonState));

    btnDelete.addEventListener('click', function () {
      const selected = Array.from(rowChecks).filter(c => c.checked).map(c => c.value);
      if (selected.length === 0) return;
      if (!confirm('Hapus ' + selected.length + ' mapel terpilih?')) return;
      massIds.value = JSON.stringify(selected);
      // create hidden method input for delete
      let input = document.createElement('input');
      input.type = 'hidden';
      input.name = '_method';
      input.value = 'DELETE';
      form.appendChild(input);
      form.submit();
    });
  })();
</script>
@endsection

 
