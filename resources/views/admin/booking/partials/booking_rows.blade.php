@forelse ($bookings as $key => $booking)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $booking->user->name ?? 'N/A' }}</td>
        <td>{{ $booking->vendor->name ?? 'N/A' }}</td>
        <td>{{ $booking->service->name ?? 'N/A' }}</td>
        <td>
            {{ $booking->availability->time_slot 
                ? \Carbon\Carbon::parse($booking->availability->time_slot)->format('Y-m-d h:i A') 
                : 'N/A' }}
        </td>
        <td>{{ $booking->date ?? 'N/A' }}</td>
        <td>{{ $booking->note ?? 'N/A' }}</td>
        <td>
            @if ($booking->status == 'pending')
                <button class="btn btn-sm btn-warning">Pending</button>
            @elseif($booking->status == 'confirmed')
                <button class="btn btn-sm btn-warning">Confirmed</button>
            @elseif($booking->status == 'cancelled')
                <button class="btn btn-sm btn-danger">Cancelled</button>
            @elseif($booking->status == 'completed')
                <button class="btn btn-sm btn-success">Completed</button>
            @else
                N/A
            @endif
        </td>
        <td class="text-center">
            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-dark btn-sm">
                <i class="fas fa-eye"></i>
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9" class="text-center">No Booking found</td>
    </tr>
@endforelse
