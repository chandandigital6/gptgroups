@extends('front_pages.front_components.main')

@section('content')

{{-- CAREERS HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1600&q=80"
            alt="GPT Group Careers"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                Careers at GPT Group
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                Join Our
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Growing Team
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                GPT Group is always looking for passionate, motivated and talented people who want to grow in sales, marketing, retail, hospitality, IT services and operations.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#open-positions" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    View Open Positions
                </a>
                <a href="#apply-now" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Apply Now
                </a>
            </div>
        </div>
    </div>
</section>


{{-- CAREER STATS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">8+</p>
                <p class="mt-2 font-bold text-slate-700">Open Roles</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Sales, marketing, retail and operations opportunities.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Oman</p>
                <p class="mt-2 font-bold text-slate-700">Career Location</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Muscat and Seeb based openings.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">0+</p>
                <p class="mt-2 font-bold text-slate-700">Freshers Welcome</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Internships and entry-level opportunities.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Hybrid</p>
                <p class="mt-2 font-bold text-slate-700">Work Options</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">In-office and hybrid positions available.</p>
            </div>
        </div>
    </div>
</section>


{{-- INTRO --}}
<section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Career Growth</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Great service starts with great people.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    At GPT Groups, career opportunities are built for people who want to learn, perform and grow. The group offers opportunities across sales, marketing, IT services, operations, hospitality and retail business functions.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Whether you are a fresher, intern or experienced professional, GPT Group gives you a platform to work with dynamic teams, business partners and customer-focused operations.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                        <h3 class="mt-5 text-xl font-black">Training & Skill Growth</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Build practical sales, service, marketing and operations skills.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                        <h3 class="mt-5 text-xl font-black">Real Business Exposure</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Work across products, partners, customers and live campaigns.</p>
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
                    <div class="rounded-[2rem] bg-slate-950 p-7 text-white shadow-xl">
                        <p class="text-4xl font-black">Grow</p>
                        <p class="mt-3 text-lg font-bold">Learn. Perform. Lead.</p>
                        <p class="mt-3 text-sm leading-6 text-slate-300">A career environment for motivated people.</p>
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
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Why Work With GPT Groups?</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                A workplace designed for growth.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT Group focuses on excellence, career development, recognition, work-life balance and diverse career paths.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-5 gap-5">
            <div class="rounded-[2rem] bg-slate-50 p-7 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">01</div>
                <h3 class="mt-6 text-xl font-black">Culture of Excellence</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    High standards in service delivery and employee work culture.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-7 text-white hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">02</div>
                <h3 class="mt-6 text-xl font-black">Career Growth</h3>
                <p class="mt-3 text-sm leading-7 text-slate-300">
                    Training, skill development and leadership opportunities.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-7 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">03</div>
                <h3 class="mt-6 text-xl font-black">Rewards</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Recognition through awards, incentives, appraisals and promotions.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-7 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">04</div>
                <h3 class="mt-6 text-xl font-black">Work-Life Balance</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Positive work environment with flexible scheduling.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-7 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">05</div>
                <h3 class="mt-6 text-xl font-black">Diverse Paths</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Opportunities in hotel management, IT, sales, marketing and operations.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- OPEN POSITIONS --}}
<section id="open-positions" class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Open Positions</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Available Jobs
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Select the role that matches your profile and submit your application.
                </p>
            </div>

            <a href="#apply-now" class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                Submit Application
            </a>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            {{-- Job 1 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-blue-700 font-black text-xl">M</div>
                    <span class="rounded-full bg-green-50 px-4 py-2 text-xs font-black text-green-700">In-Office</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Marketing & Sales Intern - GlobeSpac</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Develop and implement marketing campaigns to increase bookings and promote the property. Suitable for candidates interested in branding and customer engagement.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Muscat, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">0 Years</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

            {{-- Job 2 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-50 text-cyan-700 font-black text-xl">H</div>
                    <span class="rounded-full bg-green-50 px-4 py-2 text-xs font-black text-green-700">In-Office</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Marketing & Sales Intern - HikVision</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Sales internship role focused on managing business partners, driving revenue growth, customer satisfaction and business targets.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Muscat, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Freshers / Experienced</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

            {{-- Job 3 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-pink-50 text-pink-700 font-black text-xl">N</div>
                    <span class="rounded-full bg-green-50 px-4 py-2 text-xs font-black text-green-700">In-Office</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Marketing & Sales - Nature Republic</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Marketing campaign role for branding, customer engagement and promotional growth.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Seeb, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">0 Years</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

            {{-- Job 4 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-blue-700 font-black text-xl">R</div>
                    <span class="rounded-full bg-yellow-50 px-4 py-2 text-xs font-black text-yellow-700">Hybrid</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Sales & Marketing Intern - Handset Retail</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Manage business partners, drive revenue growth, ensure customer satisfaction and meet business targets.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Seeb, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Freshers / Experienced</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

            {{-- Job 5 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-blue-700 font-black text-xl">M</div>
                    <span class="rounded-full bg-green-50 px-4 py-2 text-xs font-black text-green-700">In-Office</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Marketing Intern</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Develop marketing campaigns, support promotions and assist with customer engagement activities.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Seeb, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">0 Years</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

            {{-- Job 6 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-purple-50 text-purple-700 font-black text-xl">F</div>
                    <span class="rounded-full bg-green-50 px-4 py-2 text-xs font-black text-green-700">In-Office</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Front Desk Receptionist</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Be the face of the property, welcome guests, manage reservations, check-ins and customer inquiries.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Seeb, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Communication Skills</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

            {{-- Job 7 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-orange-50 text-orange-700 font-black text-xl">S</div>
                    <span class="rounded-full bg-yellow-50 px-4 py-2 text-xs font-black text-yellow-700">Hybrid</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Sales Intern</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Support sales operations, business partner handling, revenue growth and customer satisfaction.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Seeb, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Freshers</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

            {{-- Job 8 --}}
            <div class="group rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition">
                <div class="flex items-start justify-between gap-4">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-emerald-50 text-emerald-700 font-black text-xl">E</div>
                    <span class="rounded-full bg-green-50 px-4 py-2 text-xs font-black text-green-700">In-Office</span>
                </div>
                <h3 class="mt-7 text-2xl font-black text-slate-950">Jr. Event Coordinator</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Plan and execute corporate and social events. Suitable for creative candidates with strong organization skills.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">Muscat, Oman</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">0 Years</span>
                </div>
                <a href="#apply-now" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                    Apply Now
                </a>
            </div>

        </div>
    </div>
</section>


{{-- PROCESS --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Hiring Process</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Simple steps to join GPT Group.
                </h2>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Apply for a suitable role, share your details and our HR team can connect with you for the next steps.
                </p>
            </div>

            <div class="grid gap-5">
                <div class="rounded-[2rem] bg-slate-50 p-6 border border-slate-100 flex gap-5">
                    <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-600 text-white font-black">1</div>
                    <div>
                        <h3 class="text-xl font-black">Choose Role</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Select an open position matching your skill and location preference.</p>
                    </div>
                </div>

                <div class="rounded-[2rem] bg-slate-50 p-6 border border-slate-100 flex gap-5">
                    <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-600 text-white font-black">2</div>
                    <div>
                        <h3 class="text-xl font-black">Submit Application</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Fill the form with your contact details and profile summary.</p>
                    </div>
                </div>

                <div class="rounded-[2rem] bg-slate-950 p-6 text-white flex gap-5">
                    <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-cyan-400 text-slate-950 font-black">3</div>
                    <div>
                        <h3 class="text-xl font-black">HR Review</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">Shortlisted candidates may be contacted for discussion or interview.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- APPLY FORM --}}
<section id="apply-now" class="bg-slate-950 py-16 lg:py-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-white/10 p-8 sm:p-10 border border-white/10">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Apply Now</p>
                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Start your career with GPT Group.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-300">
                    Fill this form to apply for any open position. Backend me aap is form ko email, database ya CRM ke saath connect kar sakte hain.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <p class="mt-2 text-sm text-slate-300">info@gptgroups.com</p>
                    </div>
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Helpline</h3>
                        <p class="mt-2 text-sm text-slate-300">+968 2450-1533</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-white p-8 sm:p-10 text-slate-950 shadow-2xl">
                <form action="#" method="POST" enctype="multipart/form-data" class="grid gap-4">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                                placeholder="Enter full name"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                                placeholder="Enter email"
                            >
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone</label>
                            <input
                                type="text"
                                name="phone"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                                placeholder="Enter phone number"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Position</label>
                            <select
                                name="position"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                            >
                                <option value="">Select Position</option>
                                <option>Marketing & Sales Intern - GlobeSpac</option>
                                <option>Marketing & Sales Intern - HikVision</option>
                                <option>Marketing & Sales - Nature Republic</option>
                                <option>Sales & Marketing Intern - Handset Retail</option>
                                <option>Marketing Intern</option>
                                <option>Front Desk Receptionist</option>
                                <option>Sales Intern</option>
                                <option>Jr. Event Coordinator</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Current Location</label>
                        <input
                            type="text"
                            name="location"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                            placeholder="Example: Muscat, Oman"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Upload CV</label>
                        <input
                            type="file"
                            name="cv"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm outline-none focus:border-blue-500"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea
                            name="message"
                            rows="4"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                            placeholder="Write short message"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-2 inline-flex justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-8 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition"
                    >
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
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-12 lg:p-16 text-white shadow-2xl">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Build Your Future</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Grow with a dynamic business group.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Join GPT Group and become part of a team focused on service, growth, innovation and customer success.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#open-positions" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        View Jobs
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection