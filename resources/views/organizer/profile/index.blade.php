@extends('layouts.organizer')

@section('title', 'Organizer Profile')

@section('content')

<div class="w-full space-y-7">

    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-sm font-semibold text-sky-600">
                Account Management
            </p>

            <h1 class="mt-1 text-3xl font-bold text-[#304F6B]">
                Organizer Profile
            </h1>

            <p class="mt-2 text-sm text-[#7891A8]">
                Manage your organization information and contact details.
            </p>
        </div>

        <a href="{{ route('organizer.profile.edit') }}"
           style="display:inline-flex;align-items:center;justify-content:center;gap:9px;background:#5799CE;color:#fff;padding:12px 20px;border-radius:12px;font-size:14px;font-weight:700;text-decoration:none;min-height:46px;box-shadow:0 3px 8px rgba(87,153,206,.18);">

            <svg width="19" height="19" viewBox="0 0 24 24"
                 fill="none" stroke="white" stroke-width="2.2"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 20h9"/>
                <path d="M16.5 3.5a2.1 2.1 0 013 3L9 17l-4 1 1-4 10.5-10.5z"/>
            </svg>

            {{ $profile ? 'Edit Profile' : 'Create Profile' }}
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">

            <svg class="h-5 w-5 shrink-0" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>

            {{ session('success') }}
        </div>
    @endif

    @if($profile)

        {{-- Main Profile Card --}}
        <div class="overflow-hidden rounded-2xl border border-[#D6E8F5] bg-white shadow-sm">

            {{-- Organization Identity --}}
            <div class="flex flex-col gap-5 border-b border-[#E6F0F7] px-7 py-7 sm:flex-row sm:items-center sm:px-9">

                {{-- Organization Logo --}}
                <div style="width:96px;height:96px;min-width:96px;max-width:96px;flex:0 0 96px;overflow:hidden;border:4px solid #ffffff;border-radius:18px;background:#ffffff;display:flex;align-items:center;justify-content:center;box-shadow:0 3px 10px rgba(48,79,107,.12);">

                    @if($profile->logo_path)
                        <img src="{{ asset('storage/' . $profile->logo_path) }}"
                             alt="{{ $profile->organization_name }} Logo"
                             style="display:block;width:100%;height:100%;max-width:100%;max-height:100%;object-fit:contain;padding:5px;"
                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">

                        <div style="display:none;width:100%;height:100%;align-items:center;justify-content:center;background:#5799CE;color:white;font-size:32px;font-weight:800;">
                            {{ strtoupper(substr($profile->organization_name, 0, 1)) }}
                        </div>
                    @else
                        <div style="display:flex;width:100%;height:100%;align-items:center;justify-content:center;background:#5799CE;color:white;font-size:32px;font-weight:800;">
                            {{ strtoupper(substr($profile->organization_name, 0, 1)) }}
                        </div>
                    @endif

                </div>

                {{-- Organization Name --}}
                <div class="min-w-0 flex-1">

                    <h2 class="break-words text-2xl font-bold leading-tight text-[#304F6B]">
                        {{ $profile->organization_name }}
                    </h2>

                    <p class="mt-2 text-sm font-medium text-[#7891A8]">
                        {{ $profile->organization_type }}
                    </p>

                </div>

                {{-- Verification Status --}}
                <div class="shrink-0 sm:ml-auto">

                    @if($profile->verification_status === 'verified')

                        <span class="inline-flex items-center gap-2 rounded-full bg-green-50 px-4 py-2.5 text-xs font-semibold text-green-700">
                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                            Verified
                        </span>

                    @elseif($profile->verification_status === 'rejected')

                        <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-4 py-2.5 text-xs font-semibold text-red-700">
                            <span class="h-2 w-2 rounded-full bg-red-500"></span>
                            Rejected
                        </span>

                    @else

                        <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-4 py-2.5 text-xs font-semibold text-amber-700">
                            <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                            Pending Verification
                        </span>

                    @endif

                </div>
            </div>

            <div class="px-7 py-8 sm:px-9">

                {{-- Organization Information --}}
                <section class="border-b border-[#E6F0F7] pb-8">

                    <div class="mb-7">
                        <h3 class="text-lg font-bold text-[#304F6B]">
                            Organization Information
                        </h3>

                        <p class="mt-1 text-sm text-[#91A5B7]">
                            Basic information about your organization.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-x-10 gap-y-7 md:grid-cols-2">

                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#91A5B7]">
                                Organization Name
                            </p>

                            <p class="mt-2 break-words text-sm font-semibold leading-6 text-[#405F79]">
                                {{ $profile->organization_name }}
                            </p>
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#91A5B7]">
                                Organization Type
                            </p>

                            <p class="mt-2 break-words text-sm font-semibold leading-6 text-[#405F79]">
                                {{ $profile->organization_type }}
                            </p>
                        </div>

                        <div class="min-w-0 md:col-span-2">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#91A5B7]">
                                Description
                            </p>

                            <p class="mt-3 whitespace-pre-line break-words text-sm leading-7 text-[#526F88]">
                                {{ $profile->description ?: 'No organization description has been added yet.' }}
                            </p>
                        </div>

                    </div>
                </section>

                {{-- Contact Information --}}
                <section class="border-b border-[#E6F0F7] py-8">

                    <div class="mb-7">
                        <h3 class="text-lg font-bold text-[#304F6B]">
                            Contact Information
                        </h3>

                        <p class="mt-1 text-sm text-[#91A5B7]">
                            Contact details for your organization.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-x-10 gap-y-7 md:grid-cols-2">

                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#91A5B7]">
                                Contact Email
                            </p>

                            <p class="mt-2 break-all text-sm font-semibold leading-6 text-[#405F79]">
                                {{ $profile->contact_email }}
                            </p>
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#91A5B7]">
                                Website
                            </p>

                            @if($profile->website_url)

                                <a href="{{ $profile->website_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="mt-2 inline-block break-all text-sm font-semibold leading-6 text-sky-600 hover:underline">
                                    {{ $profile->website_url }}
                                </a>

                            @else

                                <p class="mt-2 text-sm leading-6 text-[#91A5B7]">
                                    No website provided.
                                </p>

                            @endif
                        </div>

                    </div>
                </section>

                {{-- Account Information --}}
                <section class="pt-8">

                    <div class="mb-7">
                        <h3 class="text-lg font-bold text-[#304F6B]">
                            Account Information
                        </h3>

                        <p class="mt-1 text-sm text-[#91A5B7]">
                            Information associated with your login account.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-x-10 gap-y-7 md:grid-cols-2">

                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#91A5B7]">
                                Account Name
                            </p>

                            <p class="mt-2 text-sm font-semibold leading-6 text-[#405F79]">
                                {{ auth()->user()->name }}
                            </p>
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#91A5B7]">
                                Account Email
                            </p>

                            <p class="mt-2 break-all text-sm font-semibold leading-6 text-[#405F79]">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                    </div>
                </section>

                {{-- Bottom Action --}}
                <div class="mt-8 flex justify-end border-t border-[#E6F0F7] pt-6">

                    <a href="{{ route('organizer.profile.edit') }}"
                       style="display:inline-flex;align-items:center;justify-content:center;gap:9px;background:#5799CE;color:#fff;padding:12px 22px;border-radius:11px;font-size:14px;font-weight:700;text-decoration:none;min-height:44px;">

                        <svg width="17" height="17" viewBox="0 0 24 24"
                             fill="none" stroke="white" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.1 2.1 0 013 3L9 17l-4 1 1-4 10.5-10.5z"/>
                        </svg>

                        Edit Profile
                    </a>

                </div>

            </div>
        </div>

    @else

        {{-- Empty Profile State --}}
        <div class="flex min-h-[430px] flex-col items-center justify-center rounded-2xl border border-dashed border-[#B8D8EE] bg-white px-6 py-14 text-center shadow-sm">

            <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-[#EAF4FA]">

                <svg width="40" height="40" viewBox="0 0 24 24"
                     fill="none" stroke="#5799CE" stroke-width="1.7"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/>
                    <path d="M9 9v.01M9 12v.01M9 15v.01M9 18v.01"/>
                </svg>

            </div>

            <h2 class="mt-6 text-xl font-bold text-[#304F6B]">
                Complete Your Organizer Profile
            </h2>

            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-[#7891A8]">
                You haven't created your organization profile yet.
                Add your organization information to get started.
            </p>

            <a href="{{ route('organizer.profile.edit') }}"
               style="display:inline-flex;align-items:center;justify-content:center;gap:9px;background:#5799CE;color:#fff;padding:13px 22px;border-radius:12px;font-size:14px;font-weight:700;text-decoration:none;margin-top:26px;">

                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="white" stroke-width="2.5"
                     stroke-linecap="round">
                    <path d="M12 5v14M5 12h14"/>
                </svg>

                Create Organizer Profile
            </a>

        </div>

    @endif

</div>

@endsection
