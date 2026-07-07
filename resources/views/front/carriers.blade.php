@extends('front_pages.front_components.main')

@section('content')

    <style>
        .career-soft-bg {
            background:
                radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
                radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
                linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
        }

        .career-gradient-text {
            background: linear-gradient(90deg, #2563eb, #06b6d4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .career-blob {
            filter: blur(10px);
            opacity: .45;
            animation: careerBlob 7s ease-in-out infinite alternate;
        }

        @keyframes careerBlob {
            from {
                transform: translateY(0) scale(1);
            }

            to {
                transform: translateY(18px) scale(1.06);
            }
        }

        .career-card-hover {
            transition: all .35s ease;
        }

        .career-card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
        }

        .career-section-light {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .career-section-soft {
            background:
                radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
                linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
        }

        .career-input {
            width: 100%;
            border-radius: 1rem;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            padding: 1rem 1.25rem;
            color: #0f172a;
            outline: none;
            transition: all .25s ease;
        }

        .career-input::placeholder {
            color: #94a3b8;
        }

        .career-input:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
        }
    </style>


    {{-- CAREERS HERO --}}
    @include('front.sections.page_hero', ['pageSlug' => 'carriers'])

    {{-- CAREER STATS --}}
    @include('front.sections.quick_facts', ['pageSlug' => 'carriers'])


    {{-- INTRO --}}

    @include('front.sections.common_split_section', [
        'pageSlug' => 'carriers',
        'sectionKey' => 'career-growth',
    ])



    {{-- WHY WORK WITH US --}}


    @if ($whyWorkSection && $whyWorkSection->activeItems->count())
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="mx-auto max-w-3xl text-center">
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        {{ $whyWorkSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $whyWorkSection->title }}
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        {{ $whyWorkSection->description }}
                    </p>
                </div>

                <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
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

                        <div class="career-card-hover rounded-[2rem] border {{ $boxClass }} p-7">
                            <div
                                class="grid h-14 w-14 place-items-center rounded-2xl {{ $iconClass }} text-2xl font-black text-white">
                                {{ $item->icon_text }}
                            </div>

                            <h3 class="mt-6 text-xl font-black text-slate-950">
                                {{ $item->title }}
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ $item->description }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif


    {{-- OPEN POSITIONS --}}

    @php
    $openPositionsSection = $careerSections['open_positions'] ?? null;
    $hiringProcessSection = $careerSections['hiring_process'] ?? null;
    $applyFormSection = $careerSections['apply_form'] ?? null;
@endphp

  
 <section id="open-positions" class="career-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $openPositionsSection->label ?? 'Open Positions' }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $openPositionsSection->title ?? 'Available Jobs' }}
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    {{ $openPositionsSection->description ?? 'Select the role that matches your profile and submit your application.' }}
                </p>
            </div>

            <a href="{{ $openPositionsSection->button_url ?? '#apply-now' }}"
               class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                {{ $openPositionsSection->button_text ?? 'Submit Application' }}
            </a>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
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

                <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-sm">
                    <div class="flex items-start justify-between gap-4">
                        <div class="grid h-14 w-14 place-items-center rounded-2xl {{ $iconClass }} text-xl font-black">
                            {{ $letter }}
                        </div>

                        <span class="rounded-full px-4 py-2 text-xs font-black {{ $badgeClass }}">
                            {{ $job->job_type }}
                        </span>
                    </div>

                    <h3 class="mt-7 text-2xl font-black text-slate-950">
                        {{ $job->title }}
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        {{ $job->short_description }}
                    </p>

                    <div class="mt-6 flex flex-wrap gap-2">
                        @if($job->location)
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
                                {{ $job->location }}
                            </span>
                        @endif

                        @if($job->experience)
                            <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                                {{ $job->experience }}
                            </span>
                        @endif
                    </div>

                    <a href="#apply-now"
                       onclick="document.getElementById('job_position_id').value='{{ $job->id }}'"
                       class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Apply Now
                    </a>
                </div>
            @empty
                <div class="col-span-full rounded-[2rem] border border-slate-100 bg-white p-10 text-center shadow-sm">
                    <h3 class="text-2xl font-black text-slate-950">
                        No Open Position Available
                    </h3>
                </div>
            @endforelse
        </div>

    </div>
