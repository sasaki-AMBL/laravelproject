<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">
                    </div>
                    @foreach($products as $product)
                    画像：{{ optional($product)->image }}
                    商品名: {{ optional($product)->name }}
                    価格: {{ optional($product)->price }}
                    カテゴリー: {{ optional($product)->category_id }}
                    <br><br>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
