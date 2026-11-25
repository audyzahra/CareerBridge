@extends('layouts.public')

@section('title', 'Apply for Opportunity')

@section('content')
<div class="min-h-screen bg-slate-50 py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back Button --}}
        <a href="{{ route('opportunities.show', $opportunity->slug) }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 mb-6">
            &larr; Back to Opportunity
        </a>

        {{-- Header --}}
        <div class="mb-8">
            <p class="text-sm font-semibold text-blue-600 mb-2">
                APPLICATION FORM
            </p>

            <h1 class="text-3xl font-bold text-slate-900">
                Apply for Opportunity
            </h1>

            <p class="mt-2 text-slate-500">
                Complete the form below to submit your application.
            </p>
        </div>

        {{-- Opportunity Information --}}
        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5 mb-6">
            <p class="text-sm text-blue-600 font-medium mb-1">
                You are applying for
            </p>

            <h2 class="text-xl font-bold text-slate-900">
                {{ $opportunity->title }}
            </h2>

            @if($opportunity->organizerProfile)
                <p class="text-sm text-slate-500 mt-1">
                    {{ $opportunity->organizerProfile->organization_name
                        ?? $opportunity->organizerProfile->name
                        ?? 'Organizer' }}
                </p>
            @endif
        </div>

        {{-- Error Messages --}}
        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">
                <p class="font-semibold mb-2">Please check the following errors:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Application Form --}}
        <form action="{{ route('student.opportunities.apply', $opportunity->slug) }}"
              method="POST"
              class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">

            @csrf

            {{-- Resume Selection --}}
            <div class="mb-6">
                <label for="resume_id" class="block text-sm font-semibold text-slate-700 mb-2">
                    Select Your Resume
                </label>

                <select name="resume_id"
                        id="resume_id"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none">

                    <option value="">No resume selected</option>

                    @foreach($resumes as $resume)
                        <option value="{{ $resume->id }}"
                            {{ old('resume_id') == $resume->id ? 'selected' : '' }}>
                            {{ $resume->file_name }}
                        </option>
                    @endforeach
                </select>

                @if($resumes->isEmpty())
                    <p class="text-xs text-amber-600 mt-2">
                        You haven't uploaded a resume yet. You can submit your application without one.
                    </p>
                @else
                    <p class="text-xs text-slate-400 mt-2">
                        Choose the resume you want to include in your application.
                    </p>
                @endif

                @error('resume_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Cover Letter --}}
            <div class="mb-8">
                <label for="cover_letter" class="block text-sm font-semibold text-slate-700 mb-2">
                    Cover Letter
                    <span class="text-slate-400 font-normal">(Optional)</span>
                </label>

                <textarea name="cover_letter"
                          id="cover_letter"
                          rows="7"
                          maxlength="5000"
                          placeholder="Tell the organizer why you are interested in this opportunity and why you are a suitable candidate..."
                          class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none resize-y">{{ old('cover_letter') }}</textarea>

                <p class="text-xs text-slate-400 mt-2">
                    Maximum 5,000 characters.
                </p>

                @error('cover_letter')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-6 border-t border-slate-100">

                <a href="{{ route('opportunities.show', $opportunity->slug) }}"
                   class="inline-flex justify-center items-center px-6 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm hover:bg-slate-50 transition">
                    Cancel
                </a>

                <button type="submit"
                        onclick="return confirm('Are you sure you want to submit this application?')"
                        class="inline-flex justify-center items-center px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold text-sm hover:bg-blue-700 transition">
                    Submit Application
                </button>

            </div>
        </form>

    </div>
</div>
@endsection