</section>

    {{-- PROCESS --}}

    <section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $hiringProcessSection->label ?? 'Hiring Process' }}
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $hiringProcessSection->title ?? 'Simple steps to join GPT Group.' }}
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    {{ $hiringProcessSection->description ?? 'Apply for a suitable role, share your details and our HR team can connect with you for the next steps.' }}
                </p>
            </div>

            <div class="grid gap-5">
                @forelse($hiringProcessSteps as $step)
                    @php
                        $boxClass = match ($step->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'green' => 'border-green-100 bg-green-50',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-slate-100 bg-slate-50',
                        };

                        $iconClass = match ($step->theme) {
                            'cyan' => 'bg-cyan-500',
                            'green' => 'bg-green-500',
                            'slate' => 'bg-slate-700',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="flex gap-5 rounded-[2rem] border {{ $boxClass }} p-6">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl {{ $iconClass }} font-black text-white">
                            {{ $step->icon_text ?: $loop->iteration }}
                        </div>

                        <div>
                            <h3 class="text-xl font-black text-slate-950">
                                {{ $step->title }}
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $step->description }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">
                            Hiring process coming soon.
                        </h3>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</section>


    {{-- APPLY FORM --}}
    
    <section id="apply-now" class="career-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    {{ $applyFormSection->label ?? 'Apply Now' }}
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    {{ $applyFormSection->title ?? 'Start your career with GPT Group.' }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    {{ $applyFormSection->description ?? 'Fill this form to apply for any open position.' }}
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">
                            {{ $applyFormSection->email_title ?? 'Email' }}
                        </h3>
                        <p class="mt-2 text-sm text-blue-50">
                            {{ $applyFormSection->email ?? 'info@gptgroups.com' }}
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">
                            {{ $applyFormSection->phone_title ?? 'Helpline' }}
                        </h3>
                        <p class="mt-2 text-sm text-blue-50">
                            {{ $applyFormSection->phone ?? '+968 2450-1533' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 shadow-2xl sm:p-10">

                @if(session('success'))
                    <div class="mb-5 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-bold text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-bold text-red-700">
                        Please check the form and try again.
                    </div>
                @endif

                <form action="{{ route('career.apply') }}" method="POST" enctype="multipart/form-data" class="grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name *</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}"
                                   class="career-input" placeholder="Enter full name" required>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="career-input" placeholder="Enter email" required>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   class="career-input" placeholder="Enter phone number">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Position *</label>
                            <select id="job_position_id" name="job_position_id" class="career-input" required>
                                <option value="">Select Position</option>
                                @foreach ($jobPositions as $job)
                                    <option value="{{ $job->id }}" @selected(old('job_position_id') == $job->id)>
                                        {{ $job->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Current Location</label>
                        <input type="text" name="current_location" value="{{ old('current_location') }}"
                               class="career-input" placeholder="Example: Muscat, Oman">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Upload CV</label>
                        <input type="file" name="cv" class="career-input text-sm" accept=".pdf,.doc,.docx">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea name="message" rows="4" class="career-input resize-none"
                                  placeholder="Write short message">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit"
                            class="mt-2 inline-flex justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        Submit Application
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>


    {{-- CTA --}}
    
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
                <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-100">
                            Build Your Future
                        </p>

                        <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                            Grow with a dynamic business group.
                        </h2>

                        <p class="mt-5 text-lg leading-8 text-blue-50">
                            Join GPT Group and become part of a team focused on service, growth, innovation and customer
                            success.
                        </p>
                    </div>

                    <div class="lg:text-right">
                        <a href="#open-positions"
                            class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                            View Jobs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
