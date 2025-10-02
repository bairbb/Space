<div>
    <ul>
        @foreach ($districts as $district)
            <li wire:key="{{ $district->id }}">
                {{ $district->title }}
            </li>
        @endforeach
    </ul>
    {{-- <p>{{ $districts }}</p> --}}
</div>
