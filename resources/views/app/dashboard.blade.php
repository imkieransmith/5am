<x-app-layout>
    <section class="max-w-screen-sm mx-auto p-4">
        <a href="/day/new" class="flex items-center justify-between bg-white p-4 shadow rounded-lg mb-4">
            <h3>Add new goals</h3>

            <p class="flex items-center justify-start text-gray-500 text-sm">
                <span class="mr-2">Add New</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            </p>
        </a>
        @foreach($days as $day)
            <a href="/day/{{ $day->date->format('Y-m-d') }}" class="flex items-center justify-between bg-white p-4 shadow rounded-lg mb-4">
                <h3>{{ $day->date->format('l jS F Y') }}</h3>

                <p class="flex items-center justify-start text-gray-500 text-sm">
                    @if($day->status == 'completed')
                        <span class="mr-2">Completed</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    @endif

                    @if($day->status == 'upcoming')
                        <span class="mr-2">Upcoming</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    @endif

                    @if($day->status == 'inprogress')
                        <span class="mr-2">In Progress</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" /></svg>
                    @endif
                </p>
            </a>
        @endforeach
    </section>
</x-app-layout>
