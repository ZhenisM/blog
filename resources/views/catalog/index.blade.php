<h1 class="text-2xl font-bold mb-4">Каталог товаров</h1>

@foreach($products as $product)
    <div class="border rounded p-4 mb-4">
        <h2 class="text-lg font-semibold">{{ $product['name'] }}</h2>

        @if(!empty($product['prices']))
            <ul class="mt-2 space-y-1">
                @foreach($product['prices'] as $price)
                    <li>
                        <span class="font-medium">{{ $price['type_name'] }}:</span>
                        {{ $price['price'] > 0 ? $price['price'] . ' ' . $price['currency'] : 'По запросу' }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Нет цен</p>
        @endif
    </div>
@endforeach