<footer class="border-t border-[#DCEAF5] bg-gradient-to-br from-[#EAF5FF] via-[#F2F8FD] to-white">
    <div class="mx-auto max-w-[1440px] px-5 py-12 sm:px-8 lg:px-10">

        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">

            {{-- Brand --}}
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#65B5E8] to-[#5799CE] text-xl font-extrabold text-white shadow-sm">
                        C
                    </div>

                    <span class="text-xl font-extrabold tracking-tight text-slate-800">
                        Career<span class="text-[#65A9D8]">Bridge</span>
                    </span>
                </a>

                <p class="mt-4 max-w-sm text-justify text-sm leading-7 text-[#6D8BA4]">
                    Connecting students' potential, skills, and ambitions
                    with various opportunities to build a better future.
                </p>
            </div>

            {{-- Navigation --}}
            <div>
                <h3 class="text-sm font-extrabold text-[#304F6B]">Navigation</h3>

                <ul class="mt-4 space-y-3 text-sm text-[#6D8BA4]">
                    <li>
                        <a href="{{ url('/') }}" class="transition hover:text-[#478FC2]">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/opportunities') }}" class="transition hover:text-[#478FC2]">
                            Explore Opportunities
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}" class="transition hover:text-[#478FC2]">
                            About Us
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Opportunities --}}
            <div>
                <h3 class="text-sm font-extrabold text-[#304F6B]">Opportunities</h3>

                <ul class="mt-4 space-y-3 text-sm text-[#6D8BA4]">
                    <li>
                        <a href="{{ url('/opportunities?type=scholarship') }}" class="transition hover:text-[#478FC2]">
                            Scholarships
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/opportunities?type=internship') }}" class="transition hover:text-[#478FC2]">
                            Internships
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/opportunities?type=competition') }}" class="transition hover:text-[#478FC2]">
                            Competitions
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- Copyright --}}
        <div class="mt-10 flex flex-col items-center gap-3 border-t border-[#DCEAF5] pt-6 text-center">
            <p class="text-xs text-[#91A9BC]">
                © {{ date('Y') }} CareerBridge. All rights reserved.
            </p>
        </div>

    </div>
</footer>
