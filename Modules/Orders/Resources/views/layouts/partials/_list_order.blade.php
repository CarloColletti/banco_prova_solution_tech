<div
    class="row border-bottom border-seccondary border-opacity-75 text-center py-3 align-items-center row-for-select-data">

    <div class="col">{{ $order->name }}</div>


    @if ($order->discount_type == 'fisso')
        <div class="col">{{ $order->discount }}€</div>
    @else
        <div class="col">{{ $order->discount }}%</div>
    @endif

    <div class="col">
        @foreach ($order->products as $product)
            <div>
                {{ $product->name }}
            </div>
        @endforeach
    </div>

    <div class="col">{{ $order->total_amount }}</div>
</div>
