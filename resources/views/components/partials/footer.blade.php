<footer class="border-t border-slate-100 bg-white">
    <div class="mx-auto max-w-[1440px] px-5 py-12 sm:px-8 lg:px-10">

        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">

            {{-- Brand --}}
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-400 text-xl font-extrabold text-white">
                        C
                    </div>

                    <span class="text-xl font-extrabold text-slate-800">
                        Career<span class="text-sky-500">Bridge</span>
                    </span>
                </a>

                <p class="mt-4 max-w-sm text-sm leading-7 text-slate-500">
                    Menghubungkan potensi, keterampilan, dan ambisi mahasiswa
                    dengan berbagai peluang untuk membangun masa depan.
                </p>
            </div>

            {{-- Navigasi --}}
            <div>
                <h3 class="text-sm font-extrabold text-slate-800">Navigasi</h3>

                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                    <li><a href="{{ url('/') }}" class="transition hover:text-sky-500">Beranda</a></li>
                    <li><a href="{{ url('/opportunities') }}" class="transition hover:text-sky-500">Jelajahi Peluang</a></li>
                    <li><a href="{{ url('/about') }}" class="transition hover:text-sky-500">Tentang Kami</a></li>
                </ul>
            </div>

            {{-- Peluang --}}
            <div>
                <h3 class="text-sm font-extrabold text-slate-800">Peluang</h3>

                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                    <li><a href="{{ url('/opportunities?type=scholarship') }}" class="transition hover:text-sky-500">Beasiswa</a></li>
                    <li><a href="{{ url('/opportunities?type=internship') }}" class="transition hover:text-sky-500">Magang</a></li>
                    <li><a href="{{ url('/opportunities?type=competition') }}" class="transition hover:text-sky-500">Kompetisi</a></li>
                </ul>
            </div>

        </div>

        <div class="mt-10 flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs text-slate-400">
                © {{ date('Y') }} CareerBridge. All rights reserved.
            </p>

            <p class="text-xs font-medium text-slate-400">
                Connecting Skills to Opportunities.
            </p>
        </div>

    </div>
</footer>
