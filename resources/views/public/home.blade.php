@extends('layouts.public')

@section('title', 'Beranda | CareerBridge')

@section('content')

    <div class="mx-auto max-w-[1440px] px-5 py-6 sm:px-8 lg:px-10">

        {{-- Hero Section --}}
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#DCEEFF] via-[#EAF5FF] to-white p-7 sm:p-10 lg:p-12">

            {{-- Dekorasi --}}
            <div class="absolute -right-10 -top-10 h-48 w-48 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -bottom-16 right-1/3 h-40 w-40 rounded-full bg-blue-200/40 blur-3xl"></div>

            <div class="relative grid items-center gap-10 lg:grid-cols-2">

                {{-- Teks Hero --}}
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-bold text-[#478FC2]">
                        <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        PLATFORM PENGEMBANGAN MAHASISWA
                    </span>

                    <h1 class="mt-6 text-3xl font-extrabold leading-tight tracking-tight text-[#304F6B] sm:text-4xl lg:text-5xl">
                        Temukan Peluang,
                        <br>
                        <span class="text-[#5799CE]">
                            Bangun Masa Depanmu.
                        </span>
                    </h1>

                    <p class="mt-5 max-w-xl text-sm leading-7 text-[#6D8BA4] sm:text-base">
                        CareerBridge membantu mahasiswa menemukan berbagai peluang
                        pengembangan akademik dan profesional, mulai dari beasiswa,
                        program magang, hingga kompetisi.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">

                        <a href="{{ route('opportunities.index') }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-[#65A9D8] px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-200 transition hover:-translate-y-0.5 hover:bg-[#5599C9]">
                            Jelajahi Peluang
                            <span>→</span>
                        </a>

                        <a href="{{ route('about') }}"
                           class="inline-flex items-center rounded-xl border border-[#C9E0F2] bg-white px-6 py-3.5 text-sm font-bold text-[#478FC2] transition hover:bg-[#F2F8FD]">
                            Tentang CareerBridge
                        </a>

                    </div>
                </div>

                {{-- Ilustrasi --}}
                <div class="relative mx-auto w-full max-w-md">
                    <div class="rounded-[2rem] border border-white/80 bg-white/70 p-5 shadow-xl shadow-blue-100/70 backdrop-blur-sm">

                        <div class="rounded-2xl bg-gradient-to-br from-[#DCEEFF] to-[#EEF7FF] p-8 text-center">

                            <div class="mx-auto flex h-36 w-36 items-center justify-center rounded-full bg-white shadow-lg">
                                <svg viewBox="0 0 120 120" class="h-24 w-24" fill="none">
                                    <path d="M15 42L60 20L105 42L60 64L15 42Z" fill="#65B5E8"/>
                                    <path d="M29 50V70C29 70 42 83 60 83C78 83 91 70 91 70V50L60 65L29 50Z" fill="#5799CE"/>
                                    <path d="M105 42V70" stroke="#397DAE" stroke-width="4" stroke-linecap="round"/>
                                    <circle cx="105" cy="76" r="5" fill="#397DAE"/>
                                    <path d="M45 94H75" stroke="#65B5E8" stroke-width="5" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-extrabold text-[#304F6B]">
                                Your Future Starts Here
                            </h2>

                            <p class="mt-2 text-xs leading-6 text-[#7896AE]">
                                Satu langkah kecil untuk masa depan yang lebih besar.
                            </p>

                        </div>

                        <div class="mt-4 flex items-center gap-3 rounded-xl bg-white p-4 shadow-sm">

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E5F1FC] text-xl">
                                ✨
                            </div>

                            <div>
                                <p class="text-sm font-bold text-[#304F6B]">
                                    Banyak Kesempatan Menantimu
                                </p>

                                <p class="mt-1 text-xs text-[#91A9BC]">
                                    Mulai eksplorasi hari ini.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>


        {{-- Kategori Peluang --}}
        <section class="mt-10">

            <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-end">

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#65A9D8]">
                        Eksplorasi Peluang
                    </p>

                    <h2 class="mt-2 text-2xl font-extrabold text-[#304F6B]">
                        Temukan Kesempatanmu
                    </h2>

                    <p class="mt-2 text-sm text-slate-400">
                        Pilih kategori peluang yang sesuai dengan tujuanmu.
                    </p>
                </div>

                <a href="{{ route('opportunities.index') }}"
                   class="text-sm font-bold text-[#5799CE] transition hover:text-[#397DAE]">
                    Lihat Semua Peluang →
                </a>

            </div>

            <div class="mt-6 grid gap-5 md:grid-cols-3">

                {{-- Beasiswa --}}
                <a href="{{ route('opportunities.index', ['category' => 'beasiswa']) }}"
                   class="group rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-sky-200 hover:shadow-lg hover:shadow-blue-100/60">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-2xl">
                        🎓
                    </div>

                    <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">
                        Beasiswa
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Temukan dukungan pendidikan untuk membantu perjalanan akademikmu.
                    </p>

                    <span class="mt-5 inline-flex text-sm font-bold text-[#5799CE] group-hover:text-[#397DAE]">
                        Jelajahi Beasiswa →
                    </span>

                </a>

                {{-- Magang --}}
                <a href="{{ route('opportunities.index', ['category' => 'magang']) }}"
                   class="group rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-sky-200 hover:shadow-lg hover:shadow-blue-100/60">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-2xl">
                        💼
                    </div>

                    <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">
                        Magang
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Bangun pengalaman kerja dan kenali dunia profesional.
                    </p>

                    <span class="mt-5 inline-flex text-sm font-bold text-[#5799CE] group-hover:text-[#397DAE]">
                        Jelajahi Magang →
                    </span>

                </a>

                {{-- Kompetisi --}}
                <a href="{{ route('opportunities.index', ['category' => 'kompetisi']) }}"
                   class="group rounded-2xl border border-[#E2EDF5] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-sky-200 hover:shadow-lg hover:shadow-blue-100/60">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-50 text-2xl">
                        🏆
                    </div>

                    <h3 class="mt-5 text-lg font-extrabold text-[#304F6B]">
                        Kompetisi
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Asah kemampuan, kembangkan kreativitas, dan raih prestasi.
                    </p>

                    <span class="mt-5 inline-flex text-sm font-bold text-[#5799CE] group-hover:text-[#397DAE]">
                        Jelajahi Kompetisi →
                    </span>

                </a>

            </div>
        </section>


        {{-- Informasi CareerBridge --}}
        <section class="mt-10 rounded-2xl border border-[#DCEAF5] bg-white p-7 sm:p-9">

            <div class="grid items-center gap-6 md:grid-cols-[1fr_auto]">

                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-[#65A9D8]">
                        CareerBridge
                    </span>

                    <h2 class="mt-3 text-xl font-extrabold text-[#304F6B] sm:text-2xl">
                        Satu Platform, Beragam Kesempatan.
                    </h2>

                    <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-400">
                        CareerBridge membantu mahasiswa menemukan informasi peluang
                        pengembangan akademik dan profesional dalam satu platform.
                        Mulai perjalananmu dan temukan kesempatan yang tepat.
                    </p>
                </div>

                <a href="{{ route('opportunities.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#E5F1FC] px-6 py-3 text-sm font-bold text-[#478FC2] transition hover:bg-[#DCEEFF]">
                    Temukan Peluang
                    <span>→</span>
                </a>

            </div>
        </section>

    </div>

@endsection
