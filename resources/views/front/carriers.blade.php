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
<section class="relative overflow-hidden career-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 career-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 career-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Content --}}
            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    Careers at GPT Group
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Join Our
                    <span class="mt-2 block career-gradient-text">
                        Growing Team
                    </span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    GPT Group is always looking for passionate, motivated and talented people who want to grow in sales, marketing, retail, hospitality, IT services and operations.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#open-positions"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        View Open Positions
                    </a>

                    <a href="#apply-now"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Apply Now
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black career-gradient-text">8+</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Roles</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black career-gradient-text">Oman</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Location</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black career-gradient-text">0+</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Freshers</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black career-gradient-text">Hybrid</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Options</p>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <img
                        src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Group Careers"
                        class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            Learn. Perform. Lead.
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            A growth environment for motivated people across sales, retail, hospitality, IT and operations.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- CAREER STATS --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black career-gradient-text">8+</p>
                <p class="mt-2 font-bold text-slate-700">Open Roles</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Sales, marketing, retail and operations opportunities.</p>
            </div>

            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black career-gradient-text">Oman</p>
                <p class="mt-2 font-bold text-slate-700">Career Location</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Muscat and Seeb based openings.</p>
            </div>

            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black career-gradient-text">0+</p>
                <p class="mt-2 font-bold text-slate-700">Freshers Welcome</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Internships and entry-level opportunities.</p>
            </div>

            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black career-gradient-text">Hybrid</p>
                <p class="mt-2 font-bold text-slate-700">Work Options</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">In-office and hybrid positions available.</p>
            </div>
        </div>
    </div>
</section>


{{-- INTRO --}}
<section class="career-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Career Growth
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Great service starts with great people.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    At GPT Groups, career opportunities are built for people who want to learn, perform and grow. The group offers opportunities across sales, marketing, IT services, operations, hospitality and retail business functions.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Whether you are a fresher, intern or experienced professional, GPT Group gives you a platform to work with dynamic teams, business partners and customer-focused operations.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">01</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Training & Skill Growth</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Build practical sales, service, marketing and operations skills.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">02</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Real Business Exposure</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Work across products, partners, customers and live campaigns.</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img
                        class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80"
                        alt="GPT career team"
                    >

                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80"
                        alt="Team meeting"
                    >

                    <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                        <p class="text-4xl font-black career-gradient-text">Grow</p>
                        <p class="mt-3 text-lg font-bold text-slate-950">Learn. Perform. Lead.</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600">A career environment for motivated people.</p>
                    </div>

                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=80"
                        alt="Professional career"
                    >
                </div>
            </div>

        </div>
    </div>
</section>


{{-- WHY WORK WITH US --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                Why Work With GPT Groups?
            </p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                A workplace designed for growth.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT Group focuses on excellence, career development, recognition, work-life balance and diverse career paths.
            </p>
        </div>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-7">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">01</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Culture of Excellence</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    High standards in service delivery and employee work culture.
                </p>
            </div>

            <div class="career-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-7">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">02</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Career Growth</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Training, skill development and leadership opportunities.
                </p>
            </div>

            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-7">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">03</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Rewards</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Recognition through awards, incentives, appraisals and promotions.
                </p>
            </div>

            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-7">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">04</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Work-Life Balance</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Positive work environment with flexible scheduling.
                </p>
            </div>

            <div class="career-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-7">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">05</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Diverse Paths</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Opportunities in hotel management, IT, sales, marketing and operations.
                </p>
            </div>
        </div>

    </div>
</section>


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
