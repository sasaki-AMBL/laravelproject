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
                    画像：{{ optional($products)->image }}<br>
                    商品名: {{ ($products)->name }}<br>
                    価格: {{ optional($products)->price }}<br>
                    在庫：{{($products)->stock}}<br>
                    カテゴリー: {{ optional($products)->category_id }}<br>
                    <br><br>
    <form method="post" action="{{ route('user.store')}}">
    @csrf
        数量:
        <input type="number" name="amount" min="0" max="{{ $products->stock}}">
        <input type="hidden" name="product_id" value="{{$products->id}}">
        <button class="px-4 py-2 bg-blue-400 text-white" type="submit">購入</button>
    </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
