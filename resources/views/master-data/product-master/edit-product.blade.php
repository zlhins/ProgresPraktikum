<x-app-layout>
    <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Dashboard') }}
      </h2>
    </x-slot>    
       
    <div class="py-12">
       
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="mb-5 text-2xl font-bold">Update Product</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />
                        @if ($errors->any())
                        <div class="mb-5 text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                            {{ $errors }}
                            @endforeach
                        </div>
                        @endif
            <form action="{{ route('product-update', $product->id) }}" method="POST" class="p-6 bg-white rounded shadow-md">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label for="product_name" class="block font-medium text-gray-700">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>




                <div class="mb-4">
                    <label for="unit" class="block font-medium text-gray-700">Unit:</label>
                     <select id="unit" name="unit"
                                    class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    required>
                                    <option value="" disabled>Select a unit</option>
                                    <option value="kg" {{ old('unit', $product->unit) == 'kg' ? 'selected' : '' }}>
                                        Kilogram (kg)</option>
                                    <option value="ltr" {{ old('unit', $product->unit) == 'ltr' ? 'selected' : '' }}>
                                        Liter (ltr)</option>
                                    <option value="pcs" {{ old('unit', $product->unit) == 'pcs' ? 'selected' : '' }}>
                                        Pieces (pcs)</option>
                                    <option value="box" {{ old('unit', $product->unit) == 'box' ? 'selected' : '' }}>
                                        Box</option>
                                </select>
                </div>


                <div class="mb-4">
                    <label for="type" class="block font-medium text-gray-700">Type:</label>
                    <input type="text" id="type" name="type" value="{{ old('type', $product->type) }}" required class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>


                <div class="mb-4">
                    <label for="information" class="block font-medium text-gray-700">Information:</label>
                    <textarea id="information" name="information" class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">{{ old('information', $product->information) }}</textarea>
                </div>


                <div class="mb-4">
                    <label for="qty" class="block font-medium text-gray-700">Qty:</label>
                    <input type="number" id="qty" name="qty" value="{{ old('qty', $product->qty) }}" required class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>


                <div class="mb-6">
                    <label for="producer" class="block font-medium text-gray-700">Producer:</label>
                    <input type="text" id="producer" name="producer" value="{{ old('producer', $product->producer) }}" required class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                </div>


                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 text-green bg-indigo-500 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-indigo-500">Update Product</button>
                </div>
            </form>
        </div>
        </div>
        </div>
    </div>
    </x-app-layout>
