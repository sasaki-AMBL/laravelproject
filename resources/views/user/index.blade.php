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
                    You're logged in!
                </div>
                @foreach($products as $product)
                     <td><a href="{{ route('user.show',['id'=>$product->category_id])}}"
                        class="btn btn-primary"> {{ $product->name }}</a></td>
                      <br><br>
                    @endforeach
                    <td><a href="{{ route('user.history')}}">履歴</a></td>
            </div>
        </div>
        {!! $products->links() !!}
    </div>
</x-app-layout>
