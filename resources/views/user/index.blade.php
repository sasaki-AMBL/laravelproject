<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('user.index') }}" method="GET">
                        <input type="search" name="search">
                        <select name="category_id">
                            <option selected></option>
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        カテゴリー選択
                        <input type="radio" name="sort" value="asc" checked>昇順
                        <input type="radio" name="sort" value="desc">降順
                        <input type="submit" name="submit" value="検索">
                    </form>
                </div>
                @foreach($products as $product)
                     <td><a href="{{ route('user.show',['id'=>$product->category_id])}}"
                        class="btn btn-primary"> {{ $product->name }}</a></td>
                      <br><br>
                    @endforeach
                    <td><a href="{{ route('user.history')}}">履歴</a></td>
            </div>
        </div>
        {{--!! $products->links() !!--}}
        {{ $products->appends(request()->query())->links() }}
    </div>
</x-app-layout>
