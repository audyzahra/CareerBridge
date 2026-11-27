@extends('layouts.organizer')

@section('title', 'Add Opportunity - CareerBridge')

@section('content')

<div class="space-y-8">

    {{-- PAGE HEADER --}}
    <div class="rounded-3xl border border-[#D5E8F7]
        bg-gradient-to-r from-[#DCEEFF] via-[#E5F1FC] to-[#EDF6FC]
        p-6 shadow-sm sm:p-8">

        <a href="{{ route('organizer.opportunities.index') }}"
            class="text-xs font-semibold text-[#6286A3] hover:text-[#397DAE]">
            ← Back to My Opportunities
        </a>

        <p class="mt-5 inline-flex rounded-full border border-[#B9D9F1]
            bg-white/70 px-3 py-1.5 text-xs font-bold tracking-wide
            text-[#47799F]">
            ORGANIZER PORTAL
        </p>

        <h1 class="mt-4 text-2xl font-extrabold text-[#294D6B] sm:text-3xl">
            Add New Opportunity
        </h1>

        <p class="mt-2 max-w-xl text-sm text-[#58758D]">
            Share scholarship, internship, competition, and training
            opportunities with students.
        </p>

    </div>


    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">

            <p class="font-bold">
                Please correct the following errors:
            </p>

            <ul class="mt-2 list-inside list-disc">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <form id="opportunityForm"
        action="{{ route('organizer.opportunities.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="grid grid-cols-1 items-start gap-6 xl:grid-cols-3">

        @csrf


        {{-- MAIN FORM --}}
        <div class="space-y-6 xl:col-span-2">


            {{-- BASIC INFORMATION --}}
            <section class="rounded-2xl border border-[#E0EAF2]
                bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">

                    <h2 class="font-bold text-[#304F6B]">
                        Opportunity Information
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Enter the basic information about the opportunity.
                    </p>

                </div>


                <div class="space-y-5 p-6">

                    {{-- TITLE --}}
                    <div>

                        <label class="mb-2 block text-sm font-semibold text-[#456783]">
                            Opportunity Title
                            <span class="text-rose-500">*</span>
                        </label>

                        <input type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            maxlength="255"
                            placeholder="Example: National Business Plan Competition 2026"
                            class="w-full rounded-xl border border-[#DCE8F1]
                            px-4 py-3 text-sm outline-none
                            focus:border-[#78B8E3]">

                        @error('title')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- CATEGORY AND LOCATION --}}
                    <div class="grid gap-5 sm:grid-cols-2">

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Opportunity Category
                                <span class="text-rose-500">*</span>
                            </label>

                            <select name="category"
                                required
                                class="w-full rounded-xl border border-[#DCE8F1]
                                bg-white px-4 py-3 text-sm">

                                <option value="">Select Category</option>

                                @foreach([
                                    'scholarship' => 'Scholarship',
                                    'internship' => 'Internship',
                                    'competition' => 'Competition',
                                    'training' => 'Training'
                                ] as $value => $label)

                                    <option value="{{ $value }}"
                                        @selected(old('category') === $value)>
                                        {{ $label }}
                                    </option>

                                @endforeach

                            </select>

                            @error('category')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>


                        <div>

                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                Location
                            </label>

                            <input type="text"
                                name="location"
                                value="{{ old('location') }}"
                                placeholder="Example: Jakarta / Online"
                                class="w-full rounded-xl border border-[#DCE8F1]
                                px-4 py-3 text-sm">

                            @error('location')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div>

                        <label class="mb-2 block text-sm font-semibold text-[#456783]">
                            Opportunity Description
                            <span class="text-rose-500">*</span>
                        </label>

                        <textarea name="description"
                            rows="6"
                            required
                            placeholder="Provide complete information about this opportunity..."
                            class="w-full rounded-xl border border-[#DCE8F1]
                            px-4 py-3 text-sm outline-none
                            focus:border-[#78B8E3]">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </section>


            {{-- REQUIREMENTS AND BENEFITS --}}
            <section class="rounded-2xl border border-[#E0EAF2]
                bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">
                    <h2 class="font-bold text-[#304F6B]">
                        Requirements & Benefits
                    </h2>
                </div>

                <div class="space-y-5 p-6">

                    @foreach([
                        'requirements' => 'Requirements',
                        'eligibility' => 'Eligibility Criteria',
                        'benefits' => 'Benefits'
                    ] as $field => $label)

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                {{ $label }}
                            </label>

                            <textarea name="{{ $field }}"
                                rows="4"
                                class="w-full rounded-xl border border-[#DCE8F1]
                                px-4 py-3 text-sm outline-none
                                focus:border-[#78B8E3]">{{ old($field) }}</textarea>

                            @error($field)
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                    @endforeach

                </div>

            </section>


            {{-- REGISTRATION INFORMATION --}}
            <section class="rounded-2xl border border-[#E0EAF2]
                bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5">
                    <h2 class="font-bold text-[#304F6B]">
                        Registration Information
                    </h2>
                </div>

                <div class="space-y-5 p-6">

                    <div class="grid gap-5 sm:grid-cols-2">

                        @foreach([
                            'registration_start' => 'Registration Start Date',
                            'registration_deadline' => 'Registration Deadline'
                        ] as $field => $label)

                            <div>

                                <label class="mb-2 block text-sm font-semibold text-[#456783]">
                                    {{ $label }}
                                </label>

                                <input type="date"
                                    name="{{ $field }}"
                                    value="{{ old($field) }}"
                                    class="w-full rounded-xl border border-[#DCE8F1]
                                    px-4 py-3 text-sm">

                                @error($field)
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>

                        @endforeach

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-semibold text-[#456783]">
                            Registration Link
                        </label>

                        <input type="url"
                            name="registration_url"
                            value="{{ old('registration_url') }}"
                            placeholder="https://example.com/register"
                            class="w-full rounded-xl border border-[#DCE8F1]
                            px-4 py-3 text-sm">

                        @error('registration_url')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </section>


            {{-- ACTION BUTTONS --}}
            <div class="flex flex-col-reverse justify-end gap-3 sm:flex-row">

                <a href="{{ route('organizer.opportunities.index') }}"
                    class="rounded-xl border border-[#DCE8F1] bg-white
                    px-6 py-3 text-center text-sm font-bold text-[#668097]">
                    Cancel
                </a>

                <button type="submit"
                    name="status"
                    value="draft"
                    class="rounded-xl border border-[#B9D9F1]
                    bg-[#EDF6FC] px-6 py-3 text-sm font-bold text-[#5289B5]">

                    Save as Draft

                </button>

                <button type="submit"
                    name="status"
                    value="published"
                    class="rounded-xl bg-[#65A9D8] px-6 py-3
                    text-sm font-bold text-white hover:bg-[#5599C9]">

                    Publish Opportunity

                </button>

            </div>

        </div>


        {{-- SIDEBAR --}}
        <aside class="space-y-6">


            {{-- POSTER UPLOAD --}}
            <section class="rounded-2xl border border-[#E0EAF2]
                bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-4">

                    <h2 class="text-sm font-bold text-[#304F6B]">
                        Opportunity Poster
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Upload a promotional image.
                    </p>

                </div>

                <div class="p-5">

                    <label for="poster"
                        class="flex cursor-pointer flex-col items-center
                        justify-center rounded-2xl border-2 border-dashed
                        border-[#C9DFEF] bg-[#F8FBFE] px-4 py-10
                        text-center hover:border-[#78B8E3]">

                        <span class="text-3xl text-[#5799CE]">↑</span>

                        <span class="mt-4 text-sm font-bold text-[#456783]">
                            Click to upload poster
                        </span>

                        <span class="mt-2 text-xs text-slate-400">
                            PNG or JPG · Maximum 2 MB
                        </span>

                    </label>


                    <input type="file"
                        id="poster"
                        name="poster_path"
                        form="opportunityForm"
                        accept="image/png,image/jpeg"
                        class="hidden">


                    @error('poster_path')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror


                    <div id="posterPreview" class="mt-4 hidden">

                        <img id="previewImage"
                            src=""
                            alt="Poster preview"
                            class="max-h-64 w-full rounded-xl object-contain">

                        <p id="fileName"
                            class="mt-2 truncate text-xs text-slate-400">
                        </p>

                    </div>

                </div>

            </section>


            {{-- PUBLICATION INFORMATION --}}
            <section class="rounded-2xl border border-[#CFE3F3]
                bg-gradient-to-br from-[#E5F2FC] to-[#F2F8FD] p-5">

                <h3 class="text-sm font-bold text-[#426D8D]">
                    Publication Information
                </h3>

                <div class="mt-4 space-y-3 text-xs leading-relaxed text-[#66849D]">

                    <p>
                        <strong>Save as Draft</strong>
                        saves the opportunity without publishing it.
                    </p>

                    <p>
                        <strong>Publish Opportunity</strong>
                        submits it for display to students.
                    </p>

                    <p>
                        New opportunities are assigned a pending verification status.
                    </p>

                </div>

            </section>

        </aside>

    </form>

</div>


{{-- POSTER PREVIEW --}}
<script>
document.addEventListener('DOMContentLoaded', () => {

    const input = document.getElementById('poster');
    const preview = document.getElementById('posterPreview');
    const image = document.getElementById('previewImage');
    const fileName = document.getElementById('fileName');

    let previewUrl = null;

    input?.addEventListener('change', function () {

        const file = this.files?.[0];

        if (!file) return;

        if (
            !['image/jpeg', 'image/png'].includes(file.type) ||
            file.size > 2 * 1024 * 1024
        ) {
            alert('Choose a PNG or JPG image no larger than 2 MB.');
            this.value = '';
            return;
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);

        image.src = previewUrl;
        fileName.textContent = file.name;

        preview.classList.remove('hidden');

    });

});
</script>

@endsection 
