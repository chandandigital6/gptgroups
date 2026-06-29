@extends('front_pages.front_components.main')

@section('content')

<style>
    .news-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .news-detail-content p {
        margin-top: 1rem;
        line-height: 1.9;
        color: #475569;
        font-size: 1.05rem;
    }

    .news-card-hover {
        transition: all .35s ease;
    }

    .news-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }
</style>

<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

        <div class="text-center">
            @if($newsPost->category)
                <a href="{{ route('front.news.category', $newsPost->category->slug) }}"
                   class="inline-flex rounded-full bg-blue-600 px-5 py-2 text-xs font-black uppercase tracking-[.2em] text-white">
                    {{ $newsPost->category->name }}
                </a>
            @endif

            @if($newsPost->published_date)
                <p class="mt-5 text-sm font-bold uppercase tracking-[.25em] text-slate-400">
                    {{ $newsPost->published_date->format('d M Y') }}
                </p>
            @endif

            @if($newsPost->small_title)
                <p class="mt-5 text-base font-black text-blue-700">
                    {{ $newsPost->small_title }}
                </p>
            @endif

            <h1 class="mt-5 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                {{ $newsPost->title }}
            </h1>

            @if($newsPost->excerpt)
                <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-slate-600">
                    {{ $newsPost->excerpt }}
                </p>
            @endif
        </div>

        @if($newsPost->image)
            <div class="mt-12 overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white shadow-xl">
                <img src="{{ asset('storage/' . $newsPost->image) }}"
                     alt="{{ $newsPost->image_alt ?: $newsPost->title }}"
                     class="h-[360px] w-full object-cover lg:h-[520px]">
            </div>
        @endif

        @if($newsPost->content)
            <div class="news-detail-content mt-12 rounded-[2rem] border border-slate-100 bg-slate-50 p-8 sm:p-10">
                {!! nl2br(e($newsPost->content)) !!}
            </div>
        @endif

        <div class="mt-12 flex flex-wrap gap-4">
            <a href="{{ route('news') }}"
               class="rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-sm">
                Back To News
            </a>

            <a href="{{ route('contact') }}"
               class="rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white">
                Share Enquiry
            </a>
        </div>

    </div>
</section>

@if($relatedPosts->count())
    <section class="bg-slate-50 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Related Updates
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl">
                    More news you may like.
                </h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach($relatedPosts as $related)
                    <a href="{{ route('front.news.show', $related->slug) }}"
                       class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                        @if($related->image)
                            <div class="h-52 overflow-hidden">
                                <img src="{{ asset('storage/' . $related->image) }}"
                                     alt="{{ $related->image_alt ?: $related->title }}"
                                     class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                        @endif

                        <div class="p-6">
                            @if($related->category)
                                <p class="text-xs font-bold uppercase tracking-[.2em] text-blue-700">
                                    {{ $related->category->name }}
                                </p>
                            @endif

                            <h3 class="mt-3 text-xl font-black text-slate-950">
                                {{ $related->title }}
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ $related->excerpt }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
@endif

@endsection