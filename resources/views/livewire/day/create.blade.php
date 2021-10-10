<form wire:submit.prevent="create()" class="bg-white p-4 shadow rounded-lg">
    <h2 class="text-2xl pb-2 mb-4 border-b border-gray-100">Get ready for a new day</h2>

    <div
        class="mb-4"
        x-data="{}"
        x-init="$wire.set('timezone', Intl.DateTimeFormat().resolvedOptions().timeZone)"
    >
        <p class="font-bold mb-1">Date</p>
        <p>{{ $date->format('l jS F Y') }}</p>
    </div>

    <fieldset class="mb-4">
        <legend class="font-bold mb-1">Day on or off?</legend>

        <label for="5am" class="mr-4">
            <span><input type="radio" wire:model.defer="type" name="type" id="5am" value="5am" selected required> Starting at 5am</span>
        </label>
        <br class="sm:hidden" />
        <label for="dayoff">
            <span><input type="radio" wire:model.defer="type" name="type" id="dayoff" value="dayoff" required> Day off</span>
        </label>
    </fieldset>

    <div class="mb-4" x-data="{selected: ''}">
        <label for="wellness" class="font-bold mb-1">Wellness</label>
        <input type="text" wire:model.defer="wellness" name="wellness" id="wellness" class="block w-full  rounded-md mb-2" x-bind:value="selected">

        <p>
            <span class="inline-block bg-gray-100 hover:bg-gray-200 px-4 py-2 mr-2 mb-2 rounded-md transition ease-in-out duration-100" x-on:click="selected = 'Walk'">Morning Walk</span>
            <span class="inline-block bg-gray-100 hover:bg-gray-200 px-4 py-2 mr-2 mb-2 rounded-md transition ease-in-out duration-100" x-on:click="selected = 'Yoga'">Yoga</span>
            <span class="inline-block bg-gray-100 hover:bg-gray-200 px-4 py-2 mr-2 mb-2 rounded-md transition ease-in-out duration-100" x-on:click="selected = 'Meditation'">Meditation</span>
        </p>
    </div>

    <fieldset class="mb-4" x-data="{goals: [], currentgoal: ''}">
        <legend class="font-bold mb-1">Goals for the day</legend>

        <p class="bg-gray-100 px-4 py-1 rounded-md mb-1" x-show="!goals.length">Add your first goal below.</p>
        <ul class="list-disc pl-6 mb-1" x-show="goals.length">
            <template x-for="(goal, index) in goals">
                <li x-text="goal"></li>
            </template>
        </ul>

        <label for=""></label>
        <textarea name="name" id="" rows="2" class="block w-full rounded-md resize-none" x-model="currentgoal"></textarea>
        <p class="text-right"><button type="button" class="underline" x-on:click.prevent="goals.push(currentgoal); currentgoal = ''; $wire.set('goals', goals)">Add Goal</button></p>
    </fieldset>

    @if($errors->any())
        <div class="flex items-center justify-between bg-yellow-200 py-2 px-4 mb-4 rounded-md">
            <i class="fas fa-exclamation-circle text-yellow-600 mr-4" aria-hidden="true"></i>
            <div class="flex-1">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <div class="flex items-center justify-between">
        <a
            href="/dashboard"
            class="px-4 py-2 border border-gray-700 rounded-md font-semibold text-xs text-900 hover:text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 disabled:opacity-50"
        >Dashboard</a>
        <button
            class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 disabled:opacity-50"
            type="submit"
            name="submit"
            id="submit"
        ><span wire:loading>Saving...</span><span wire:loading.remove>Save Day</span></button>
    </div>
</form>
