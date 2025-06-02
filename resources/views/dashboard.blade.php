<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-2xl font-semibold">Welcome, {{ Auth::user()->name }}</h1>
    </div>
</x-layouts.app>
