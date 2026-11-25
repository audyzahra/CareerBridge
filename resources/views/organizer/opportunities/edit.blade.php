
@extends('layouts.organizer')

@section('title', 'Edit Opportunity - CareerBridge')

@section('content')

@php
    // Dummy opportunity data for the Edit page
    $opportunity = [
        'title' => 'National Business Plan Competition 2026',
        'category' => 'competition',
        'location' => 'Jakarta, Indonesia',
        'description' => 'The National Business Plan Competition 2026 is a national-level competition designed for university students to develop innovative, creative, and sustainable business ideas.',
        'requirements' => "1. Active D3/D4/Bachelor's degree student.\n2. Form a team consisting of 2-3 members.\n3. Submit a business proposal according to the requirements.",
        'eligibility' => "Active students from all universities across Indonesia.\nParticipants must have a valid student identification card.",
        'benefits' => "1. Millions of rupiah in total prizes.\n2. National-level certificate.\n3. Mentoring sessions with business professionals.\n4. Networking opportunities.",
        'registration_start' => '2026-11-01',
        'registration_deadline' => '2026-12-15',
        'registration_url' => 'https://example.com/register',
        'status' => 'published',
        'verification_status' => 'verified',
    ];
@endphp

<div class="space-y-8">

    {{-- PAGE HEADER --}}
    <div class="relative overflow-hidden rounded-3xl border border-[#D5E8F7]
        bg-gradient-to-r from-[#DCEEFF] via-[#E5F1FC] to-[#EDF6FC]
        p-6 shadow-sm sm:p-8">

        <div class="pointer-events-none absolute -right-10 -top-16
            h-52 w-52 rounded-full bg-white/30"></div>

        <div class="pointer-events-none absolute -bottom-20 right-32
            h-40 w-40 rounded-full bg-[#A9D4F2]/20"></div>

        <div class="relative">

            <a href="{{ route('organizer.opportunities.index') }}"
                class="inline-flex items-center gap-2 text-xs font-semibold
                text-[#6286A3] transition hover:text-[#397DAE]">

                <span>←</span>
                Back to My Opportunities
            </a>

            <div class="mt-5 inline-flex items-center gap-2 rounded-full
                border border-[#B9D9F1] bg-white/70 px-3 py-1.5">

                <span class="h-2 w-2 rounded-full bg-[#65B5E8]"></span>

                <span class="text-xs font-bold tracking-wide text-[#47799F]">
                    ORGANIZER PORTAL
                </span>

            </div>

            <h1 class="mt-4 text-2xl font-extrabold tracking-tight
                text-[#294D6B] sm:text-3xl">
                Edit Opportunity
            </h1>

            <p class="mt-2 max-w-xl text-sm leading-relaxed text-[#58758D]">
                Update your opportunity information and details to keep them
                accurate and appealing to students.
            </p>

        </div>
    </div>


    {{-- EDIT INFORMATION --}}
    <div class="grid grid-cols-1 items-start gap-6 xl:grid-cols-3">

        {{-- MAIN FORM --}}
        <div class="space-y-6 xl:col-span-2">

            <form action="#" method="POST" enctype="multipart/form-data"
                class="space-y-6">

                @csrf
                @method('PUT')

                {{-- BASIC INFORMATION --}}
                <div class="overflow-hidden rounded-2xl border border-[#E0EAF2]
                    bg-white shadow-sm">

                    <div class="border-b border-slate-100 px-6 py-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center
                                rounded-xl bg-sky-100 text-lg text-sky-600">
                                ✦
                            </div>

                            <div>
                                <h2 class="font-bold text-[#304F6B]">
                                    Opportunity Information
                                </h2>

                                <p class="mt-1 text-xs text-slate-400">
                                    Update the basic opportunity information.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="space-y-5 p-6">

                        {{-- Title --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Opportunity Title
                                <span class="text-rose-500">*</span>
                            </label>

                            <input type="text"
                                name="title"
                                value="{{ $opportunity['title'] }}"
                                class="w-full rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm text-slate-700
                                outline-none transition focus:border-[#78B8E3]
                                focus:ring-2 focus:ring-sky-100">
                        </div>


                        {{-- Category and Location --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                    Opportunity Category
                                </label>

                                <select name="category"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-600
                                    outline-none focus:border-[#78B8E3]">

                                    <option value="scholarship" @selected($opportunity['category'] === 'scholarship')>Scholarship</option>
                                    <option value="internship" @selected($opportunity['category'] === 'internship')>Internship</option>
                                    <option value="competition" @selected($opportunity['category'] === 'competition')>Competition</option>
                                    <option value="training" @selected($opportunity['category'] === 'training')>Training</option>

                                </select>
                            </div>


                            <div>
                                <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                    Location
                                </label>

                                <input type="text"
                                    name="location"
                                    value="{{ $opportunity['location'] }}"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-700
                                    outline-none focus:border-[#78B8E3]">
                            </div>

                        </div>


                        {{-- Description --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Opportunity Description
                            </label>

                            <textarea name="description" rows="6"
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none focus:border-[#78B8E3]">{{ $opportunity['description'] }}</textarea>
                        </div>

                    </div>

                </div>


                {{-- REQUIREMENTS AND BENEFITS --}}
                <div class="overflow-hidden rounded-2xl border border-[#E0EAF2]
                    bg-white shadow-sm">

                    <div class="border-b border-slate-100 px-6 py-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center
                                rounded-xl bg-violet-100 text-lg text-violet-600">
                                ♙
                            </div>

                            <div>
                                <h2 class="font-bold text-[#304F6B]">
                                    Requirements & Benefits
                                </h2>

                                <p class="mt-1 text-xs text-slate-400">
                                    Update participant criteria and opportunity benefits.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="space-y-5 p-6">

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Requirements
                            </label>

                            <textarea name="requirements" rows="4"
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none focus:border-[#78B8E3]">{{ $opportunity['requirements'] }}</textarea>
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Eligibility Criteria
                            </label>

                            <textarea name="eligibility" rows="4"
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none focus:border-[#78B8E3]">{{ $opportunity['eligibility'] }}</textarea>
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Benefits
                            </label>

                            <textarea name="benefits" rows="4"
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none focus:border-[#78B8E3]">{{ $opportunity['benefits'] }}</textarea>
                        </div>

                    </div>

                </div>


                {{-- REGISTRATION --}}
                <div class="overflow-hidden rounded-2xl border border-[#E0EAF2]
                    bg-white shadow-sm">

                    <div class="border-b border-slate-100 px-6 py-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center
                                rounded-xl bg-emerald-100 text-lg text-emerald-600">
                                ◷
                            </div>

                            <div>
                                <h2 class="font-bold text-[#304F6B]">
                                    Registration Information
                                </h2>

                                <p class="mt-1 text-xs text-slate-400">
                                    Set the registration period and registration link.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="space-y-5 p-6">

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                    Registration Start Date
                                </label>

                                <input type="date"
                                    name="registration_start"
                                    value="{{ $opportunity['registration_start'] }}"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-600
                                    outline-none focus:border-[#78B8E3]">
                            </div>


                            <div>
                                <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                    Registration Deadline
                                </label>

                                <input type="date"
                                    name="registration_deadline"
                                    value="{{ $opportunity['registration_deadline'] }}"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-600
                                    outline-none focus:border-[#78B8E3]">
                            </div>

                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Registration Link
                            </label>

                            <input type="url"
                                name="registration_url"
                                value="{{ $opportunity['registration_url'] }}"
                                class="w-full rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm text-slate-700
                                outline-none focus:border-[#78B8E3]">
                        </div>

                    </div>

                </div>


                {{-- ACTION BUTTONS --}}
                <div class="flex flex-col-reverse justify-end gap-3 sm:flex-row">

                    <a href="{{ route('organizer.opportunities.index') }}"
                        class="inline-flex items-center justify-center rounded-xl
                        border border-[#DCE8F1] bg-white px-6 py-3 text-sm
                        font-bold text-[#668097] transition hover:bg-slate-50">
                        Cancel
                    </a>

                    <button type="button"
                        onclick="alert('Changes will be saved once the backend is available.')"
                        class="inline-flex items-center justify-center gap-2
                        rounded-xl bg-[#65A9D8] px-6 py-3 text-sm font-bold
                        text-white shadow-md shadow-[#8CBFE2]/30
                        transition hover:bg-[#5599C9]">

                        <span>✓</span>
                        Save Changes
                    </button>

                </div>

            </form>

        </div>


        {{-- SIDEBAR --}}
        <div class="space-y-6">

            {{-- CURRENT STATUS --}}
            <div class="overflow-hidden rounded-2xl border border-[#E0EAF2]
                bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-4">

                    <h2 class="text-sm font-bold text-[#304F6B]">
                        Opportunity Status
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Current publication information.
                    </p>

                </div>

                <div class="space-y-4 p-5">

                    <div>
                        <p class="text-xs text-slate-400">
                            Publication Status
                        </p>

                        <span class="mt-2 inline-flex rounded-lg bg-emerald-50
                            px-3 py-1.5 text-xs font-bold text-emerald-600">
                            Published
                        </span>
                    </div>

                    <div class="border-t border-slate-100 pt-4">

                        <p class="text-xs text-slate-400">
                            Verification Status
                        </p>

                        <span class="mt-2 inline-flex rounded-lg bg-blue-50
                            px-3 py-1.5 text-xs font-bold text-blue-600">
                            ✓ Verified
                        </span>

                    </div>

                    <p class="border-t border-slate-100 pt-4 text-xs
                        leading-relaxed text-slate-400">
                        Verification status is managed through the review
                        process conducted by the Super Admin.
                    </p>

                </div>

            </div>


            {{-- POSTER --}}
            <div class="overflow-hidden rounded-2xl border border-[#E0EAF2]
                bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-4">

                    <h2 class="text-sm font-bold text-[#304F6B]">
                        Opportunity Poster
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Update the poster if necessary.
                    </p>

                </div>

                <div class="p-5">

                    <div id="posterContainer"
                        class="relative flex aspect-[4/5] items-center
                        justify-center overflow-hidden rounded-xl
                        bg-gradient-to-br from-blue-400 to-indigo-500">

                        <div class="text-center text-white">

                            <span class="text-5xl">🏆</span>

                            <p class="mt-4 px-5 text-sm font-extrabold">
                                NATIONAL BUSINESS PLAN COMPETITION 2026
                            </p>

                            <p class="mt-2 text-xs text-white/80">
                                Current Poster
                            </p>

                        </div>

                    </div>

                    <label for="poster"
                        class="mt-4 flex cursor-pointer items-center
                        justify-center gap-2 rounded-xl border border-[#C9DFEF]
                        bg-[#F8FBFE] px-4 py-3 text-xs font-bold
                        text-[#5799CE] transition hover:bg-[#EFF7FD]">

                        <span>↑</span>
                        Change Poster

                    </label>

                    <input type="file"
                        id="poster"
                        name="poster_path"
                        accept="image/png,image/jpeg"
                        class="hidden">

                    <p id="fileName" class="mt-2 truncate text-center
                        text-[10px] text-slate-400">
                        PNG, JPG, or JPEG
                    </p>

                </div>

            </div>


            {{-- TIPS --}}
            <div class="rounded-2xl border border-[#CFE3F3]
                bg-gradient-to-br from-[#E5F2FC] to-[#F2F8FD] p-5">

                <div class="flex items-center gap-2">

                    <span class="text-xl">💡</span>

                    <h3 class="text-sm font-bold text-[#426D8D]">
                        Update Tips
                    </h3>

                </div>

                <ul class="mt-4 space-y-3 text-xs leading-relaxed text-[#66849D]">

                    <li class="flex gap-2">
                        <span>✓</span>
                        Make sure all opportunity information is accurate.
                    </li>

                    <li class="flex gap-2">
                        <span>✓</span>
                        Double-check the registration deadline.
                    </li>

                    <li class="flex gap-2">
                        <span>✓</span>
                        Use a clear and informative poster.
                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>


{{-- POSTER PREVIEW --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const posterInput = document.getElementById('poster');
    const posterContainer = document.getElementById('posterContainer');
    const fileName = document.getElementById('fileName');

    let currentPreviewUrl = null;

    posterInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) return;

        if (!['image/jpeg', 'image/png'].includes(file.type)) {
            alert('Please select a PNG or JPG file.');
            this.value = '';
            return;
        }

        if (currentPreviewUrl) {
            URL.revokeObjectURL(currentPreviewUrl);
        }

        currentPreviewUrl = URL.createObjectURL(file);

        posterContainer.innerHTML = '';

        const image = document.createElement('img');

        image.src = currentPreviewUrl;
        image.alt = 'Poster Preview';
        image.className = 'h-full w-full object-cover';

        posterContainer.appendChild(image);

        fileName.textContent = file.name;

    });

});
</script>

@endsection
