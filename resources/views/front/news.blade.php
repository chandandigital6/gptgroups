@extends('front_pages.front_components.main')

@section('content')

@php
    $featuredFallbackImage = 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80';
    $newsFallbackImage = 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=1000&q=80';
@endphp

<style>
    .news-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .news-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .news-card-hover {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .news-card-hover:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 18px 48px rgba(15, 23, 42, .10);
    }

    .news-filter-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        padding: .65rem 1rem;
        font-size: .8rem;
        font-weight: 900;
        transition: all .25s ease;
    }

    .news-filter-link:hover {
        transform: translateY(-2px);
    }
</style>

{{-- 01. NEWS HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'news'])

{{-- 02. QUICK FACTS --}}
@include('front.sections.quick_facts', ['pageSlug' => 'news'])

{{-- 03. FEATURED UPDATE --}}
@if (isset($featuredUpdateSection) && $featuredUpdateSection)
    <section class="news-section-light py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div>
                    @if (!empty($featuredUpdateSection->label))
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $featuredUpdateSection->label }}
                        </p>
                    @endif

                    @if (!empty($featuredUpdateSection->title))
                        <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $featuredUpdateSection->title }}
                        </h2>
                    @endif

                    @if (!empty($featuredUpdateSection->description_1))
                        <p class="mt-4 text-base leading-7 text-slate-600">
                            {{ $featuredUpdateSection->description_1 }}
                        </p>
                    @endif

                    @if (!empty($featuredUpdateSection->description_2))
                        <p class="mt-3 text-base leading-7 text-slate-600">
                            {{ $featuredUpdateSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        @foreach ([1, 2] as $i)
                            @php
                                $featureTitle = $featuredUpdateSection->{'feature_' . $i . '_title'} ?? null;
                                $featureDescription = $featuredUpdateSection->{'feature_' . $i . '_description'} ?? null;
                            @endphp

                            @if ($featureTitle || $featureDescription)
                                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                    <div class="grid h-9 w-9 place-items-center rounded-xl {{ $i === 1 ? 'bg-blue-600' : 'bg-cyan-500' }} text-sm font-black text-white">
                                        ✓
                                    </div>

                                    @if ($featureTitle)
                                        <h3 class="mt-3 text-lg font-black text-slate-950">
                                            {{ $featureTitle }}
                                        </h3>
                                    @endif

                                    @if ($featureDescription)
                                        <p class="mt-1.5 text-sm leading-6 text-slate-600">
                                            {{ $featureDescription }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/15 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white p-3 shadow-xl">
                        <img
                            class="h-[280px] w-full rounded-[1.1rem] object-cover sm:h-[340px] lg:h-[390px]"
                            src="{{ !empty($featuredUpdateSection->image)
                                ? asset('storage/' . ltrim($featuredUpdateSection->image, '/'))
                                : $featuredFallbackImage }}"
                            alt="{{ $featuredUpdateSection->image_alt ?: ($featuredUpdateSection->title ?? 'GPT Group update') }}"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='{{ $featuredFallbackImage }}';"
                        >

                        @if (!empty($featuredUpdateSection->card_title) || !empty($featuredUpdateSection->card_description))
                            <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-md">
                                @if (!empty($featuredUpdateSection->card_title))
                                    <p class="text-lg font-black text-slate-950">
                                        {{ $featuredUpdateSection->card_title }}
                                    </p>
                                @endif

                                @if (!empty($featuredUpdateSection->card_description))
                                    <p class="mt-1.5 text-sm font-semibold leading-6 text-slate-600">
                                        {{ $featuredUpdateSection->card_description }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif

{{-- 04. CATEGORY FILTER --}}
@if (isset($categories) && $categories->count())
    <section class="border-y border-slate-100 bg-white py-5">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-2">
                <a
                    href="{{ route('news') }}"
                    class="news-filter-link {{ !isset($category) ? 'bg-blue-600 text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    All News
                </a>

                @foreach ($categories as $cat)
                    <a
                        href="{{ route('front.news.category', $cat->slug) }}"
                        class="news-filter-link {{ isset($category) && $category->id === $cat->id ? 'bg-blue-600 text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                    >
                        {{ $cat->name }}

                        @if (isset($cat->posts_count))
                            <span class="ml-1 opacity-70">
                                ({{ $cat->posts_count }})
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- 05. NEWS LIST --}}
@if (isset($newsPosts))
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    {{ isset($category) ? $category->name : 'Latest News' }}
                </p>

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    News, launches and announcements.
                </h2>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    Read product launches, offers, events and official GPT Group updates.
                </p>
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($newsPosts as $post)
                    @php
                        $theme = $post->category?->theme ?? 'blue';

                        $badgeClass = match ($theme) {
                            'cyan' => 'bg-cyan-500',
                            'pink' => 'bg-pink-500',
                            'slate' => 'bg-slate-800',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <article class="group news-card-hover overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
                        <div class="relative h-44 overflow-hidden sm:h-48">
                            <img
                                src="{{ !empty($post->image)
                                    ? asset('storage/' . ltrim($post->image, '/'))
                                    : $newsFallbackImage }}"
                                alt="{{ $post->image_alt ?: $post->title }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='{{ $newsFallbackImage }}';"
                            >

                            @if ($post->category)
                                <span class="absolute left-4 top-4 rounded-full {{ $badgeClass }} px-3 py-1.5 text-[11px] font-black text-white">
                                    {{ $post->category->name }}
                                </span>
                            @endif
                        </div>

                        <div class="p-5">
                            @if ($post->published_date)
                                <p class="text-[11px] font-bold uppercase tracking-[.16em] text-slate-400">
                                    {{ $post->published_date->format('d M Y') }}
                                </p>
                            @endif

                            @if ($post->small_title)
                                <p class="mt-2 text-xs font-bold text-blue-700">
                                    {{ $post->small_title }}
                                </p>
                            @endif

                            <h3 class="mt-2 text-xl font-black leading-tight text-slate-950">
                                {{ $post->title }}
                            </h3>

                            @if ($post->excerpt)
                                <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            <a
                                href="{{ route('front.news.show', $post->slug) }}"
                                class="mt-4 inline-flex rounded-full bg-blue-600 px-5 py-2.5 text-xs font-black text-white transition hover:bg-blue-500"
                            >
                                Read More
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full rounded-2xl border border-slate-100 bg-slate-50 p-8 text-center">
                        <h3 class="text-xl font-black text-slate-950">
                            No news found
                        </h3>

                        <p class="mt-2 text-sm text-slate-600">
                            News posts will appear here soon.
                        </p>
                    </div>
                @endforelse
            </div>

            @if (method_exists($newsPosts, 'links'))
                <div class="mt-8">
                    {{ $newsPosts->links() }}
                </div>
            @endif

        </div>
    </section>
