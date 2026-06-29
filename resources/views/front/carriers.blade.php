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
    'sectionKey' => 'career-growth'
])



{{-- WHY WORK WITH US --}}


@if($whyWorkSection && $whyWorkSection->activeItems->count())

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
                @foreach($whyWorkSection->activeItems as $item)

                    @php
                        $boxClass = match($item->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'blue' => 'border-blue-100 bg-blue-50',
                            'white' => 'border-slate-100 bg-white shadow-sm',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-slate-100 bg-slate-50',
                        };

                        $iconClass = match($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            'blue' => 'bg-blue-600',
                            'slate' => 'bg-slate-700',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="career-card-hover rounded-[2rem] border {{ $boxClass }} p-7">
                        <div class="grid h-14 w-14 place-items-center rounded-2xl {{ $iconClass }} text-2xl font-black text-white">
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
<section id="open-positions" class="career-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Open Positions
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Available Jobs
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Select the role that matches your profile and submit your application.
                </p>
            </div>

            <a href="#apply-now"
                class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                Submit Application
            </a>
        </div>

        @php
            $jobs = [
                [
                    'letter' => 'M',
                    'badge' => 'In-Office',
                    'badgeClass' => 'bg-green-50 text-green-700',
                    'title' => 'Marketing & Sales Intern - GlobeSpac',
                    'desc' => 'Develop and implement marketing campaigns to increase bookings and promote the property. Suitable for candidates interested in branding and customer engagement.',
                    'location' => 'Muscat, Oman',
                    'exp' => '0 Years',
                    'iconClass' => 'bg-blue-50 text-blue-700',
                ],
                [
                    'letter' => 'H',
                    'badge' => 'In-Office',
                    'badgeClass' => 'bg-green-50 text-green-700',
                    'title' => 'Marketing & Sales Intern - HikVision',
                    'desc' => 'Sales internship role focused on managing business partners, driving revenue growth, customer satisfaction and business targets.',
                    'location' => 'Muscat, Oman',
                    'exp' => 'Freshers / Experienced',
                    'iconClass' => 'bg-cyan-50 text-cyan-700',
                ],
                [
                    'letter' => 'N',
                    'badge' => 'In-Office',
                    'badgeClass' => 'bg-green-50 text-green-700',
                    'title' => 'Marketing & Sales - Nature Republic',
                    'desc' => 'Marketing campaign role for branding, customer engagement and promotional growth.',
                    'location' => 'Seeb, Oman',
                    'exp' => '0 Years',
                    'iconClass' => 'bg-pink-50 text-pink-700',
                ],
                [
                    'letter' => 'R',
                    'badge' => 'Hybrid',
                    'badgeClass' => 'bg-yellow-50 text-yellow-700',
                    'title' => 'Sales & Marketing Intern - Handset Retail',
                    'desc' => 'Manage business partners, drive revenue growth, ensure customer satisfaction and meet business targets.',
                    'location' => 'Seeb, Oman',
                    'exp' => 'Freshers / Experienced',
                    'iconClass' => 'bg-blue-50 text-blue-700',
                ],
                [
                    'letter' => 'M',
                    'badge' => 'In-Office',
                    'badgeClass' => 'bg-green-50 text-green-700',
                    'title' => 'Marketing Intern',
                    'desc' => 'Develop marketing campaigns, support promotions and assist with customer engagement activities.',
                    'location' => 'Seeb, Oman',
                    'exp' => '0 Years',
                    'iconClass' => 'bg-blue-50 text-blue-700',
                ],
                [
                    'letter' => 'F',
                    'badge' => 'In-Office',
                    'badgeClass' => 'bg-green-50 text-green-700',
                    'title' => 'Front Desk Receptionist',
                    'desc' => 'Be the face of the property, welcome guests, manage reservations, check-ins and customer inquiries.',
                    'location' => 'Seeb, Oman',
                    'exp' => 'Communication Skills',
                    'iconClass' => 'bg-purple-50 text-purple-700',
                ],
                [
                    'letter' => 'S',
                    'badge' => 'Hybrid',
                    'badgeClass' => 'bg-yellow-50 text-yellow-700',
                    'title' => 'Sales Intern',
                    'desc' => 'Support sales operations, business partner handling, revenue growth and customer satisfaction.',
                    'location' => 'Seeb, Oman',
                    'exp' => 'Freshers',
                    'iconClass' => 'bg-orange-50 text-orange-700',
                ],
                [
                    'letter' => 'E',
                    'badge' => 'In-Office',
                    'badgeClass' => 'bg-green-50 text-green-700',
                    'title' => 'Jr. Event Coordinator',
                    'desc' => 'Plan and execute corporate and social events. Suitable for creative candidates with strong organization skills.',
                    'location' => 'Muscat, Oman',
                    'exp' => '0 Years',
                    'iconClass' => 'bg-emerald-50 text-emerald-700',
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($jobs as $job)
                <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-sm">
                    <div class="flex items-start justify-between gap-4">
                        <div class="grid h-14 w-14 place-items-center rounded-2xl {{ $job['iconClass'] }} text-xl font-black">
                            {{ $job['letter'] }}
                        </div>

                        <span class="rounded-full px-4 py-2 text-xs font-black {{ $job['badgeClass'] }}">
                            {{ $job['badge'] }}
                        </span>
                    </div>

                    <h3 class="mt-7 text-2xl font-black text-slate-950">
                        {{ $job['title'] }}
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        {{ $job['desc'] }}
                    </p>

                    <div class="mt-6 flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
                            {{ $job['location'] }}
                        </span>

                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                            {{ $job['exp'] }}
                        </span>
                    </div>

                    <a href="#apply-now"
                        class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Apply Now
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>


{{-- PROCESS --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Hiring Process
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Simple steps to join GPT Group.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Apply for a suitable role, share your details and our HR team can connect with you for the next steps.
                </p>
            </div>

            <div class="grid gap-5">
                <div class="flex gap-5 rounded-[2rem] border border-slate-100 bg-slate-50 p-6">
                    <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-600 font-black text-white">1</div>
                    <div>
                        <h3 class="text-xl font-black text-slate-950">Choose Role</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Select an open position matching your skill and location preference.</p>
                    </div>
                </div>

                <div class="flex gap-5 rounded-[2rem] border border-slate-100 bg-slate-50 p-6">
                    <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-600 font-black text-white">2</div>
                    <div>
                        <h3 class="text-xl font-black text-slate-950">Submit Application</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Fill the form with your contact details and profile summary.</p>
                    </div>
                </div>

                <div class="flex gap-5 rounded-[2rem] border border-cyan-100 bg-cyan-50 p-6">
                    <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-cyan-500 font-black text-white">3</div>
                    <div>
                        <h3 class="text-xl font-black text-slate-950">HR Review</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Shortlisted candidates may be contacted for discussion or interview.</p>
                    </div>
                </div>
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
                    Apply Now
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Start your career with GPT Group.
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Fill this form to apply for any open position. Backend me aap is form ko email, database ya CRM ke saath connect kar sakte hain.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <p class="mt-2 text-sm text-blue-50">info@gptgroups.com</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Helpline</h3>
                        <p class="mt-2 text-sm text-blue-50">+968 2450-1533</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 shadow-2xl sm:p-10">
                <form action="#" method="POST" enctype="multipart/form-data" class="grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name</label>
                            <input type="text" name="name" class="career-input" placeholder="Enter full name">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Email</label>
                            <input type="email" name="email" class="career-input" placeholder="Enter email">
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone</label>
                            <input type="text" name="phone" class="career-input" placeholder="Enter phone number">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Position</label>
                            <select name="position" class="career-input">
                                <option value="">Select Position</option>
                                @foreach ($jobs as $job)
                                    <option>{{ $job['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Current Location</label>
                        <input type="text" name="location" class="career-input" placeholder="Example: Muscat, Oman">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Upload CV</label>
                        <input type="file" name="cv" class="career-input text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea name="message" rows="4" class="career-input resize-none" placeholder="Write short message"></textarea>
                    </div>

                    <button
                        type="submit"
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
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Build Your Future
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Grow with a dynamic business group.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Join GPT Group and become part of a team focused on service, growth, innovation and customer success.
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
