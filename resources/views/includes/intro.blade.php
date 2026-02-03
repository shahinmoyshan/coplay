<section class="mb-6 text-center md:text-left">
    @isset($title)
        <h2 class="font-semibold text-2xl">{{ $title }}</h2>
    @endisset
    @isset($description)
        <p class="mt-2">{{ $description }}</p>
    @endisset
</section>
