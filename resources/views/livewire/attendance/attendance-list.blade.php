<tbody>
    {{-- In work, do what you enjoy. --}}
    {{-- <button wire:click="increment">Click me</button>
    <p>{{ $btnColor }}</p> --}}
    
    @foreach ($members as $member)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $member->fullname }}</td>
            <td>{{ ucwords($member->gender) }}</td>
            <td>{{ ucwords($member->location) }}</td>
            <td>
                <button wire:click="present({{ $member->id }})" class="btn btn-flat btn-sm btn-success">Present <i class="ti-check"></i></button>
            </td>
        </tr>
    @endforeach
</tbody>
