<x-app-layout>
    <section class="max-w-screen-sm mx-auto p-4">
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-2xl pb-2 mb-4 border-b border-gray-100">{{ $day->date->format('l jS F Y') }}</h2>

            <h3 class="text-xl">Wellness</h3>
            <p class="text-xs pb-2 mb-2 border-b border-gray-100">How you're planning to start your morning.</p>
            @if($day->wellness)
                <div class="md:flex items-start justify-between mb-6">
                    <p class="mr-4 mb-2 md:mb-0">{{ $day->wellness }}</p>
                    <button type="button" class="flex items-center justify-start text-sm hover:underline whitespace-nowrap ml-auto"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg> Mark as completed</button>
                </div>
            @else
                <p class="mb-6">No wellness task has been set.</p>
            @endif

            <h3 class="text-xl">Goals</h3>
            <p class="text-xs pb-2 mb-2 border-b border-gray-100">What you're planning to achieve with your morning.</p>
            @if(count($day->goals))
                @foreach($day->goals as $goal)
                    <div class="md:flex items-start justify-between mb-6">
                        <p class="mr-4 mb-2 md:mb-0">{{ $goal->aim }}</p>
                        <button type="button" class="flex items-center justify-start text-sm hover:underline whitespace-nowrap ml-auto"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg> Mark as completed</button>
                    </div>
                @endforeach
            @else
                <p class="mb-6">No goals have been set.</p>
            @endif

            <div class="flex items-center justify-between">
                <a
                    href="/dashboard"
                    class="px-4 py-2 border border-gray-700 rounded-md font-semibold text-xs text-900 hover:text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 disabled:opacity-50"
                >Dashboard</a>
                <button type="button" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 disabled:opacity-50">Save the days progress</button>
            </div>
        </div>
    </section>
</x-app-layout>
