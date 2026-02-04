<div class="w-full max-w-lg mx-auto md:max-w-full md:w-8/12 lg:w-9/12">
    <div class="md:pl-5">
        <h2 class="hidden md:block text-2xl font-bold text-center sm:text-left">
            {{ $title }}
            <span
                class="text-primary-400 font-semibold">({{ carbon(strval($isTv ? $video->first_air_date : $video->release_date))->format('Y') }})</span>
        </h2>
        <section x-data="{ tabOpen: 'details' }" class="mt-5 text-center sm:text-left">
            <span x-init="() => {
                /** time: {{ microtime() }} */
                tabOpen = 'details';
            }"></span>

            @include('includes.video.parts.tabs')
            @include('includes.video.parts.details')
            @include('includes.video.parts.season')
            @include('includes.video.parts.clip')
            @include('includes.video.parts.people')
            @include('includes.video.similar')
        </section>
    </div>
</div>
