@extends('layouts.student')

@section('title', 'Notifications | CareerBridge')

@section('content')

@php
    $notifications = [
        [
            'id' => 1,
            'type' => 'application',
            'title' => 'Application Under Review',
            'message' => 'Your application for UI/UX Design Competition 2026 is currently being reviewed by the organizer.',
            'time' => '10 minutes ago',
            'date' => 'Today',
            'read' => false,
        ],
        [
            'id' => 2,
            'type' => 'opportunity',
            'title' => 'New Opportunity Available',
            'message' => 'A new Digital Marketing Internship opportunity has been published. Check it out and apply before the deadline.',
            'time' => '2 hours ago',
            'date' => 'Today',
            'read' => false,
        ],
        [
            'id' => 3,
            'type' => 'application',
            'title' => 'Application Accepted!',
            'message' => 'Congratulations! Your application for Digital Marketing Internship has been accepted.',
            'time' => 'Yesterday',
            'date' => 'Yesterday',
            'read' => false,
        ],
        [
            'id' => 4,
            'type' => 'system',
            'title' => 'Complete Your Student Profile',
            'message' => 'Make your profile stand out by adding your portfolio and LinkedIn profile.',
            'time' => '2 days ago',
            'date' => 'Earlier',
            'read' => true,
        ],
        [
            'id' => 5,
            'type' => 'application',
            'title' => 'Application Status Updated',
            'message' => 'Your application for Future Leaders Scholarship 2026 has been updated.',
            'time' => '3 days ago',
            'date' => 'Earlier',
            'read' => true,
        ],
        [
            'id' => 6,
            'type' => 'system',
            'title' => 'Welcome to CareerBridge!',
            'message' => 'Welcome aboard! Discover opportunities, develop your skills, and take the next step in your career journey.',
            'time' => '1 week ago',
            'date' => 'Earlier',
            'read' => true,
        ],
    ];
@endphp

<div
    class="min-h-screen bg-slate-50/70"
    x-data="{
        activeFilter: 'all',
        notifications: @js($notifications),

        get unreadCount() {
            return this.notifications.filter(item => !item.read).length;
        },

        get filteredNotifications() {
            if (this.activeFilter === 'unread') {
                return this.notifications.filter(item => !item.read);
            }

            if (this.activeFilter === 'read') {
                return this.notifications.filter(item => item.read);
            }

            return this.notifications;
        },

        markAsRead(id) {
            const item = this.notifications.find(item => item.id === id);
            if (item) item.read = true;
        },

        markAllAsRead() {
            this.notifications.forEach(item => item.read = true);
        }
    }"
