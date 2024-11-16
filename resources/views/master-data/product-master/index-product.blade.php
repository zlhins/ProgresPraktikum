<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
 
<div class="container p-4 mx-auto">
  <form method="GET" action="{{ route('product-index') }}" class="mb-4 flex items-center">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="w-1/4 rounded-lg border border-gray-300 px-4 py-2 focus.outline-none focus:ring-2 focus:ring-green-500">
      <button type="submit" class="ml-2 rounded-lg bg-green-500 px-4 py-2 text-white shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Cari</button>
  </form>

    <div class="overflow-x-auto">
      <a href="{{ route('product-create')}}">
        <button class="px-6 py-3 text-white bg-green-500 border border-green-500 rounded-lg shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
            Add product
        </button>
      </a>
    </div>

      <table class="min-w-full border border-collapse border-gray-200">
        <thead>
          <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">ID</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Product Name</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Unit</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Type</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">information</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">qty</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">producer</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr class="bg-white">
              <td class="border border-gray-200 px-4 py-2">{{ $product->id }}</td>
              <td class="border border-gray-200 px-4 py-2 hover:text-blue-500 hover:underline">
                <a href="{{ route('product-detail', $product->id )}}">
                  {{ $product->product_name }}
                </a>
              </td>
              <!-- <td class="px-4 py-2 border border-gray-200">1</td>
              <td class="px-4 py-2 border border-gray-200">{{ $product->product_name }}</td> -->
              <td class="px-4 py-2 border border-gray-200 px-4 py-2">{{ $product->unit }}</td>
              <td class="px-4 py-2 border border-gray-200 px-4 py-2">{{ $product->type }}</td>
              <td class="px-4 py-2 border border-gray-200 px-4 py-2">{{ $product->information }}</td>
              <td class="px-4 py-2 border border-gray-200 px-4 py-2">{{ $product->qty }}</td>
              <td class="px-4 py-2 border border-gray-200 px-4 py-2">{{ $product->producer }}</td>
              <td class="px-4 py-2 border border-gray-200 px-4 py-2">
                <a href="{{ route('product-edit', $product->id) }}" class="px-2 text-blue-600 hover:text-blue-800">Edit</a>
                <button class="px-2 text-red-600 hover:text-red-800" onclick="confirmDelete('{{  route('product-delete', $product->id) }}')">Hapus</button>
              </td>
            </tr>
          @endforeach


          <!-- Tambahkan baris lainnya sesuai kebutuhan -->
        </tbody>
      </table>
      <div class="mt-4">
        <!-- {{ $products->links() }} -->
          {{ $products->appends(['search' => request('search')])->links() }}
      </div>
</div>
   


  <script>
    function confirmDelete(deleteUrl) {
            if (confirm('Apakah Anda yakin ingin menghapus product ini?')) {
                // Jika user mengonfirmasi, kita dapat membuat form dan mengirimkan permintaan delete
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;
   
                // Tambahkan CSRF token
                let csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);
   
                // Tambahkan method spoofing untuk DELETE (karena HTML form hanya mendukung GET dan POST)
                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
   
                // Tambahkan form ke body dan submit
                document.body.appendChild(form);
                form.submit();
            }
        }
  </script>




</x-app-layout>