<x-app-layout>
    <div class="w-full">
        <form>
            {{-- Short link result (show when we have a result) --}}
            <div>
                <p>Boom &mdash; your short link is ready!</p>
                <div class="relative">
                    <div class="relative mt-2">
                        {{-- Readonly input to show shortened URL --}}
                        <input type="text" readonly class="w-full rounded-lg border-slate-300 text-slate-800 h-14 px-5 text-lg placeholder:text-slate-400
                        focus:ring-2 focus:ring-blue-500 bg-slate-100">

                        {{-- Link to copy shortened URL to the clipboard --}}
                        <button type="button" class="bg-blue-500 text-blue-50 rounded-lg px-6 text-sm h-10 font-medium absolute inset-y-2 right-2">
                            Copy
                        </button>
                    </div>
                </div>
            </div>

            {{-- Input for pre-shortened URL (hide when we have a result) --}}
            <input type="text" name="url" id="url" class="w-full rounded-lg border-slate-300 text-slate-800 h-14 px-5 text-lg placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500" placeholder="e.g. https://google.com" autofocus>

            <div class="flex items-baseline">
                {{-- Button for resetting state --}}
                <button type="button" class="bg-blue-500 text-blue-50 rounded-lg px-10 mt-4 h-11 font-medium">
                    Shorten another link
                </button>

                {{-- Button to submit form --}}
                <button class="bg-blue-500 text-blue-50 rounded-lg px-10 mt-4 h-11 font-medium">
                    Get short link
                </button>

                {{-- Validation errors --}}
                <div class="ml-4 grow text-red-500">
                    Something went wrong
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
