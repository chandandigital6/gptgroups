@extends('mainpage.components.main')

@section('content')

<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                News
            </p>

            <h1 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                News & announcements.
            </h1>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                Explore latest product launches, offers, events and GPT Group updates.
            </p>
        </div>

        <div class="mt-10 flex flex-wrap justify-center gap-3">
            <a href="{{ route('front.news.index') }}"
               class="rounded-full {{ !isset($category) ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700' }} px-5 py-3 text-sm font-black">
                All
            </a>

            @foreach($categories as $cat)
                <a href="{{ route('front.news.category', $cat->slug) }}"
                   class="rounded-full {{ isset($category) && $category->id === $cat->id ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700' }} px-5 py-3 text-sm font-black">
                    {{ $cat->name }}
                    <span class="ml-1 opacity-70">({{ $cat->posts_count }})</span>
                </a>
            @endforeach
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse($newsPosts as $post)
                @php
                    $theme = $post->category?->theme ?? 'blue';

                    $badgeClass = match($theme) {
                        'cyan' => 'bg-cyan-500',
                        'pink' => 'bg-pink-500',
                        'slate' => 'bg-slate-800',
                        default => 'bg-blue-600',
                    };
                @endphp

                <article class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                    <div class="relative h-60 overflow-hidden">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}"
                                 alt="{{ $post->image_alt ?: $post->title }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                        @endif

                        @if($post->category)
                            <span class="absolute left-5 top-5 rounded-full {{ $badgeClass }} px-4 py-2 text-xs font-black text-white">
                                {{ $post->category->name }}
                            </span>
                        @endif
                    </div>

                    <div class="p-7">
                        @if($post->published_date)
                            <p class="text-xs font-bold uppercase tracking-[.2em] text-slate-400">
                                {{ $post->published_date->format('d M Y') }}
                            </p>
                        @endif

                        @if($post->small_title)
                            <p class="mt-3 text-sm font-bold text-blue-700">
                                {{ $post->small_title }}
                            </p>
                        @endif

                        <h2 class="mt-3 text-2xl font-black text-slate-950">
                            {{ $post->title }}
                        </h2>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $post->excerpt }}
                        </p>

                        <a href="{{ route('front.news.show', $post->slug) }}"
                           class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                            Read More
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center">
                    <h3 class="text-2xl font-black text-slate-950">No news found</h3>
                    <p class="mt-2 text-slate-600">News posts will appear here soon.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $newsPosts->links() }}
        </div>

    </div>
</section>

@endsection