<?php
use function Livewire\Volt\{state, rules, form};
use App\Livewire\Forms\UrlForm;
use App\Models\Url;
use App\Utility\HashIdGenerator;

state('url');

form(UrlForm::class);

$submit = function (HashIdGenerator $hashIdGenerator) {
    $this->form->validate();

    $this->url = Url::create($this->form->only('url') + [
        'hashid' => $hashIdGenerator->generate()
    ]);
};

$clear = function () {
    $this->form->reset();
    $this->url = null;
};
?>

<x-app-layout>
    @volt
        <form wire:submit="submit">
            @if ($url)
                <div>
                    <p>Boom &mdash; your short link is ready!</p>
                    <div class="mt-2">
                        <div class="relative">
                            <input type="text" readonly class="w-full rounded-lg border-slate-300 text-slate-800 h-14 px-5 text-lg placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500" value="{{ $url->redirectUrl() }}">

                            <button
                                type="button"
                                class="bg-blue-500 text-blue-50 rounded-lg px-6 h-10 font-medium absolute inset-y-2 right-2"
                                x-data="{ url: '{{ $url->redirectUrl() }}', copied: false }"
                                x-on:click="
                                    $clipboard(url)
                                    copied = true

                                    setTimeout(() => {
                                        copied = false
                                    }, 2000)
                                "
                                x-text="copied ? 'Copied!' : 'Copy'"
                            >
                                Copy
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <input type="text" id="url" wire:model="form.url" class="w-full rounded-lg border-slate-300 text-slate-800 h-14 px-5 text-lg placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500" placeholder="e.g. https://google.com" autofocus x-init="$el.focus()">
            @endif

            <div class="flex items-baseline space-x-4">
                @if ($url)
                    <button type="button" wire:click="clear" class="bg-blue-500 text-blue-50 rounded-lg px-10 mt-4 h-11 font-medium">
                        Generate another short URL
                    </button>
                @else
                    <button type="submit" class="bg-blue-500 text-blue-50 rounded-lg px-10 mt-4 h-11 font-medium">Get short URL</button>
                @endif

                @error('form.url')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </form>
    @endvolt
</x-app-layout>
