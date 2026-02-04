<div class="bg-primary-900 p-2 rounded-sm mt-2 max-h-[65vh] overflow-y-auto">
    @if (!empty($results))
        @foreach ($results as $index => $video)
            <x-ajax-card :$video :$index />
        @endforeach
    @else
        <p class="text-primary-300 px-4 py-2 text-center">
            No Result for "{{ $keyword }}"
        </p>
    @endif
</div>