>

    <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

            <div>
                <div class="mb-3 flex items-center gap-2 text-sm font-semibold text-blue-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Z"/>
                        <path d="M10 21h4"/>
                    </svg>
                    STAY UPDATED
                </div>

                <h1 class="text-3xl font-extrabold tracking-tight text-slate-800 sm:text-4xl">
                    Notifications
                </h1>

                <p class="mt-2 text-sm text-slate-500 sm:text-base">
                    Stay informed about your applications and the latest opportunities.
                </p>
            </div>

            <button
                type="button"
                @click="markAllAsRead()"
                :disabled="unreadCount === 0"
                class="inline-flex items-center justify-center gap-2 self-start rounded-xl border border-blue-200 bg-white px-4 py-2.5 text-sm font-semibold text-blue-600 transition hover:bg-blue-50 disabled:cursor-not-allowed disabled:opacity-40 sm:self-center"
            >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="m5 12 4 4L19 6"/>
                </svg>
                Mark all as read
            </button>

        </div>

        {{-- Notification Summary --}}
        <div class="mb-7 grid grid-cols-1 gap-4 sm:grid-cols-3">

            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Notifications</p>
                        <p class="mt-2 text-3xl font-extrabold text-slate-800"
                            x-text="notifications.length"></p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Z"/>
                            <path d="M10 21h4"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs text-slate-400">All your notifications</p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Unread</p>
                        <p class="mt-2 text-3xl font-extrabold text-blue-600"
                            x-text="unreadCount"></p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Z"/>
                            <path d="M12 6v5m0 3h.01"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs text-slate-400">Waiting for you to read</p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Read</p>
                        <p class="mt-2 text-3xl font-extrabold text-emerald-600"
                            x-text="notifications.filter(item => item.read).length"></p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="m5 12 4 4L19 6"/>
                            <circle cx="12" cy="12" r="9"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs text-slate-400">Previously read notifications</p>
            </div>

        </div>

        {{-- Notification List --}}
        <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">

            {{-- List Header --}}
            <div class="border-b border-slate-100 p-5 sm:p-6">

                <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                    <div>
                        <h2 class="text-lg font-bold text-slate-800">
                            Your Notifications
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            All updates and activities in one place.
                        </p>
                    </div>

                    {{-- Filter Tabs --}}
                    <div class="flex flex-wrap gap-2">

                        <button
                            type="button"
                            @click="activeFilter = 'all'"
                            :class="activeFilter === 'all'
                                ? 'bg-blue-600 text-white'
                                : 'bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-blue-600'"
                            class="rounded-full px-4 py-2 text-xs font-bold transition"
                        >
                            All
                            <span x-text="notifications.length"></span>
                        </button>

                        <button
                            type="button"
                            @click="activeFilter = 'unread'"
                            :class="activeFilter === 'unread'
                                ? 'bg-blue-600 text-white'
                                : 'bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-blue-600'"
                            class="rounded-full px-4 py-2 text-xs font-bold transition"
                        >
                            Unread
                            <span x-text="unreadCount"></span>
                        </button>

                        <button
                            type="button"
                            @click="activeFilter = 'read'"
                            :class="activeFilter === 'read'
                                ? 'bg-blue-600 text-white'
                                : 'bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-blue-600'"
                            class="rounded-full px-4 py-2 text-xs font-bold transition"
                        >
                            Read
                        </button>

                    </div>
                </div>

            </div>

            {{-- Notifications --}}
            <div class="divide-y divide-slate-100">

                <template x-for="notification in filteredNotifications" :key="notification.id">

                    <article
                        class="flex gap-4 px-5 py-5 transition hover:bg-slate-50/80 sm:px-6"
                        :class="!notification.read ? 'bg-blue-50/30' : 'bg-white'"
                    >

                        {{-- Notification Icon --}}
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl"
                            :class="{
                                'bg-blue-100 text-blue-600': notification.type === 'application',
                                'bg-cyan-100 text-cyan-600': notification.type === 'opportunity',
                                'bg-violet-100 text-violet-600': notification.type === 'system'
                            }"
                        >

                            {{-- Application --}}
                            <svg x-show="notification.type === 'application'" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"/>
                                <path d="M14 3v5h5M9 13h6M9 17h6"/>
                            </svg>

                            {{-- Opportunity --}}
                            <svg x-show="notification.type === 'opportunity'" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="m12 3 2.2 6.8L21 12l-6.8 2.2L12 21l-2.2-6.8L3 12l6.8-2.2L12 3Z"/>
                            </svg>

                            {{-- System --}}
                            <svg x-show="notification.type === 'system'" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 11v5m0-8h.01"/>
                            </svg>

                        </div>

                        {{-- Notification Content --}}
                        <div class="min-w-0 flex-1">

                            <div class="flex flex-col justify-between gap-2 sm:flex-row sm:items-start">

                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">

                                        <h3
                                            class="text-sm font-bold text-slate-800"
                                            x-text="notification.title"
                                        ></h3>

                                        <span
                                            x-show="!notification.read"
                                            class="h-2 w-2 rounded-full bg-blue-500"
                                            title="Unread"
                                        ></span>

                                        <span
                                            x-show="!notification.read"
                                            class="rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-bold text-blue-600"
                                        >
                                            New
                                        </span>

                                    </div>

                                    <p
                                        class="mt-2 text-sm leading-6 text-slate-500"
                                        x-text="notification.message"
                                    ></p>
                                </div>

                                <span
                                    class="shrink-0 text-xs text-slate-400"
                                    x-text="notification.time"
                                ></span>

                            </div>

                            <div class="mt-3 flex items-center justify-between gap-3">

                                <span
                                    class="text-[11px] font-semibold uppercase tracking-wider text-slate-400"
                                    x-text="notification.date"
                                ></span>

                                <button
                                    x-show="!notification.read"
                                    type="button"
                                    @click="markAsRead(notification.id)"
                                    class="text-xs font-bold text-blue-600 transition hover:text-blue-800"
                                >
                                    Mark as read
                                </button>

                                <span
                                    x-show="notification.read"
                                    class="text-xs font-medium text-emerald-600"
                                >
                                    Read
                                </span>

                            </div>

                        </div>

                    </article>

                </template>

                {{-- Empty State --}}
                <div
                    x-show="filteredNotifications.length === 0"
                    x-cloak
                    class="px-6 py-16 text-center"
                >
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Z"/>
                            <path d="M10 21h4"/>
                        </svg>
                    </div>

                    <h3 class="mt-5 text-base font-bold text-slate-700">
                        No notifications found
                    </h3>

                    <p class="mt-2 text-sm text-slate-400">
                        There are no notifications in this category right now.
                    </p>
                </div>

            </div>

            {{-- Footer --}}
            <div class="border-t border-slate-100 bg-slate-50/60 px-5 py-4 text-center">
                <p class="text-xs text-slate-400">
                    You're all caught up with your notifications.
                </p>
            </div>

        </section>

    </div>
</div>

@endsection