@endif

{{-- 06. FAQ --}}
@if (isset($faqSection) && $faqSection && $faqSection->activeItems->count())
    <section class="news-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 lg:grid-cols-2 lg:gap-10 lg:px-8">

            <div>
                @if (!empty($faqSection->label))
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $faqSection->label }}
                    </p>
                @endif

                @if (!empty($faqSection->title))
                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $faqSection->title }}
                    </h2>
                @endif

                @if (!empty($faqSection->description))
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        {{ $faqSection->description }}
                    </p>
                @endif

                @if (!empty($faqSection->button_text))
                    <a
                        href="{{ $faqSection->button_link ?: '#' }}"
                        class="mt-5 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        {{ $faqSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="grid gap-3">
                @foreach ($faqSection->activeItems as $faq)
                    <details
                        class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm"
                        {{ $faq->is_open ? 'open' : '' }}
                    >
                        <summary class="cursor-pointer text-sm font-black text-slate-950 sm:text-base">
                            {{ $faq->question }}
                        </summary>

                        @if (!empty($faq->answer))
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $faq->answer }}
                            </p>
                        @endif
                    </details>
                @endforeach
            </div>

        </div>
    </section>
@endif

{{-- 07. CTA --}}
<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">
            <div class="grid items-center gap-6 lg:grid-cols-2">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                        Stay Updated
                    </p>

                    <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Connect with GPT Group for the latest updates.
                    </h2>

                    <p class="mt-3 text-base leading-7 text-blue-50">
                        Get information about launches, offers, retail events, partner programs and B2B opportunities.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                    >
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection