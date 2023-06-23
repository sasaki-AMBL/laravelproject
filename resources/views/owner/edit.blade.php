<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        商品情報変更
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @foreach ($errors->all() as $error)
                    <li> <span class="error">{{ $error }}</span></li>
                    @endforeach

                    <form action="{{ route('owner.update', $product->id) }}" method="post">
                    @csrf
                        <div>
                            <label for="name">商品名</label>
                            <input type="text" id="name" name="name" value="{{ $product->name }}">
                        </div>
                        <div>
                            <label for="price">価格</label>
                            <input type="number" id="price" name="price" value="{{ $product->price }}">
                        </div>
                        <div>
                            <label for="stock">追加数</label>
                            <input type="number" id="stock" name="stock" value="0">
                        </div>
                        <div>
                            <label for="display">公開しますか？</label>
                            <input type="radio" name="display" value="0" checked>表示
                            <input type="radio" name="display" value="1">非表示
                        </div>



                        <div>
                            <input type="submit" value="更新"/>
                        </div>
                        <div>
                            <input type="button" value="戻る" onclick="history.back();">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
