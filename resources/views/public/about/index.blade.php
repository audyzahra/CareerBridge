@extends('layouts.public')

@section('title', 'About Us | CareerBridge')

@section('content')
    <div class="mx-auto max-w-[1440px] px-5 py-6 sm:px-8 lg:px-10">

        {{-- Hero Section --}}
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#DCEEFF] via-[#EAF5FF] to-white px-7 py-12 sm:px-10 lg:px-14 lg:py-16">
            <div class="absolute -right-10 -top-10 h-48 w-48 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -bottom-16 left-1/3 h-40 w-40 rounded-full bg-blue-200/40 blur-3xl"></div>

            <div class="relative mx-auto max-w-4xl text-center">
                <span class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-bold text-[#478FC2]">
                    <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                    GET TO KNOW CAREERBRIDGE
                </span>

                <h1 class="mt-6 text-3xl font-extrabold leading-tight tracking-tight text-[#304F6B] sm:text-4xl lg:text-5xl">
                    Connecting Students with
                    <span class="text-[#5799CE]">Endless Opportunities.</span>
                </h1>

                <p class="mx-auto mt-5 max-w-3xl text-sm leading-7 text-[#6D8BA4] sm:text-base">
                    We are here to help students discover information and opportunities
                    that support their academic journey and professional development.
                </p>
            </div>
        </section>

        {{-- About CareerBridge --}}
        <section class="mt-12 grid items-center gap-8 lg:grid-cols-2 lg:gap-14">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#65A9D8]">
                    Who We Are
                </p>

                <h2 class="mt-3 text-2xl font-extrabold leading-snug text-[#304F6B] sm:text-3xl">
                    One place to discover your next step.
                </h2>

                <div class="mt-5 space-y-4 text-justify text-sm leading-7 text-slate-500">
                    <p>
                        CareerBridge is a web-based platform designed to help university
                        students discover various academic and professional development
                        opportunities.
                    </p>
                    <p>
                        Information about scholarships, internship programs, and competitions
                        is often scattered across different social media platforms, websites,
                        and communication groups. This situation can make it difficult for
                        students to find relevant information that matches their needs.
                    </p>
                    <p>
                        Through CareerBridge, various opportunity listings are brought
                        together in one platform, making them easier to explore. We aim to
                        help students discover opportunities, take meaningful steps, and
                        prepare for their future.
                    </p>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-lg">
                <div class="rounded-[2rem] border border-[#E3F0FA] bg-gradient-to-br from-[#E4F2FF] to-[#F7FBFF] p-7 sm:p-10">
                    <div class="rounded-3xl border border-white/80 bg-white/80 p-7 text-center shadow-lg shadow-blue-100/60 sm:p-9">
                        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-3xl bg-[#E5F1FC] text-4xl">
                            🌉
                        </div>
                        <h3 class="mt-6 text-xl font-extrabold text-[#304F6B]">
                            Your Bridge to Opportunities
                        </h3>
                        <p class="mt-3 text-sm leading-6 text-[#7896AE]">
                            Discover the right opportunities and build your journey, one step
                            at a time.
                        </p>
                    </div>
                </div>
                <div class="absolute -bottom-4 -left-3 hidden rounded-2xl border border-[#E2EDF5] bg-white px-5 py-3 shadow-lg shadow-blue-100/60 sm:block">
                    <p class="text-sm font-bold text-[#478FC2]">Explore. Grow. Achieve.</p>
                </div>
            </div>
        </section>

        {{-- Key Values --}}
        <section class="mt-16">
            <div class="text-center">
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#65A9D8]">
                    Why CareerBridge?
                </p>
                <h2 class="mt-3 text-2xl font-extrabold text-[#304F6B] sm:text-3xl">
                    Designed to Help You Grow
                </h2>
            </div>

            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <article class="rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/60">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-50 text-2xl">🔎</div>
                    <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">Centralized Information</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Explore various opportunities in one place without having to switch between multiple platforms.
                    </p>
                </article>

                <article class="rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/60">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-2xl">🎓</div>
                    <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">Diverse Opportunities</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Discover scholarships, internships, and competitions to support your goals.
                    </p>
                </article>

                <article class="rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/60 sm:col-span-2 lg:col-span-1">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-50 text-2xl">🚀</div>
                    <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">Support Your Growth</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Create opportunities to gain experience, sharpen your skills, and achieve new milestones.
                    </p>
                </article>
            </div>
        </section>

        {{-- Opportunity Categories --}}
        <section class="mt-16 rounded-3xl border border-[#DCEAF5] bg-[#F7FBFF] p-7 sm:p-10">
            <div class="text-center">
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#65A9D8]">
                    Start Your Journey
                </p>
                <h2 class="mt-3 text-2xl font-extrabold text-[#304F6B] sm:text-3xl">
                    What Opportunities Are You Looking For?
                </h2>
                <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-slate-400">
                    Take your first step by exploring various opportunity categories available on CareerBridge.
                </p>
            </div>

            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('opportunities.index', ['category' => 'beasiswa']) }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-[#D7E8F6] bg-white px-5 py-3 text-sm font-bold text-[#478FC2] transition hover:bg-[#EAF5FF]">
                    🎓 Scholarships
                </a>
                <a href="{{ route('opportunities.index', ['category' => 'magang']) }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-[#D7E8F6] bg-white px-5 py-3 text-sm font-bold text-[#478FC2] transition hover:bg-[#EAF5FF]">
                    💼 Internships
                </a>
                <a href="{{ route('opportunities.index', ['category' => 'kompetisi']) }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-[#D7E8F6] bg-white px-5 py-3 text-sm font-bold text-[#478FC2] transition hover:bg-[#EAF5FF]">
                    🏆 Competitions
                </a>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('opportunities.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#65A9D8] px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-200 transition hover:-translate-y-0.5 hover:bg-[#5599C9]">
                    Explore All Opportunities
                    <span>→</span>
                </a>
            </div>
        </section>

    </div>
@endsection
