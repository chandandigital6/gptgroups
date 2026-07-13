@extends('front_pages.front_components.main')

@section('content')

<style>
    html {
        scroll-behavior: smooth;
    }

    .career-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .career-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .career-card-hover {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .career-card-hover:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 18px 48px rgba(15, 23, 42, .10);
    }

    .career-input {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: .8rem;
        background: #ffffff;
        padding: .75rem 1rem;
        color: #0f172a;
        font-size: .875rem;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .career-input::placeholder {
        color: #94a3b8;
    }

    .career-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, .14);
    }
</style>

{{-- 01. CAREERS HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'carriers'])

{{-- 02. CAREER STATS --}}
@include('front.sections.quick_facts', ['pageSlug' => 'carriers'])

{{-- 03. CAREER INTRO --}}
@include('front.sections.common_split_section', [
    'pageSlug' => 'carriers',
    'sectionKey' => 'career-growth',
])

{{-- 04. WHY WORK WITH US --}}
@if (isset($whyWorkSection) && $whyWorkSection && $whyWorkSection->activeItems->count())
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                @if ($whyWorkSection->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $whyWorkSection->label }}
                    </p>
                @endif

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $whyWorkSection->title }}
                </h2>

                @if ($whyWorkSection->description)
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        {{ $whyWorkSection->description }}
                    </p>
                @endif
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                @foreach ($whyWorkSection->activeItems as $item)
                    @php
                        $boxClass = match ($item->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'blue' => 'border-blue-100 bg-blue-50',
                            'white' => 'border-slate-100 bg-white shadow-sm',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-slate-100 bg-slate-50',
                        };

                        $iconClass = match ($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            'blue' => 'bg-blue-600',
                            'slate' => 'bg-slate-700',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="career-card-hover rounded-2xl border {{ $boxClass }} p-5">
                        <div class="grid h-10 w-10 place-items-center rounded-xl {{ $iconClass }} text-sm font-black text-white">
                            {{ $item->icon_text ?: $loop->iteration }}
                        </div>

                        <h3 class="mt-4 text-lg font-black text-slate-950">
                            {{ $item->title }}
                        </h3>

                        @if ($item->description)
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $item->description }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif

@php
    $openPositionsSection = $careerSections['open_positions'] ?? null;
    $hiringProcessSection = $careerSections['hiring_process'] ?? null;
    $applyFormSection = $careerSections['apply_form'] ?? null;
@endphp

{{-- 05. OPEN POSITIONS --}}
<section id="open-positions" class="career-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-3xl">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    {{ $openPositionsSection->label ?? 'Open Positions' }}
                </p>

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $openPositionsSection->title ?? 'Available Jobs' }}
                </h2>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    {{ $openPositionsSection->description ?? 'Select the role that matches your profile and submit your application.' }}
                </p>
            </div>

            <a
                href="{{ $openPositionsSection->button_url ?? '#apply-now' }}"
                class="inline-flex w-fit rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
            >
                {{ $openPositionsSection->button_text ?? 'Submit Application' }}
            </a>
        </div>

        <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($jobPositions as $job)
                @php
                    $iconClass = match ($job->icon_theme) {
                        'cyan' => 'bg-cyan-50 text-cyan-700',
                        'pink' => 'bg-pink-50 text-pink-700',
                        'purple' => 'bg-purple-50 text-purple-700',
                        'orange' => 'bg-orange-50 text-orange-700',
                        'emerald' => 'bg-emerald-50 text-emerald-700',
                        'slate' => 'bg-slate-50 text-slate-700',
                        default => 'bg-blue-50 text-blue-700',
                    };

                    $badgeClass = match ($job->badge_theme) {
                        'yellow' => 'bg-yellow-50 text-yellow-700',
                        'blue' => 'bg-blue-50 text-blue-700',
                        'red' => 'bg-red-50 text-red-700',
                        'slate' => 'bg-slate-50 text-slate-700',
                        default => 'bg-green-50 text-green-700',
                    };

                    $letter = $job->icon_text ?: strtoupper(substr($job->title, 0, 1));
                @endphp

                <article class="career-card-hover rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between gap-4">
                        <div class="grid h-10 w-10 place-items-center rounded-xl {{ $iconClass }} text-sm font-black">
                            {{ $letter }}
                        </div>

                        @if ($job->job_type)
                            <span class="rounded-full px-3 py-1.5 text-[11px] font-black {{ $badgeClass }}">
                                {{ $job->job_type }}
                            </span>
                        @endif
                    </div>

                    <h3 class="mt-4 text-xl font-black text-slate-950">
                        {{ $job->title }}
                    </h3>

                    @if ($job->short_description)
                        <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">
                            {{ $job->short_description }}
                        </p>
                    @endif

                    <div class="mt-4 flex flex-wrap gap-2">
                        @if ($job->location)
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-[11px] font-bold text-slate-600">
                                {{ $job->location }}
                            </span>
                        @endif

                        @if ($job->experience)
                            <span class="rounded-full bg-blue-50 px-3 py-1 text-[11px] font-bold text-blue-700">
                                {{ $job->experience }}
                            </span>
                        @endif
                    </div>

                    <a
                        href="#apply-now"
                        onclick="document.getElementById('job_position_id').value='{{ $job->id }}'"
                        class="mt-5 inline-flex rounded-full bg-blue-600 px-5 py-2.5 text-xs font-black text-white transition hover:bg-blue-500"
                    >
                        Apply Now
                    </a>
                </article>
            @empty
                <div class="col-span-full rounded-2xl border border-slate-100 bg-white p-8 text-center shadow-sm">
                    <h3 class="text-xl font-black text-slate-950">
                        No Open Position Available
                    </h3>

                    <p class="mt-2 text-sm text-slate-600">
                        New opportunities will appear here soon.
                    </p>
                </div>
            @endforelse
        </div>

    </div>
</section>

{{-- 06. HIRING PROCESS --}}
<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-start gap-7 lg:grid-cols-[.85fr_1.15fr] lg:gap-10">

            <div>
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    {{ $hiringProcessSection->label ?? 'Hiring Process' }}
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $hiringProcessSection->title ?? 'Simple steps to join GPT Group.' }}
                </h2>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    {{ $hiringProcessSection->description ?? 'Apply for a suitable role and our HR team will guide you through the next steps.' }}
                </p>
            </div>

            <div class="grid gap-3 sm:grid-cols-2">
                @forelse ($hiringProcessSteps as $step)
                    @php
                        $boxClass = match ($step->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'green' => 'border-green-100 bg-green-50',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-blue-100 bg-blue-50',
                        };

                        $iconClass = match ($step->theme) {
                            'cyan' => 'bg-cyan-500',
                            'green' => 'bg-green-500',
                            'slate' => 'bg-slate-700',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="rounded-2xl border {{ $boxClass }} p-4">
                        <div class="grid h-9 w-9 place-items-center rounded-xl {{ $iconClass }} text-xs font-black text-white">
                            {{ $step->icon_text ?: $loop->iteration }}
                        </div>

                        <h3 class="mt-3 text-lg font-black text-slate-950">
                            {{ $step->title }}
                        </h3>

                        @if ($step->description)
                            <p class="mt-1.5 text-sm leading-6 text-slate-600">
                                {{ $step->description }}
                            </p>
                        @endif
                    </div>
                @empty
                    <div class="sm:col-span-2 rounded-2xl border border-slate-100 bg-slate-50 p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            Hiring process coming soon.
                        </h3>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</section>

{{-- 07. APPLY FORM --}}
<section id="apply-now" class="career-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-stretch gap-5 lg:grid-cols-[.85fr_1.15fr] lg:gap-7">

            <div class="rounded-[1.75rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-7 lg:p-8">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100 sm:text-sm">
                    {{ $applyFormSection->label ?? 'Apply Now' }}
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                    {{ $applyFormSection->title ?? 'Start your career with GPT Group.' }}
                </h2>

                <p class="mt-3 text-base leading-7 text-blue-50">
                    {{ $applyFormSection->description ?? 'Fill this form to apply for any available position.' }}
                </p>

                <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                    <div class="rounded-xl bg-white/15 p-4">
                        <h3 class="text-base font-black">
                            {{ $applyFormSection->email_title ?? 'Email' }}
                        </h3>
                        <p class="mt-1.5 break-words text-sm text-blue-50">
                            {{ $applyFormSection->email ?? 'info@gptgroups.com' }}
                        </p>
                    </div>

                    <div class="rounded-xl bg-white/15 p-4">
                        <h3 class="text-base font-black">
                            {{ $applyFormSection->phone_title ?? 'Helpline' }}
                        </h3>
                        <p class="mt-1.5 text-sm text-blue-50">
                            {{ $applyFormSection->phone ?? '+968 2450-1533' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-xl sm:p-7 lg:p-8">

                @if (session('success'))
                    <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-bold text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-bold text-red-700">
                        <p>Please check the form and try again.</p>

                        <ul class="mt-2 list-disc space-y-1 pl-5 text-xs font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ route('career.apply') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="grid gap-3"
                >
                    @csrf

                    <div class="grid gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-black text-slate-700">
                                Full Name *
                            </label>

                            <input
                                type="text"
                                name="full_name"
                                value="{{ old('full_name') }}"
                                class="career-input"
                                placeholder="Enter full name"
                                required
                            >
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-black text-slate-700">
                                Email *
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="career-input"
                                placeholder="Enter email"
                                required
                            >
                        </div>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-black text-slate-700">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="career-input"
                                placeholder="Enter phone number"
                            >
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-black text-slate-700">
                                Position *
                            </label>

                            <select id="job_position_id" name="job_position_id" class="career-input" required>
                                <option value="">Select Position</option>

                                @foreach ($jobPositions as $job)
                                    <option
                                        value="{{ $job->id }}"
                                        @selected(old('job_position_id') == $job->id)
                                    >
                                        {{ $job->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-black text-slate-700">
                                Current Location
                            </label>

                            <input
                                type="text"
                                name="current_location"
                                value="{{ old('current_location') }}"
                                class="career-input"
                                placeholder="Example: Muscat, Oman"
                            >
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-black text-slate-700">
                                Upload CV
                            </label>

                            <input
                                type="file"
                                name="cv"
                                class="career-input text-sm"
                                accept=".pdf,.doc,.docx"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-black text-slate-700">
                            Message
                        </label>

                        <textarea
                            name="message"
                            rows="3"
                            class="career-input resize-none"
                            placeholder="Write a short message"
                        >{{ old('message') }}</textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-1 inline-flex justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        Submit Application
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection