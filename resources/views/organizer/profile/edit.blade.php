@extends('layouts.organizer')

@section('title', 'Edit Organizer Profile')

@section('content')

<div class="mx-auto w-full max-w-4xl space-y-7">

    {{-- Page Header --}}
    <div>
        <a href="{{ route('organizer.profile') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-[#7891A8] hover:text-[#5799CE]">

            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>

            Back to Organizer Profile
        </a>

        <div class="mt-6">
            <p class="text-sm font-semibold text-sky-600">
                Account Management
            </p>

            <h1 class="mt-1 text-3xl font-bold text-[#304F6B]">
                {{ $profile ? 'Edit Organizer Profile' : 'Create Organizer Profile' }}
            </h1>

            <p class="mt-2 text-sm text-[#7891A8]">
                Provide accurate information about your organization.
            </p>
        </div>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-5">
            <p class="text-sm font-bold text-red-700">
                Please check the following information:
            </p>

            <ul class="mt-3 list-inside list-disc space-y-1 text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Profile Form --}}
    <form action="{{ route('organizer.profile.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="overflow-hidden rounded-2xl border border-[#D6E8F5] bg-white shadow-sm">

        @csrf
        @method('PUT')

        {{-- Organization Information Header --}}
        <div class="flex items-center gap-3 border-b border-[#E6F0F7] bg-gradient-to-r from-[#EAF4FA] to-white px-6 py-6 sm:px-9">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white shadow-sm">
                <svg class="h-6 w-6" fill="none" stroke="#5799CE"
                     viewBox="0 0 24 24" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-[#304F6B]">
                    Organization Information
                </h2>

                <p class="mt-1 text-xs text-[#91A5B7]">
                    Tell us about your organization.
                </p>
            </div>
        </div>

        <div class="space-y-6 p-6 sm:p-9">

            {{-- Organization Logo --}}
            <div>
                <label class="mb-3 block text-sm font-semibold text-[#405F79]">
                    Organization Logo
                </label>

                <div class="flex flex-col gap-5 rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] p-5 sm:flex-row sm:items-center">

                    {{-- Logo Preview --}}
                    <div style="width:112px;height:112px;min-width:112px;max-width:112px;flex:0 0 112px;overflow:hidden;border:1px solid #D6E8F5;border-radius:16px;background:#ffffff;display:flex;align-items:center;justify-content:center;">

                        @if($profile?->logo_path)
                            <img id="logo-preview"
                                 src="{{ asset('storage/' . $profile->logo_path) }}"
                                 alt="Organization Logo"
                                 style="display:block;width:100%;height:100%;max-width:100%;max-height:100%;object-fit:contain;padding:8px;">
                        @else
                            <div id="logo-placeholder"
                                 style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:#EAF4FA;">

                                <svg width="42" height="42" viewBox="0 0 24 24"
                                     fill="none" stroke="#5799CE" stroke-width="1.5">
                                    <rect x="3" y="3" width="18" height="18" rx="3"/>
                                    <circle cx="8.5" cy="8.5" r="1.5"/>
                                    <path d="M21 15l-5-5L5 21"/>
                                </svg>
                            </div>

                            <img id="logo-preview"
                                 src=""
                                 alt="Organization Logo Preview"
                                 style="display:none;width:100%;height:100%;max-width:100%;max-height:100%;object-fit:contain;padding:8px;">
                        @endif

                    </div>

                    {{-- Upload Controls --}}
                    <div class="min-w-0 flex-1">

                        <label for="logo"
                               class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-[#5799CE] bg-white px-4 py-2.5 text-sm font-semibold text-[#5799CE] transition hover:bg-[#EAF4FA]">

                            <svg class="h-5 w-5" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24"
                                 stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 16V4m0 0L7 9m5-5l5 5M4 16v3a1 1 0 001 1h14a1 1 0 001-1v-3"/>
                            </svg>

                            Choose Logo
                        </label>

                        <input type="file"
                               id="logo"
                               name="logo"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                               class="hidden">

                        <p id="logo-filename"
                           class="mt-2 break-all text-xs text-[#7891A8]">
                            {{ $profile?->logo_path ? 'Current organization logo' : 'No file selected' }}
                        </p>

                        <p class="mt-2 text-xs leading-5 text-[#91A5B7]">
                            Supported formats: JPG, JPEG, PNG, WEBP.
                            Maximum file size: 2 MB.
                        </p>

                        @if($profile?->logo_path)
                            <label class="mt-3 inline-flex cursor-pointer items-center gap-2 text-xs font-medium text-red-500">

                                <input type="checkbox"
                                       name="remove_logo"
                                       value="1"
                                       class="rounded border-red-300 text-red-500 focus:ring-red-200">

                                Remove current logo
                            </label>
                        @endif

                    </div>
                </div>

                @error('logo')
                    <p class="mt-2 text-xs font-medium text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Organization Name --}}
            <div>
                <label for="organization_name"
                       class="mb-2 block text-sm font-semibold text-[#405F79]">
                    Organization Name <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       id="organization_name"
                       name="organization_name"
                       value="{{ old('organization_name', $profile?->organization_name) }}"
                       placeholder="Enter your organization name"
                       maxlength="255"
                       required
                       class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100">

                @error('organization_name')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Organization Type --}}
            <div>
                <label for="organization_type"
                       class="mb-2 block text-sm font-semibold text-[#405F79]">
                    Organization Type <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       id="organization_type"
                       name="organization_type"
                       value="{{ old('organization_type', $profile?->organization_type) }}"
                       placeholder="e.g. University, Company, NGO, Community"
                       maxlength="100"
                       required
                       class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100">

                @error('organization_type')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description"
                       class="mb-2 block text-sm font-semibold text-[#405F79]">
                    Organization Description
                </label>

                <textarea id="description"
                          name="description"
                          rows="6"
                          placeholder="Describe your organization, its background, and its activities..."
                          class="w-full resize-y rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm leading-6 text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100">{{ old('description', $profile?->description) }}</textarea>

                @error('description')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-[#91A5B7]">
                    Provide a short introduction about your organization.
                </p>
            </div>

        </div>

        {{-- Contact Information Header --}}
        <div class="flex items-center gap-3 border-y border-[#E6F0F7] bg-gradient-to-r from-[#EAF4FA] to-white px-6 py-6 sm:px-9">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white shadow-sm">
                <svg class="h-6 w-6" fill="none" stroke="#5799CE"
                     viewBox="0 0 24 24" stroke-width="1.8">
                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 7l9 6 9-6"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-[#304F6B]">
                    Contact Information
                </h2>

                <p class="mt-1 text-xs text-[#91A5B7]">
                    Add your organization's contact details.
                </p>
            </div>
        </div>

        <div class="space-y-6 p-6 sm:p-9">

            {{-- Contact Email --}}
            <div>
                <label for="contact_email"
                       class="mb-2 block text-sm font-semibold text-[#405F79]">
                    Contact Email <span class="text-red-500">*</span>
                </label>

                <input type="email"
                       id="contact_email"
                       name="contact_email"
                       value="{{ old('contact_email', $profile?->contact_email) }}"
                       placeholder="organization@example.com"
                       maxlength="255"
                       required
                       class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100">

                @error('contact_email')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Website --}}
            <div>
                <label for="website_url"
                       class="mb-2 block text-sm font-semibold text-[#405F79]">
                    Website URL
                </label>

                <input type="url"
                       id="website_url"
                       name="website_url"
                       value="{{ old('website_url', $profile?->website_url) }}"
                       placeholder="https://www.example.com"
                       maxlength="255"
                       class="w-full rounded-xl border border-[#D6E8F5] bg-[#FAFCFE] px-4 py-3 text-sm text-[#405F79] outline-none transition placeholder:text-[#A8BAC9] focus:border-[#5799CE] focus:ring-2 focus:ring-sky-100">

                @error('website_url')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-[#91A5B7]">
                    Include https:// at the beginning of your website address.
                </p>
            </div>

        </div>

        {{-- Form Actions --}}
        <div class="flex flex-col-reverse gap-3 border-t border-[#E6F0F7] bg-[#FAFCFE] px-6 py-6 sm:flex-row sm:justify-end sm:px-9">

            <a href="{{ route('organizer.profile') }}"
               class="inline-flex min-h-[46px] items-center justify-center rounded-xl border border-[#D6E8F5] bg-white px-6 py-3 text-sm font-semibold text-[#7891A8] transition hover:bg-[#F0F7FC]">
                Cancel
            </a>

            <button type="submit"
                    style="background:#5799CE;color:#fff;"
                    class="inline-flex min-h-[46px] items-center justify-center gap-2 rounded-xl px-6 py-3 text-sm font-bold shadow-md transition hover:opacity-90">

                <svg class="h-5 w-5" fill="none"
                     stroke="white" viewBox="0 0 24 24"
                     stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7"/>
                </svg>

                {{ $profile ? 'Save Changes' : 'Create Profile' }}
            </button>

        </div>

    </form>
</div>

{{-- Logo Preview Script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const logoInput = document.getElementById('logo');
    const logoPreview = document.getElementById('logo-preview');
    const logoPlaceholder = document.getElementById('logo-placeholder');
    const logoFilename = document.getElementById('logo-filename');

    if (!logoInput || !logoPreview) return;

    logoInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) return;

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Please select a JPG, PNG, or WEBP image.');
            this.value = '';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('The logo file must not exceed 2 MB.');
            this.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            logoPreview.src = event.target.result;
            logoPreview.style.display = 'block';
            logoPreview.style.width = '100%';
            logoPreview.style.height = '100%';
            logoPreview.style.maxWidth = '100%';
            logoPreview.style.maxHeight = '100%';
            logoPreview.style.objectFit = 'contain';

            if (logoPlaceholder) {
                logoPlaceholder.style.display = 'none';
            }
        };

        reader.readAsDataURL(file);

        if (logoFilename) {
            logoFilename.textContent = file.name;
        }
    });
});
</script>

@endsection
