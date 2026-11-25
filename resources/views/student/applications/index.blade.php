@extends('layouts.student')

@section('title', 'My Applications | CareerBridge')

@section('content')

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @php

        // Temporary dummy data. Nantinya bisa diganti dengan data dari database.

        $applications = [
            [
                'id' => 1,

                'application_number' => 'APP-2026-0001',

                'title' => 'UI/UX Design Competition 2026',

                'organization' => 'Creative Youth Indonesia',

                'category' => 'Competition',

                'description' =>
                    'A national competition that challenges students to create innovative and user-centered digital experiences through creative UI/UX solutions.',

                'requirements' => [
                    'Active university student',

                    'Basic understanding of UI/UX design',

                    'Submit an original design project',

                    'Provide a portfolio',
                ],

                'eligibility' => 'University students from all majors are welcome to participate.',

                'benefits' => ['Certificate of participation', 'Networking opportunities', 'Cash prizes for winners'],

                'location' => 'Online',

                'type' => 'Individual',

                'applied_at' => 'November 20, 2026',

                'deadline' => 'December 10, 2026',

                'status' => 'Under Review',

                'initials' => 'CY',

                'color' => 'blue',

                'documents' => [['name' => 'CV.pdf', 'type' => 'PDF'], ['name' => 'Portfolio.pdf', 'type' => 'PDF']],

                'answers' => [
                    [
                        'question' => 'Why are you interested in this competition?',

                        'answer' =>
                            'I want to improve my UI/UX design skills and gain experience in solving real-world design challenges.',
                    ],

                    [
                        'question' => 'What design tools do you use?',

                        'answer' => 'Figma and Adobe Illustrator.',
                    ],
                ],
            ],

            [
                'id' => 2,

                'application_number' => 'APP-2026-0002',

                'title' => 'Digital Marketing Internship',

                'organization' => 'GrowthLabs Indonesia',

                'category' => 'Internship',

                'description' =>
                    'An internship program providing practical experience in digital marketing, campaign planning, content strategy, and performance analysis.',

                'requirements' => [
                    'Active university student',

                    'Interest in digital marketing',

                    'Good communication skills',

                    'Basic knowledge of social media platforms',
                ],

                'eligibility' =>
                    'Undergraduate students from relevant majors or with an interest in digital marketing.',

                'benefits' => ['Internship certificate', 'Professional mentorship', 'Practical work experience'],

                'location' => 'Jakarta, Indonesia',

                'type' => 'Internship',

                'applied_at' => 'November 18, 2026',

                'deadline' => 'December 05, 2026',

                'status' => 'Accepted',

                'initials' => 'GL',

                'color' => 'violet',

                'documents' => [
                    ['name' => 'Resume.pdf', 'type' => 'PDF'],

                    ['name' => 'Motivation_Letter.pdf', 'type' => 'PDF'],
                ],

                'answers' => [
                    [
                        'question' => 'Why do you want to join this internship?',

                        'answer' => 'I want to gain practical experience and develop my digital marketing skills.',
                    ],

                    [
                        'question' => 'What is your main area of interest?',

                        'answer' => 'Social media marketing and content strategy.',
                    ],
                ],
            ],

            [
                'id' => 3,

                'application_number' => 'APP-2026-0003',

                'title' => 'Future Leaders Scholarship',

                'organization' => 'Future Foundation',

                'category' => 'Scholarship',

                'description' =>
                    'A scholarship program supporting students with strong academic potential, leadership interests, and commitment to community development.',

                'requirements' => [
                    'Active university student',

                    'Academic transcript',

                    'Personal statement',

                    'Proof of extracurricular activities',
                ],

                'eligibility' =>
                    'Undergraduate students with demonstrated academic achievement and leadership potential.',

                'benefits' => [
                    'Financial scholarship support',

                    'Leadership development program',

                    'Professional networking',
                ],

                'location' => 'National',

                'type' => 'Scholarship',

                'applied_at' => 'November 15, 2026',

                'deadline' => 'November 30, 2026',

                'status' => 'Rejected',

                'initials' => 'FF',

                'color' => 'amber',

                'documents' => [
                    ['name' => 'Academic_Transcript.pdf', 'type' => 'PDF'],

                    ['name' => 'Personal_Statement.pdf', 'type' => 'PDF'],
                ],

                'answers' => [
                    [
                        'question' => 'What are your future goals?',

                        'answer' =>
                            'I aim to become a professional who contributes to technology and community development.',
                    ],

                    [
                        'question' => 'Describe your leadership experience.',

                        'answer' => 'I have participated in student organizations and academic projects.',
                    ],
                ],
            ],

            [
                'id' => 4,

                'application_number' => 'APP-2026-0004',

                'title' => 'Frontend Developer Internship',

                'organization' => 'TechNova Indonesia',

                'category' => 'Internship',

                'description' =>
                    'An internship opportunity for students to gain hands-on experience in frontend development and modern web technologies.',

                'requirements' => [
                    'Basic HTML, CSS, and JavaScript knowledge',

                    'Understanding of responsive web design',

                    'Basic knowledge of Git',

                    'Portfolio or previous projects',
                ],

                'eligibility' => 'University students interested in frontend development and web technologies.',

                'benefits' => [
                    'Practical development experience',

                    'Mentorship from developers',

                    'Internship certificate',
                ],

                'location' => 'Remote',

                'type' => 'Internship',

                'applied_at' => 'November 12, 2026',

                'deadline' => 'December 15, 2026',

                'status' => 'Submitted',

                'initials' => 'TN',

                'color' => 'emerald',

                'documents' => [['name' => 'CV.pdf', 'type' => 'PDF'], ['name' => 'Portfolio.pdf', 'type' => 'PDF']],

                'answers' => [
                    [
                        'question' => 'What programming languages do you know?',

                        'answer' => 'HTML, CSS, JavaScript, and PHP.',
                    ],

                    [
                        'question' => 'Why are you interested in frontend development?',

                        'answer' => 'I enjoy building interactive and user-friendly web interfaces.',
                    ],
                ],
            ],

            [
                'id' => 5,

                'application_number' => 'APP-2026-0005',

                'title' => 'National Business Plan Competition',

                'organization' => 'Young Entrepreneur Network',

                'category' => 'Competition',

                'description' =>
                    'A business plan competition encouraging students to develop innovative business ideas and present their entrepreneurial strategies.',

                'requirements' => [
                    'Active university student',

                    'Original business proposal',

                    'Business plan document',

                    'Team registration',
                ],

                'eligibility' => 'University students interested in entrepreneurship and business innovation.',

                'benefits' => ['Business mentoring', 'Networking opportunities', 'Awards for selected teams'],

                'location' => 'Online',

                'type' => 'Team',

                'applied_at' => 'November 08, 2026',

                'deadline' => 'December 20, 2026',

                'status' => 'Under Review',

                'initials' => 'YE',

                'color' => 'rose',

                'documents' => [
                    ['name' => 'Business_Plan.pdf', 'type' => 'PDF'],

                    ['name' => 'Team_Profile.pdf', 'type' => 'PDF'],
                ],

                'answers' => [
                    [
                        'question' => 'Describe your business idea.',

                        'answer' =>
                            'Our team proposes a digital platform that helps small businesses manage their operations.',
                    ],

                    [
                        'question' => 'Why should your team be selected?',

                        'answer' =>
                            'Our team combines creativity, technical knowledge, and an interest in entrepreneurship.',
                    ],
                ],
            ],
        ];

        $totalApplications = count($applications);

        $pendingApplications = collect($applications)
            ->whereIn('status', ['Submitted', 'Under Review'])

            ->count();

        $acceptedApplications = collect($applications)->where('status', 'Accepted')->count();

        $rejectedApplications = collect($applications)->where('status', 'Rejected')->count();

    @endphp



    <div class="min-h-screen bg-slate-50/70 px-4 py-8 sm:px-6 lg:px-10" x-data="{

        search: '',

        filter: 'All',

        selectedApplication: null,

        applications: {{ Illuminate\Support\Js::from($applications) }},



        get filteredApplications() {

            return this.applications.filter(application => {

                const keyword = this.search.toLowerCase();



                const matchesSearch =

                    application.title.toLowerCase().includes(keyword) ||

                    application.organization.toLowerCase().includes(keyword);



                const matchesFilter =

                    this.filter === 'All' ||

                    application.status === this.filter;



                return matchesSearch && matchesFilter;

            });

        }

    }">

        <div class="mx-auto max-w-7xl space-y-8">



            {{-- Page Heading --}}

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-2 flex items-center gap-2 text-sm font-medium text-blue-600">

                        <a href="{{ route('student.home') }}" class="hover:text-blue-800">Home</a>

                        <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6" />

                        </svg>

                        <span class="text-slate-500">My Applications</span>

                    </div>



                    <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">

                        My Applications

                    </h1>

                    <p class="mt-2 text-sm text-slate-500 sm:text-base">

                        Track and manage all your submitted applications in one place.

                    </p>

                </div>



                <a href="{{ route('student.opportunities') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md">

                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5" />

                    </svg>

                    Explore Opportunities

                </a>

            </div>



            {{-- Statistics --}}

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">



                <div
                    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">Total Applications</p>

                            <h2 class="mt-2 text-3xl font-bold text-slate-900">{{ $totalApplications }}</h2>

                            <p class="mt-1 text-xs text-slate-400">All submitted applications</p>

                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-5 8h6m-6 4h6" />

                            </svg>

                        </div>

                    </div>

                </div>



                <div
                    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">In Progress</p>

                            <h2 class="mt-2 text-3xl font-bold text-slate-900">{{ $pendingApplications }}</h2>

                            <p class="mt-1 text-xs text-slate-400">Waiting for a decision</p>

                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 8v4l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />

                            </svg>

                        </div>

                    </div>

                </div>



                <div
                    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">Accepted</p>

                            <h2 class="mt-2 text-3xl font-bold text-slate-900">{{ $acceptedApplications }}</h2>

                            <p class="mt-1 text-xs text-slate-400">Successfully accepted</p>

                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="m5 12 4 4L19 6" />

                            </svg>

                        </div>

                    </div>

                </div>



                <div
                    class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">Rejected</p>

                            <h2 class="mt-2 text-3xl font-bold text-slate-900">{{ $rejectedApplications }}</h2>

                            <p class="mt-1 text-xs text-slate-400">Applications not accepted</p>

                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-50 text-rose-600">

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M6 18 18 6M6 6l12 12" />

                            </svg>

                        </div>

                    </div>

                </div>



            </div>



            {{-- Applications List --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">



                <div class="border-b border-slate-100 p-5 sm:p-6">

                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                        <div>

                            <h2 class="text-lg font-bold text-slate-900">Application History</h2>

                            <p class="mt-1 text-sm text-slate-500">

                                Keep track of your opportunity applications.

                            </p>

                        </div>



                        {{-- Search --}}

                        <div class="relative w-full lg:max-w-xs">

                            <svg class="absolute left-3.5 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">

                                <circle cx="11" cy="11" r="7" stroke-width="1.8" />

                                <path stroke-linecap="round" stroke-width="1.8" d="m16 16 4 4" />

                            </svg>

                            <input type="text" x-model="search" placeholder="Search applications..."
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-50">

                        </div>

                    </div>



                    {{-- Filters --}}

                    <div class="mt-5 flex gap-2 overflow-x-auto pb-1">

                        <template x-for="status in ['All', 'Submitted', 'Under Review', 'Accepted', 'Rejected']"
                            :key="status">

                            <button type="button" @click="filter = status"
                                class="shrink-0 rounded-lg px-4 py-2 text-sm font-medium transition"
                                :class="filter === status ?

                                    'bg-blue-600 text-white shadow-sm' :

                                    'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                                x-text="status"></button>

                        </template>

                    </div>

                </div>



                {{-- Application Cards --}}

                <div class="divide-y divide-slate-100">



                    <template x-for="application in filteredApplications" :key="application.id">

                        <div class="p-5 transition hover:bg-slate-50/70 sm:p-6">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">



                                {{-- Organization Initial --}}

                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl text-base font-bold"
                                    :class="{

                                        'bg-blue-100 text-blue-700': application.color === 'blue',

                                        'bg-violet-100 text-violet-700': application.color === 'violet',

                                        'bg-amber-100 text-amber-700': application.color === 'amber',

                                        'bg-emerald-100 text-emerald-700': application.color === 'emerald',

                                        'bg-rose-100 text-rose-700': application.color === 'rose'

                                    }"
                                    x-text="application.initials"></div>



                                {{-- Application Information --}}

                                <div class="min-w-0 flex-1">

                                    <div class="flex flex-wrap items-center gap-2">

                                        <h3 class="text-base font-bold text-slate-900" x-text="application.title"></h3>

                                        <span class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600"
                                            x-text="application.category"></span>

                                    </div>



                                    <p class="mt-1 text-sm text-slate-500" x-text="application.organization"></p>



                                    <div class="mt-3 flex flex-wrap gap-x-5 gap-y-2 text-xs text-slate-400">

                                        <span class="inline-flex items-center gap-1.5">

                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">

                                                <rect x="3" y="4" width="18" height="17" rx="2"
                                                    stroke-width="1.7" />

                                                <path stroke-linecap="round" stroke-width="1.7"
                                                    d="M16 2v4M8 2v4M3 10h18" />

                                            </svg>

                                            Applied:

                                            <span class="font-medium text-slate-600"
                                                x-text="application.applied_at"></span>

                                        </span>



                                        <span class="inline-flex items-center gap-1.5">

                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">

                                                <circle cx="12" cy="12" r="9" stroke-width="1.7" />

                                                <path stroke-linecap="round" stroke-width="1.7" d="M12 7v5l3 2" />

                                            </svg>

                                            Deadline:

                                            <span class="font-medium text-slate-600" x-text="application.deadline"></span>

                                        </span>

                                    </div>

                                </div>



                                {{-- Status & Detail --}}

                                <div
                                    class="flex shrink-0 flex-row items-center justify-between gap-4 sm:flex-col sm:items-end">

                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full px-3 py-1.5 text-xs font-semibold"
                                        :class="{

                                            'bg-slate-100 text-slate-600': application.status === 'Submitted',

                                            'bg-amber-50 text-amber-700': application.status === 'Under Review',

                                            'bg-emerald-50 text-emerald-700': application.status === 'Accepted',

                                            'bg-rose-50 text-rose-700': application.status === 'Rejected'

                                        }">

                                        <span class="h-1.5 w-1.5 rounded-full"
                                            :class="{

                                                'bg-slate-400': application.status === 'Submitted',

                                                'bg-amber-500': application.status === 'Under Review',

                                                'bg-emerald-500': application.status === 'Accepted',

                                                'bg-rose-500': application.status === 'Rejected'

                                            }"></span>

                                        <span x-text="application.status"></span>

                                    </span>



                                    <button type="button" @click="selectedApplication = application"
                                        class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 transition hover:text-blue-800">

                                        View Details



                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="m9 18 6-6-6-6" />

                                        </svg>

                                    </button>

                                </div>



                            </div>

                        </div>

                    </template>



                    {{-- Empty State --}}

                    <div x-show="filteredApplications.length === 0" x-cloak class="px-6 py-16 text-center">

                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                    d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />

                            </svg>

                        </div>

                        <h3 class="mt-4 text-base font-semibold text-slate-800">No applications found</h3>

                        <p class="mt-1 text-sm text-slate-500">

                            Try changing your search keyword or filter.

                        </p>

                    </div>



                </div>



                <div class="border-t border-slate-100 bg-slate-50/70 px-5 py-4">

                    <p class="text-xs text-slate-400">

                        Showing <span class="font-semibold text-slate-600" x-text="filteredApplications.length"></span>

                        of {{ $totalApplications }} applications

                    </p>

                </div>



            </div>



        </div>





        {{-- Application Detail Modal --}}

        <div x-cloak x-show="selectedApplication !== null" @keydown.escape.window="selectedApplication = null"
            class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4">

            {{-- Overlay --}}

            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" @click="selectedApplication = null"
                x-transition.opacity></div>



            {{-- Modal Container --}}

            <div x-show="selectedApplication !== null" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 scale-95" @click.stop
                class="relative z-10 my-auto w-full max-w-3xl overflow-hidden rounded-2xl bg-white shadow-2xl">



                {{-- Header --}}

                <div class="flex items-center justify-between border-b border-slate-100 p-5 sm:p-6">

                    <div>

                        <h2 class="text-xl font-bold text-slate-900">Application Details</h2>

                        <p class="mt-1 text-sm text-slate-500">

                            Review your submitted application information.

                        </p>

                    </div>



                    <button type="button" @click="selectedApplication = null"
                        class="rounded-lg p-2 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                        aria-label="Close modal">

                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 18 6M6 6l12 12" />

                        </svg>

                    </button>

                </div>



                {{-- Modal Body --}}

                <div class="max-h-[75vh] space-y-7 overflow-y-auto p-5 sm:p-6">



                    {{-- Opportunity Information --}}

                    <section>

                        <div class="flex items-start gap-4">

                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl text-lg font-bold"
                                :class="{

                                    'bg-blue-100 text-blue-700': selectedApplication?.color === 'blue',

                                    'bg-violet-100 text-violet-700': selectedApplication?.color === 'violet',

                                    'bg-amber-100 text-amber-700': selectedApplication?.color === 'amber',

                                    'bg-emerald-100 text-emerald-700': selectedApplication?.color === 'emerald',

                                    'bg-rose-100 text-rose-700': selectedApplication?.color === 'rose'

                                }"
                                x-text="selectedApplication?.initials"></div>



                            <div class="min-w-0 flex-1">

                                <span class="rounded-md bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700"
                                    x-text="selectedApplication?.category"></span>



                                <h3 class="mt-2 text-lg font-bold text-slate-900" x-text="selectedApplication?.title">

                                </h3>



                                <p class="mt-1 text-sm text-slate-500" x-text="selectedApplication?.organization"></p>

                            </div>

                        </div>



                        <div class="mt-5">

                            <h4 class="text-sm font-bold text-slate-900">Opportunity Description</h4>

                            <p class="mt-2 text-sm leading-7 text-slate-600" x-text="selectedApplication?.description">

                            </p>

                        </div>



                        <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">

                            <div class="rounded-xl bg-slate-50 p-4">

                                <p class="text-xs text-slate-400">Location</p>

                                <p class="mt-1 text-sm font-semibold text-slate-800"
                                    x-text="selectedApplication?.location"></p>

                            </div>



                            <div class="rounded-xl bg-slate-50 p-4">

                                <p class="text-xs text-slate-400">Opportunity Type</p>

                                <p class="mt-1 text-sm font-semibold text-slate-800" x-text="selectedApplication?.type">

                                </p>

                            </div>

                        </div>

                    </section>



                    <div class="border-t border-slate-100"></div>



                    {{-- Application Information --}}

                    <section>

                        <h4 class="text-base font-bold text-slate-900">Application Information</h4>



                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">

                            <div>

                                <p class="text-xs text-slate-400">Application Number</p>

                                <p class="mt-1 text-sm font-semibold text-slate-800"
                                    x-text="selectedApplication?.application_number"></p>

                            </div>



                            <div>

                                <p class="text-xs text-slate-400">Application Status</p>

                                <span class="mt-1 inline-flex rounded-full px-3 py-1 text-xs font-semibold"
                                    :class="{

                                        'bg-slate-100 text-slate-600': selectedApplication?.status === 'Submitted',

                                        'bg-amber-50 text-amber-700': selectedApplication?.status === 'Under Review',

                                        'bg-emerald-50 text-emerald-700': selectedApplication?.status === 'Accepted',

                                        'bg-rose-50 text-rose-700': selectedApplication?.status === 'Rejected'

                                    }"
                                    x-text="selectedApplication?.status"></span>

                            </div>



                            <div>

                                <p class="text-xs text-slate-400">Application Date</p>

                                <p class="mt-1 text-sm font-semibold text-slate-800"
                                    x-text="selectedApplication?.applied_at"></p>

                            </div>



                            <div>

                                <p class="text-xs text-slate-400">Registration Deadline</p>

                                <p class="mt-1 text-sm font-semibold text-slate-800"
                                    x-text="selectedApplication?.deadline"></p>

                            </div>

                        </div>

                    </section>



                    <div class="border-t border-slate-100"></div>



                    {{-- Requirements --}}

                    <section>

                        <h4 class="text-base font-bold text-slate-900">Requirements</h4>



                        <ul class="mt-3 space-y-2">

                            <template x-for="(requirement, index) in selectedApplication?.requirements || []"
                                :key="index">

                                <li class="flex items-start gap-2 text-sm text-slate-600">

                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m5 12 4 4L19 6" />

                                    </svg>

                                    <span x-text="requirement"></span>

                                </li>

                            </template>

                        </ul>



                        <div class="mt-4">

                            <p class="text-xs font-semibold text-slate-500">Eligibility</p>

                            <p class="mt-1 text-sm leading-6 text-slate-600" x-text="selectedApplication?.eligibility">

                            </p>

                        </div>

                    </section>



                    <div class="border-t border-slate-100"></div>



                    {{-- Benefits --}}

                    <section>

                        <h4 class="text-base font-bold text-slate-900">Benefits</h4>



                        <ul class="mt-3 space-y-2">

                            <template x-for="(benefit, index) in selectedApplication?.benefits || []"
                                :key="index">

                                <li class="flex items-start gap-2 text-sm text-slate-600">

                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-emerald-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m5 12 4 4L19 6" />

                                    </svg>

                                    <span x-text="benefit"></span>

                                </li>

                            </template>

                        </ul>

                    </section>



                    <div class="border-t border-slate-100"></div>



                    {{-- Submitted Documents --}}

                    <section>

                        <h4 class="text-base font-bold text-slate-900">Submitted Documents</h4>

                        <p class="mt-1 text-xs text-slate-400">

                            Documents included in your application.

                        </p>



                        <div class="mt-4 space-y-3">

                            <template x-for="(document, index) in selectedApplication?.documents || []"
                                :key="index">

                                <div class="flex items-center gap-3 rounded-xl border border-slate-200 p-3">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">

                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                                d="M14 2v6h6M8 13h8M8 17h8" />

                                        </svg>

                                    </div>



                                    <div class="min-w-0 flex-1">

                                        <p class="truncate text-sm font-semibold text-slate-800" x-text="document.name">

                                        </p>

                                        <p class="text-xs text-slate-400"
                                            x-text="document.type + ' document · Demo data'"></p>

                                    </div>



                                    <span class="text-xs font-medium text-slate-400">Preview only</span>

                                </div>

                            </template>

                        </div>

                    </section>



                    <div class="border-t border-slate-100"></div>



                    {{-- Application Answers --}}

                    <section>

                        <h4 class="text-base font-bold text-slate-900">Application Answers</h4>

                        <p class="mt-1 text-xs text-slate-400">

                            Your responses to the application questions.

                        </p>



                        <div class="mt-4 space-y-4">

                            <template x-for="(item, index) in selectedApplication?.answers || []" :key="index">

                                <div class="rounded-xl bg-slate-50 p-4">

                                    <p class="text-sm font-semibold text-slate-800" x-text="item.question"></p>



                                    <p class="mt-2 text-sm leading-6 text-slate-600" x-text="item.answer"></p>

                                </div>

                            </template>

                        </div>

                    </section>

                </div>



                {{-- Footer --}}

                <div class="flex justify-end border-t border-slate-100 bg-slate-50/70 p-5">

                    <button type="button" @click="selectedApplication = null"
                        class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Close

                    </button>

                </div>

            </div>

        </div>





    </div>

@endsection
