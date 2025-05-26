@forelse ($orders as $order)
    <tr>
        <td>{{ $order->orderId ?? 'N/A' }}</td>
        <td>{{ $order->name ?? 'N/A' }}</td>
        <td>{{ $order->email ?? 'N/A' }}</td>
        <td>{{ $order->phone ?? 'N/A' }}</td>
        <td>{{ $order->country ?? 'N/A' }}</td>
        <td>{{ $order->vendor->name ?? 'N/A' }}</td>
        <td>
            @if ($order->status == 'in-progress')
                <button class="btn btn-sm btn-warning">In Progress</button>
            @elseif($order->status == 'packing')
                <button class="btn btn-sm btn-dark">Packing</button>
            @elseif($order->status == 'ready to deliver')
                <button class="btn btn-sm btn-info">Ready To Deliver</button>
            @elseif($order->status == 'delivered')
                <button class="btn btn-sm btn-primary">Delivered</button>
            @elseif($order->status == 'completed')
                <button class="btn btn-sm btn-success">Completed</button>
            @else
                N/A
            @endif
        </td>
        <td>{{ $order->created_at->format('Y-m-d') }}</td>
        <td class="text-center">
            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-dark btn-sm">
                <i class="fas fa-eye"></i>
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9" class="text-center">No orders found</td>
    </tr>
@endforelse
