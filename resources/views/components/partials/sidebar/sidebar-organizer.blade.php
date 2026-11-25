<aside class="relative flex h-full w-full flex-col overflow-hidden border-r border-[#D6E8F5] bg-gradient-to-b from-[#DCEEFF] via-[#E5F1FC] to-[#EAF4FA] text-[#405F79]">

    {{-- Background Decorations --}}
    <div class="pointer-events-none absolute -right-16 top-32 h-48 w-48 rounded-full bg-white/30"></div>
    <div class="pointer-events-none absolute -left-16 bottom-32 h-40 w-40 rounded-full bg-[#B8DDF5]/20"></div>

    {{-- Brand --}}
    <div class="relative border-b border-[#C9DFEF] px-6 py-6">

        <a href="{{ route('organizer.dashboard') }}" class="flex items-center gap-3">

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


    {{-- Navigation --}}
    <nav class="relative flex-1 space-y-2 overflow-y-auto px-4 py-6">

        {{-- Main Menu --}}
        <p class="mb-3 px-3 text-[10px] font-extrabold uppercase tracking-[0.18em] text-[#7895AC]">
            Main Menu
        </p>


        {{-- Dashboard --}}
        @php
            $isDashboard = request()->routeIs('organizer.dashboard');
        @endphp

        <a href="{{ route('organizer.dashboard') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ $isDashboard
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if($isDashboard)
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg transition
                {{ $isDashboard
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                    <rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                    <rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                    <rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                </svg>

            </span>

            Dashboard
        </a>


        {{-- My Opportunities --}}
        @php
            $isOpportunities = request()->is('organizer/opportunities*');
        @endphp

        <a href="{{ url('/organizer/opportunities') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ $isOpportunities
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if($isOpportunities)
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg transition
                {{ $isOpportunities
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="7" width="18" height="13" rx="2" stroke-width="1.8"/>
                    <path d="M8 7V5.5A1.5 1.5 0 0 1 9.5 4h5A1.5 1.5 0 0 1 16 5.5V7" stroke-width="1.8"/>
                    <path d="M3 12h18M10 12v2h4v-2" stroke-width="1.8"/>
                </svg>

            </span>

            My Opportunities
        </a>


        {{-- Applicant Management --}}
        @php
            $isApplicants = request()->is('organizer/applicants*');
        @endphp

        <a href="{{ url('/organizer/applicants') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ $isApplicants
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if($isApplicants)
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg transition
                {{ $isApplicants
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M16 20v-1.5a3.5 3.5 0 0 0-3.5-3.5h-5A3.5 3.5 0 0 0 4 18.5V20" stroke-width="1.8" stroke-linecap="round"/>
                    <circle cx="10" cy="8" r="3" stroke-width="1.8"/>
                    <path d="M17 11a3 3 0 1 0-1-5.83M17 15h1a3 3 0 0 1 3 3v2" stroke-width="1.8" stroke-linecap="round"/>
                </svg>

            </span>

            Applicant Management
        </a>


        {{-- Notifications --}}
        @php
            $isNotifications = request()->is('organizer/notifications*');
        @endphp

        <a href="{{ url('/organizer/notifications') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ $isNotifications
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if($isNotifications)
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg transition
                {{ $isNotifications
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 21h4" stroke-width="1.8" stroke-linecap="round"/>
                </svg>

            </span>

            Notifications
        </a>


        {{-- Divider --}}
        <div class="!my-6 border-t border-[#C9DFEF]"></div>


        {{-- Account Section --}}
        <p class="mb-3 px-3 text-[10px] font-extrabold uppercase tracking-[0.18em] text-[#7895AC]">
            Account
        </p>


        {{-- Organizer Profile --}}
        @php
            $isProfile = request()->is('organizer/profile*');
        @endphp

        <a href="{{ url('/organizer/profile') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ $isProfile
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if($isProfile)
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg transition
                {{ $isProfile
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-5h6v5M9 9h.01M15 9h.01M9 12h.01M15 12h.01" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </span>

            Organizer Profile
        </a>


        {{-- Account Settings --}}
        @php
            $isSettings = request()->is('organizer/settings*');
        @endphp

        <a href="{{ url('/organizer/settings') }}"
            class="group relative flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
            {{ $isSettings
                ? 'bg-white text-[#397DAE] shadow-sm shadow-[#A9CBE4]/40'
                : 'text-[#56738C] hover:bg-white/60 hover:text-[#397DAE]' }}">

            @if($isSettings)
                <span class="absolute bottom-2 left-0 top-2 w-1 rounded-r-full bg-[#65A9D8]"></span>
            @endif

            <span class="flex h-9 w-9 items-center justify-center rounded-lg transition
                {{ $isSettings
                    ? 'bg-[#DCEEFF] text-[#478FC2]'
                    : 'bg-[#EAF4FC] text-[#789DBA] group-hover:bg-[#DCEEFF] group-hover:text-[#478FC2]' }}">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                    <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 2.94-.09-.03a1.7 1.7 0 0 0-1.8.46l-.07.07h-3.4l-.07-.07a1.7 1.7 0 0 0-1.8-.46l-.09.03-1.7-2.94.06-.06A1.7 1.7 0 0 0 9.5 15l-.08-.03v-3.4l.08-.07a1.7 1.7 0 0 0 .34-1.87l-.06-.09 1.7-2.94.09.03a1.7 1.7 0 0 0 1.8-.46l.07-.07h3.4l.07.07a1.7 1.7 0 0 0 1.8.46l.09-.03 1.7 2.94-.06.09a1.7 1.7 0 0 0-.34 1.87l.08.07v3.4z" stroke-width="1.5" stroke-linejoin="round" transform="translate(-1 -1)"/>
                </svg>

            </span>

            Account Settings
        </a>

    </nav>


    {{-- Organizer Information --}}
    <div class="relative mx-4 mb-4 rounded-2xl border border-[#C8E0F2] bg-gradient-to-br from-[#D2E9FB] to-[#E4F1FC] p-4">

        <div class="flex items-center gap-2">

            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/80 text-[#5799CE]">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="m12 3 1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3Z" stroke-width="1.6" stroke-linejoin="round"/>
                    <path d="m19 15 .9 2.1L22 18l-2.1.9L19 21l-.9-2.1L16 18l2.1-.9L19 15Z" stroke-width="1.4" stroke-linejoin="round"/>
                </svg>
            </span>

            <p class="text-xs font-bold text-[#426D8D]">
                Organizer Workspace
            </p>

        </div>

        <p class="mt-2 text-[11px] leading-relaxed text-[#66849D]">
            Manage your opportunities and help students discover the right opportunities for their future.
        </p>

    </div>


    {{-- Logout --}}
    <div class="relative border-t border-[#C9DFEF] p-4">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                class="group flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#668097] transition-all duration-200 hover:bg-rose-50 hover:text-rose-600">

                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/70 text-[#789DBA] transition group-hover:bg-rose-100 group-hover:text-rose-600">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M10 17l5-5-5-5M15 12H3" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>

                </span>

                Logout
            </button>
        </form>

        <p class="mt-3 text-center text-[10px] font-medium text-[#8BA3B7]">
            © {{ date('Y') }} CareerBridge
        </p>

    </div>

</aside>
