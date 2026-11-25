
@extends('layouts.organizer')

@section('title', 'Add Opportunity - CareerBridge')

@section('content')

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
                Add New Opportunity
            </h1>

            <p class="mt-2 max-w-xl text-sm leading-relaxed text-[#58758D]">
                Share scholarship, internship, competition, and training opportunities
                to help students develop their potential.
            </p>

        </div>
    </div>


    {{-- FORM LAYOUT --}}
    <div class="grid grid-cols-1 items-start gap-6 xl:grid-cols-3">

        {{-- MAIN FORM --}}
        <div class="space-y-6 xl:col-span-2">

            <form action="#" method="POST" enctype="multipart/form-data"
                class="space-y-6">

                @csrf

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
                                    Enter the basic information about the opportunity you are creating.
                                </p>
                            </div>

                        </div>
                    </div>


                    <div class="space-y-5 p-6">

                        {{-- Title --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold
                                text-[#456783]">
                                Opportunity Title
                                <span class="text-rose-500">*</span>
                            </label>

                            <input type="text"
                                name="title"
                                placeholder="Example: National Business Plan Competition 2026"
                                class="w-full rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm text-slate-700
                                outline-none transition placeholder:text-slate-300
                                focus:border-[#78B8E3] focus:ring-2 focus:ring-sky-100">
                        </div>


                        {{-- Category & Location --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label class="mb-2 block text-sm font-semibold
                                    text-[#456783]">
                                    Opportunity Category
                                    <span class="text-rose-500">*</span>
                                </label>

                                <select name="category"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-600
                                    outline-none focus:border-[#78B8E3]">

                                    <option value="">Select Category</option>
                                    <option value="scholarship">Scholarship</option>
                                    <option value="internship">Internship</option>
                                    <option value="competition">Competition</option>
                                    <option value="training">Training</option>

                                </select>
                            </div>


                            <div>
                                <label class="mb-2 block text-sm font-semibold
                                    text-[#456783]">
                                    Location
                                </label>

                                <input type="text"
                                    name="location"
                                    placeholder="Example: Jakarta / Online"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-700
                                    outline-none placeholder:text-slate-300
                                    focus:border-[#78B8E3]">
                            </div>

                        </div>


                        {{-- Description --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold
                                text-[#456783]">
                                Opportunity Description
                                <span class="text-rose-500">*</span>
                            </label>

                            <textarea name="description"
                                rows="6"
                                placeholder="Provide complete information about this opportunity..."
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none placeholder:text-slate-300
                                focus:border-[#78B8E3] focus:ring-2 focus:ring-sky-100"></textarea>

                            <p class="mt-2 text-xs text-slate-400">
                                Provide a clear description so students can understand this opportunity.
                            </p>
                        </div>

                    </div>

                </div>


                {{-- REQUIREMENTS & BENEFITS --}}
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
                                    Specify participant criteria and the benefits they will receive.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="space-y-5 p-6">

                        {{-- Requirements --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold
                                text-[#456783]">
                                Requirements
                            </label>

                            <textarea name="requirements"
                                rows="4"
                                placeholder="List the requirements participants must fulfill..."
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none placeholder:text-slate-300
                                focus:border-[#78B8E3]"></textarea>
                        </div>


                        {{-- Eligibility --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold
                                text-[#456783]">
                                Eligibility Criteria
                            </label>

                            <textarea name="eligibility"
                                rows="4"
                                placeholder="Example: Active Diploma/Bachelor's students from universities across Indonesia..."
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none placeholder:text-slate-300
                                focus:border-[#78B8E3]"></textarea>
                        </div>


                        {{-- Benefits --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold
                                text-[#456783]">
                                Benefits
                            </label>

                            <textarea name="benefits"
                                rows="4"
                                placeholder="Describe the benefits participants will receive..."
                                class="w-full resize-y rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm leading-relaxed
                                text-slate-700 outline-none placeholder:text-slate-300
                                focus:border-[#78B8E3]"></textarea>
                        </div>

                    </div>

                </div>


                {{-- REGISTRATION INFORMATION --}}
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
                                    Set the registration period and opportunity registration link.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="space-y-5 p-6">

                        {{-- Registration Dates --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label class="mb-2 block text-sm font-semibold
                                    text-[#456783]">
                                    Registration Start Date
                                </label>

                                <input type="date"
                                    name="registration_start"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-600
                                    outline-none focus:border-[#78B8E3]">
                            </div>


                            <div>
                                <label class="mb-2 block text-sm font-semibold
                                    text-[#456783]">
                                    Registration Deadline
                                </label>

                                <input type="date"
                                    name="registration_deadline"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    bg-white px-4 py-3 text-sm text-slate-600
                                    outline-none focus:border-[#78B8E3]">
                            </div>

                        </div>


                        {{-- Registration URL --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold
                                text-[#456783]">
                                Registration Link
                            </label>

                            <input type="url"
                                name="registration_url"
                                placeholder="https://example.com/register"
                                class="w-full rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm text-slate-700
                                outline-none placeholder:text-slate-300
                                focus:border-[#78B8E3]">

                            <p class="mt-2 text-xs text-slate-400">
                                Enter an external link for participant registration.
                            </p>
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
                        onclick="alert('The save feature will be enabled once the backend is available.')"
                        class="inline-flex items-center justify-center gap-2
                        rounded-xl border border-[#B9D9F1] bg-[#EDF6FC]
                        px-6 py-3 text-sm font-bold text-[#5289B5]
                        transition hover:bg-[#DCEEFF]">

                        Save as Draft
                    </button>

                    <button type="button"
                        onclick="alert('The publishing feature will be enabled once the backend is available.')"
                        class="inline-flex items-center justify-center gap-2
                        rounded-xl bg-[#65A9D8] px-6 py-3 text-sm font-bold
                        text-white shadow-md shadow-[#8CBFE2]/30
                        transition hover:bg-[#5599C9]">

                        <span>✓</span>
                        Publish
                    </button>

                </div>

            </form>

        </div>


        {{-- SIDEBAR INFORMATION --}}
        <div class="space-y-6">

            {{-- Poster Upload --}}
            <div class="overflow-hidden rounded-2xl border border-[#E0EAF2]
                bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-4">

                    <h2 class="text-sm font-bold text-[#304F6B]">
                        Opportunity Poster
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Upload an opportunity promotional image.
                    </p>

                </div>

                <div class="p-5">

                    <label for="poster"
                        class="flex cursor-pointer flex-col items-center
                        justify-center rounded-2xl border-2 border-dashed
                        border-[#C9DFEF] bg-[#F8FBFE] px-4 py-10
                        text-center transition hover:border-[#78B8E3]
                        hover:bg-[#EFF7FD]">

                        <div class="flex h-14 w-14 items-center justify-center
                            rounded-2xl bg-[#DCEEFF] text-2xl text-[#5799CE]">
                            ↑
                        </div>

                        <p class="mt-4 text-sm font-bold text-[#456783]">
                            Click to upload poster
                        </p>

                        <p class="mt-2 text-xs text-slate-400">
                            PNG, JPG, or JPEG
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Recommended aspect ratio: 4:5
                        </p>

                    </label>

                    <input type="file"
                        id="poster"
                        name="poster_path"
                        accept="image/png,image/jpeg"
                        class="hidden">

                    <div id="posterPreview" class="mt-4 hidden">

                        <img id="previewImage"
                            src=""
                            alt="Poster Preview"
                            class="max-h-64 w-full rounded-xl border
                            border-slate-100 object-contain">

                        <p id="fileName"
                            class="mt-2 truncate text-xs text-slate-400">
                        </p>

                    </div>

                </div>

            </div>


            {{-- Publication Information --}}
            <div class="rounded-2xl border border-[#CFE3F3]
                bg-gradient-to-br from-[#E5F2FC] to-[#F2F8FD] p-5">

                <div class="flex items-center gap-2">

                    <div class="flex h-9 w-9 items-center justify-center
                        rounded-xl bg-white text-[#5799CE]">
                        ✦
                    </div>

                    <h3 class="text-sm font-bold text-[#426D8D]">
                        Publication Information
                    </h3>

                </div>

                <div class="mt-4 space-y-3 text-xs leading-relaxed text-[#66849D]">

                    <p>
                        <span class="font-bold text-[#426D8D]">
                            Save as Draft
                        </span>
                        to save an opportunity without making it publicly visible.
                    </p>

                    <p>
                        <span class="font-bold text-[#426D8D]">
                            Publish
                        </span>
                        to submit the opportunity for display to students.
                    </p>

                    <p>
                        The opportunity verification status will be determined through a review process.
                    </p>

                </div>

            </div>


            {{-- Tips --}}
            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">

                <div class="flex items-center gap-2">

                    <span class="text-xl">💡</span>

                    <h3 class="text-sm font-bold text-[#304F6B]">
                        Tips for Creating Opportunities
                    </h3>

                </div>

                <ul class="mt-4 space-y-3 text-xs leading-relaxed text-slate-500">

                    <li class="flex gap-2">
                        <span class="text-[#65A9D8]">✓</span>
                        Use a clear and attractive opportunity title.
                    </li>

                    <li class="flex gap-2">
                        <span class="text-[#65A9D8]">✓</span>
                        Explain participant requirements in detail.
                    </li>

                    <li class="flex gap-2">
                        <span class="text-[#65A9D8]">✓</span>
                        Provide an accurate registration deadline.
                    </li>

                    <li class="flex gap-2">
                        <span class="text-[#65A9D8]">✓</span>
                        Use an informative and high-quality poster.
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
        const previewContainer = document.getElementById('posterPreview');
        const previewImage = document.getElementById('previewImage');
        const fileName = document.getElementById('fileName');

        let currentPreviewUrl = null;

        posterInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            if (!['image/jpeg', 'image/png'].includes(file.type)) {
                alert('Please select a PNG or JPG file.');
                this.value = '';
                return;
            }

            if (currentPreviewUrl) {
                URL.revokeObjectURL(currentPreviewUrl);
            }

            currentPreviewUrl = URL.createObjectURL(file);

            previewImage.src = currentPreviewUrl;
            fileName.textContent = file.name;

            previewContainer.classList.remove('hidden');

        });

    });
</script>

@endsection
