<aside class="flex h-full flex-col border-r border-[#DCEAF5] bg-gradient-to-b from-[#DCEEFF] to-[#EDF6FC]">

    {{-- Logo --}}
    <div class="flex h-[72px] items-center gap-3 border-b border-[#D2E5F3] px-6">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#65B5E8] to-[#5799CE] text-xl font-extrabold text-white shadow-sm">
            C
        </div>

        <div>
            <h1 class="text-lg font-extrabold tracking-tight text-[#304F6B]">
                Career<span class="text-[#5799CE]">Bridge</span>
            </h1>
            <p class="text-[9px] font-semibold tracking-[0.15em] text-[#7896AE]">
                STUDENT PORTAL
            </p>
        </div>
    </div>

    {{-- Profil Pengguna --}}
    <div class="px-4 pt-6">
        <div class="rounded-2xl border border-white/80 bg-white/70 p-4 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-[#65B5E8] to-[#5799CE] text-lg font-extrabold text-white">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <p class="truncate text-sm font-bold text-[#304F6B]">
                        {{ auth()->user()->name ?? 'Mahasiswa' }}
                    </p>
                    <p class="truncate text-xs text-[#7896AE]">
                        {{ auth()->user()->email ?? '' }}
                    </p>
                </div>
            </div>

            <div class="mt-3 inline-flex items-center gap-1.5 rounded-full bg-[#E5F1FC] px-3 py-1">
                <span class="h-1.5 w-1.5 rounded-full bg-[#65B5E8]"></span>
                <span class="text-[10px] font-bold text-[#478FC2]">Mahasiswa</span>
            </div>
        </div>
    </div>

    {{-- Navigasi --}}
    <div class="flex-1 overflow-y-auto px-4 py-6">

        <p class="mb-3 px-3 text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#8AA5BB]">
            Menu Utama
        </p>

        <nav class="space-y-1.5">

            {{-- Beranda --}}
            <a href="{{ url('/') }}"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->is('student/home') || request()->is('/') ? 'bg-white text-[#397DAE] shadow-sm' : 'text-[#59758D] hover:bg-white/70 hover:text-[#397DAE]' }}">

                <span class="text-lg">⌂</span>
                <span>Beranda</span>

                @if(request()->is('student/home') || request()->is('/'))
                    <span class="ml-auto h-2 w-2 rounded-full bg-[#65B5E8]"></span>
                @endif
            </a>

            {{-- Jelajahi Peluang --}}
            <a href="{{ url('/student/opportunities') }}"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->is('student/opportunities*') ? 'bg-white text-[#397DAE] shadow-sm' : 'text-[#59758D] hover:bg-white/70 hover:text-[#397DAE]' }}">

                <span class="text-lg">✦</span>
                <span>Jelajahi Peluang</span>

                @if(request()->is('student/opportunities*'))
                    <span class="ml-auto h-2 w-2 rounded-full bg-[#65B5E8]"></span>
                @endif
            </a>

            {{-- Peluang Tersimpan --}}
            <a href="{{ url('/student/saved') }}"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->is('student/saved*') ? 'bg-white text-[#397DAE] shadow-sm' : 'text-[#59758D] hover:bg-white/70 hover:text-[#397DAE]' }}">

                <span class="text-lg">♡</span>
                <span>Peluang Tersimpan</span>

                @if(request()->is('student/saved*'))
                    <span class="ml-auto h-2 w-2 rounded-full bg-[#65B5E8]"></span>
                @endif
            </a>

            {{-- Pendaftaran Saya --}}
            <a href="{{ url('/student/applications') }}"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->is('student/applications*') ? 'bg-white text-[#397DAE] shadow-sm' : 'text-[#59758D] hover:bg-white/70 hover:text-[#397DAE]' }}">

                <span class="text-lg">▤</span>
                <span>Pendaftaran Saya</span>

                @if(request()->is('student/applications*'))
                    <span class="ml-auto h-2 w-2 rounded-full bg-[#65B5E8]"></span>
                @endif
            </a>

        </nav>

        {{-- Menu Lainnya --}}
        <p class="mb-3 mt-8 px-3 text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#8AA5BB]">
            Lainnya
        </p>

        <nav class="space-y-1.5">

            {{-- Notifikasi --}}
            <a href="{{ url('/student/notifications') }}"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->is('student/notifications*') ? 'bg-white text-[#397DAE] shadow-sm' : 'text-[#59758D] hover:bg-white/70 hover:text-[#397DAE]' }}">

                <span class="text-lg">♧</span>
                <span>Notifikasi</span>

                @if(request()->is('student/notifications*'))
                    <span class="ml-auto h-2 w-2 rounded-full bg-[#65B5E8]"></span>
                @endif
            </a>

            {{-- Profil Saya --}}
            <a href="{{ url('/student/profile') }}"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->is('student/profile*') ? 'bg-white text-[#397DAE] shadow-sm' : 'text-[#59758D] hover:bg-white/70 hover:text-[#397DAE]' }}">

                <span class="text-lg">♙</span>
                <span>Profil Saya</span>

                @if(request()->is('student/profile*'))
                    <span class="ml-auto h-2 w-2 rounded-full bg-[#65B5E8]"></span>
                @endif
            </a>

        </nav>
    </div>

    {{-- Informasi Bawah --}}
    <div class="border-t border-[#D2E5F3] p-4">
        <div class="rounded-2xl bg-gradient-to-br from-[#D2E9FB] to-[#E4F1FC] p-4">
            <div class="text-xl">✨</div>
            <p class="mt-2 text-xs font-extrabold text-[#3F6686]">
                Wujudkan Potensimu!
            </p>
            <p class="mt-1 text-[11px] leading-5 text-[#6D8BA4]">
                Temukan peluang dan bangun masa depanmu bersama CareerBridge.
            </p>
        </div>

        <p class="mt-4 text-center text-[10px] text-[#91A9BC]">
            © {{ date('Y') }} CareerBridge
        </p>
    </div>

</aside>
