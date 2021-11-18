<x-app-layout>
    {{-- @if (session()->exists('message')) --}}
    {{-- <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ session('message') }}
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    {{-- @endif --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <table>
            <thead class="border">
                <th class="border">
                    Name
                </th>
                <th class="border">
                    URL
                </th>
                <th class="border">
                    Number of clicks
                </th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border">
                        <td class="border">
                            {{ $product->product_name }}
                        </td>
                        <td class="border">
                            {{ $product->product_url }}
                        </td>
                        <td class="border">
                            {{ $product->click_amount }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>
