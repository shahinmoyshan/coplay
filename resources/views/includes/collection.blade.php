@use('Spark\Support\Str')
@php
    $tabs = array_keys($collection);
@endphp
<section x-data="{ tabOpen: null }">
    <div class="flex justify-center md:justify-start" x-data="{
        /** time: {{ microtime() }} */
        init() {
            this.tabOpen = '{{ $tabs[0] }}';
        }
    }">
        @foreach ($tabs as $tab)
            <button x-on:click="tabOpen = '{{ $tab }}'"
                :class="'border-b-4 text-lg font-semibold ml-4 first:ml-0 ' + (tabOpen === '{{ $tab }}' ?
                    'text-primary-50 border-accent-400' : 'text-primary-400 hover:text-primary-200 border-transparent')">{{ __(Str::headline($tab)) }}</button>
        @endforeach
    </div>
    @php
        $key = 0;
    @endphp
    @foreach ($collection as $tab => $videos)
        <div {{ $key++ > 0 ? 'x-cloak' : '' }} x-show="tabOpen === '{{ $tab }}'" x-transition
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach ($videos as $video)
                <x-video-card :$video />
            @endforeach
        </div>
    @endforeach
</section>
