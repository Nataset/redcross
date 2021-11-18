<x-app-layout>
    <x-slot name="status">
        @if (session()->exists('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-slot>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot> --}}
    <x-slot name="slot">
        <table class="mx-auto my-14 shadow-xl">
            <thead class=" text-2xl">
                <th class="border-r-2 py-4 px-8  border-gray-600">
                    No.
                </th>
                <th class="border-r-2 py-4 px-8  border-gray-600">
                    Product's Name
                </th>
                <th class="border-r-2 py-4 px-8 border-gray-600">
                    Product's URL
                </th>
                <th class="border-r-2 border-gray-600 py-4 px-8">
                    Number of clicks
                </th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-2 border-gray-600 text-xl">
                        <td class="border-2 py-2 px-4 border-gray-600">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="border-2 border-gray-600 py-2 px-4">
                            {{ $product->product_name }}
                        </td>
                        <td class="border-2 border-gray-600 py-2 px-4">
                            {{ $product->product_url }}
                        </td>
                        <td class="border-2 py-2 px-4 border-gray-600 text-center">
                            {{ $product->click_amount }}
                        </td>
                        <td class="border-2 py-3 px-4 border-gray-600">
                            <a href="{{ url('/edit/product/' . $product->id) }} "
                                class="bg-yellow-400 px-6 py-1 rounded-lg font-bold mx-2 my-2 hover:bg-yellow-200 hover:text-gray-900  ">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>
