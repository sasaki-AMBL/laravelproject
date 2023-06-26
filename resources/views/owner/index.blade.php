<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        出品商品一覧
        </h2>
    </x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
          <div class="mb-8">

          </div>
          @foreach ($products as $product)
            <a href="{{ route('owner.item.edit' ,$product->id) }}"> {{ $product->name }}</a><br>
          @endforeach

          </div>
          <a href="{{ route('owner.item.create') }}">新規商品登録</a>

        </div>
    </div>
</div>
</x-app-layout>
