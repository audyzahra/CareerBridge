<aside class="relative flex h-full w-full flex-col overflow-hidden border-r border-[#D6E8F5] bg-gradient-to-b from-[#DCEEFF] via-[#E5F1FC] to-[#EAF4FA] text-slate-700">

    {{-- Decorative Shapes --}}
    <div class="pointer-events-none absolute -right-12 -top-12 h-44 w-44 rounded-full bg-white/35 blur-2xl"></div>
    <div class="pointer-events-none absolute -bottom-16 -left-12 h-48 w-48 rounded-full bg-[#A9D5F1]/35 blur-3xl"></div>


    {{-- Brand --}}
    <div class="relative border-b border-white/70 px-6 py-6">

        <a href="{{ route('super-admin.dashboard') }}"
           class="flex items-center gap-3">

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#65B5E8] to-[#5799CE] text-lg font-extrabold text-white shadow-lg shadow-blue-200/70">
                C
            </div>

            <div>
                <span class="text-lg font-extrabold tracking-tight text-[#304F6B]">
                    Career<span class="text-[#559ACB]">Bridge</span>
                </span>

                <p class="mt-0.5 text-[10px] font-semibold tracking-[0.13em] text-[#7896AF]">
                    OPPORTUNITY PLATFORM
                </p>
            </div>

        </a>


        {{-- Admin Label --}}
        <div class="mt-5 flex items-center gap-3 rounded-xl border border-white/80 bg-white/65 px-3 py-2.5 shadow-sm shadow-blue-100/40">

            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#D7EBFA] text-[#548DB9]">
                ♙
            </div>

            <div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-[#89A1B5]">
                    Panel
                </p>

                <p class="text-xs font-bold text-[#456680]">
                    Administration
                </p>
            </div>

            <span class="ml-auto h-2 w-2 rounded-full bg-emerald-400"></span>

        </div>

    </div>


    {{-- Main Navigation --}}
    <nav class="relative flex-1 space-y-1.5 overflow-y-auto px-4 py-6">

        <p class="mb-4 px-3 text-[10px] font-extrabold uppercase tracking-[0.18em] text-[#829DB3]">
            Main Menu
        </p>


        {{-- Dashboard --}}
        <a href="{{ route('super-admin.dashboard') }}"
           class="group relative flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition-all duration-200
           {{ request()->routeIs('super-admin.dashboard')
                ? 'bg-white/90 text-[#397FAF] shadow-md shadow-blue-200/50 ring-1 ring-white'
                : 'text-[#59758D] hover:bg-white/65 hover:text-[#397FAF]' }}">

            @if(request()->routeIs('super-admin.dashboard'))
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#5BA9DF]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-xl
                {{ request()->routeIs('super-admin.dashboard')
                    ? 'bg-[#DCEEFF] text-[#438FC2]'
                    : 'bg-white/70 text-[#689BBE] group-hover:bg-[#DCEEFF]' }}">
                ▦
            </span>

            Dashboard

            @if(request()->routeIs('super-admin.dashboard'))
                <span class="ml-auto h-2 w-2 rounded-full bg-[#63A9D8]"></span>
            @endif

        </a>


        {{-- User Management --}}
        <a href="{{ route('super-admin.users.index') }}"
           class="group relative flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition-all duration-200
           {{ request()->routeIs('super-admin.users.*')
                ? 'bg-white/90 text-[#397FAF] shadow-md shadow-blue-200/50 ring-1 ring-white'
                : 'text-[#59758D] hover:bg-white/65 hover:text-[#397FAF]' }}">

            @if(request()->routeIs('super-admin.users.*'))
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#5BA9DF]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-xl
                {{ request()->routeIs('super-admin.users.*')
                    ? 'bg-[#DCEEFF] text-[#438FC2]'
                    : 'bg-white/70 text-[#689BBE] group-hover:bg-[#DCEEFF]' }}">
                ♙
            </span>

            User Management

            @if(request()->routeIs('super-admin.users.*'))
                <span class="ml-auto h-2 w-2 rounded-full bg-[#63A9D8]"></span>
            @endif

        </a>


        {{-- Organizer Management --}}
        <a href="{{ route('super-admin.organizers.index') }}"
           class="group relative flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition-all duration-200
           {{ request()->routeIs('super-admin.organizers.*')
                ? 'bg-white/90 text-[#397FAF] shadow-md shadow-blue-200/50 ring-1 ring-white'
                : 'text-[#59758D] hover:bg-white/65 hover:text-[#397FAF]' }}">

            @if(request()->routeIs('super-admin.organizers.*'))
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#5BA9DF]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-xl
                {{ request()->routeIs('super-admin.organizers.*')
                    ? 'bg-[#DCEEFF] text-[#438FC2]'
                    : 'bg-white/70 text-[#689BBE] group-hover:bg-[#DCEEFF]' }}">
                ▣
            </span>

            Organizer Management

            @if(request()->routeIs('super-admin.organizers.*'))
                <span class="ml-auto h-2 w-2 rounded-full bg-[#63A9D8]"></span>
            @endif

        </a>


        {{-- Opportunity Management --}}
        <a href="{{ route('super-admin.opportunities.index') }}"
           class="group relative flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition-all duration-200
           {{ request()->routeIs('super-admin.opportunities.*')
                ? 'bg-white/90 text-[#397FAF] shadow-md shadow-blue-200/50 ring-1 ring-white'
                : 'text-[#59758D] hover:bg-white/65 hover:text-[#397FAF]' }}">

            @if(request()->routeIs('super-admin.opportunities.*'))
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#5BA9DF]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-xl
                {{ request()->routeIs('super-admin.opportunities.*')
                    ? 'bg-[#DCEEFF] text-[#438FC2]'
                    : 'bg-white/70 text-[#689BBE] group-hover:bg-[#DCEEFF]' }}">
                ✦
            </span>

            Opportunity Management

            @if(request()->routeIs('super-admin.opportunities.*'))
                <span class="ml-auto h-2 w-2 rounded-full bg-[#63A9D8]"></span>
            @endif

        </a>

    </nav>


    {{-- Information Card --}}
    <div class="relative mx-4 mb-4 overflow-hidden rounded-2xl border border-white/80 bg-gradient-to-br from-[#D2E9FB] to-[#E4F1FC] p-4 shadow-sm shadow-blue-100/50">

        <div class="absolute -right-5 -top-5 h-20 w-20 rounded-full bg-white/40"></div>

        <div class="relative flex items-center gap-2">

            <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white/80 text-[#559BCB] shadow-sm">
                ✨
            </div>

            <p class="text-xs font-bold text-[#426987]">
                CareerBridge
            </p>

        </div>

        <p class="relative mt-2 text-[11px] leading-relaxed text-[#6D8CA5]">
            Connecting potential with opportunities for a brighter future.
        </p>

    </div>


    {{-- Logout --}}
    <div class="relative border-t border-white/70 p-4">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                class="group flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-[#59758D] transition hover:bg-white/80 hover:text-rose-500">

                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/70 text-rose-400 transition group-hover:bg-rose-50">
                    ↪
                </span>

                Logout

            </button>

        </form>

    </div>

</aside>
