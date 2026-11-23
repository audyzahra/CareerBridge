<aside class="relative flex h-full w-full flex-col overflow-hidden border-r border-[#D6E8F5] bg-gradient-to-b from-[#DCEEFF] via-[#E5F1FC] to-[#EAF4FA] text-[#405F79]">

    {{-- Dekorasi Background --}}
    <div class="pointer-events-none absolute -right-16 top-32 h-48 w-48 rounded-full bg-white/30"></div>
    <div class="pointer-events-none absolute -left-16 bottom-32 h-40 w-40 rounded-full bg-[#B8DDF5]/20"></div>

    {{-- Brand --}}
    <div class="relative border-b border-[#C9DFEF] px-6 py-6">

        <a href="{{ url('/organizer/dashboard') }}" class="flex items-center gap-3">

            {{-- Logo --}}
            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#65B5E8] to-[#5799CE] text-lg font-extrabold text-white shadow-md shadow-[#8BBDE0]/30">
                C
            </div>

            {{-- Brand Name --}}
            <div>
                <span class="text-lg font-extrabold tracking-tight text-[#304F6B]">
                    CareerBridge
                </span>
                <p class="text-[10px] font-medium tracking-wide text-[#6D8BA4]">
                    Connect Your Potential
                </p>
            </div>

        </a>

        {{-- Portal Badge --}}
        <div class="mt-5 inline-flex items-center gap-2 rounded-lg border border-[#C6DFF1] bg-white/65 px-3 py-2">
            <span class="flex h-2 w-2 rounded-full bg-[#65A9D8]"></span>
            <span class="text-[10px] font-extrabold uppercase tracking-[0.16em] text-[#527B9B]">
                Organizer Portal
            </span>
        </div>

    </div>


    {{-- Menu --}}
    <nav class="relative flex-1 space-y-2 overflow-y-auto px-4 py-6">

        {{-- Menu Utama --}}
        <p class="mb-3 px-3 text-[10px] font-extrabold uppercase tracking-[0.18em] text-[#7895AC]">
            Menu Utama
        </p>

        {{-- Dashboard --}}
        <a href="{{ url('/organizer/dashboard') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ request()->is('organizer/dashboard')
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if(request()->is('organizer/dashboard'))
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg text-base transition
                {{ request()->is('organizer/dashboard')
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">
                ▦
            </span>

            Dashboard
        </a>


        {{-- Lomba Saya --}}
        <a href="{{ url('/organizer/opportunities') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ request()->is('organizer/opportunities*')
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if(request()->is('organizer/opportunities*'))
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg text-base transition
                {{ request()->is('organizer/opportunities*')
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">
                ✦
            </span>

            Lomba Saya
        </a>


        {{-- Divider --}}
        <div class="!my-6 border-t border-[#C9DFEF]"></div>


        {{-- Akun Organizer --}}
        <p class="mb-3 px-3 text-[10px] font-extrabold uppercase tracking-[0.18em] text-[#7895AC]">
            Akun Organizer
        </p>

        {{-- Profil Organizer --}}
        <a href="{{ url('/organizer/profile') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ request()->is('organizer/profile*')
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if(request()->is('organizer/profile*'))
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg text-base transition
                {{ request()->is('organizer/profile*')
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">
                ♙
            </span>

            Profil Organizer
        </a>

    </nav>


    {{-- Informasi Organizer --}}
    <div class="relative mx-4 mb-4 rounded-2xl border border-[#C8E0F2] bg-gradient-to-br from-[#D2E9FB] to-[#E4F1FC] p-4">

        <div class="flex items-center gap-2">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/80 text-[#5799CE]">
                ✦
            </span>

            <p class="text-xs font-bold text-[#426D8D]">
                Ruang Organizer
            </p>
        </div>

        <p class="mt-2 text-[11px] leading-relaxed text-[#66849D]">
            Kelola peluang dan bantu mahasiswa menemukan kesempatan terbaik.
        </p>

    </div>


    {{-- Logout --}}
    <div class="relative border-t border-[#C9DFEF] p-4">

        <form action="{{ url('/logout') }}" method="POST">
            @csrf

            <button type="submit"
                class="group flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#668097] transition-all duration-200 hover:bg-rose-50 hover:text-rose-600">

                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/70 text-base text-[#789DBA] transition group-hover:bg-rose-100 group-hover:text-rose-600">
                    ↪
                </span>

                Keluar
            </button>
        </form>

        <p class="mt-3 text-center text-[10px] font-medium text-[#8BA3B7]">
            © {{ date('Y') }} CareerBridge
        </p>

    </div>

</aside>
