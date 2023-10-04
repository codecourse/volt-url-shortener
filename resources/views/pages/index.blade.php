<?php
use function Livewire\Volt\{state, rules, form};
use App\Livewire\Forms\UrlForm;
use App\Models\Url;

state('url');

form(UrlForm::class);

$submit = function () {
    $this->form->validate();

    $this->url = Url::create($this->form->only('url') + [
        'hashid' => 'abc'
    ]);
}
?>

<x-app-layout>
    @volt
        <form wire:submit="submit">
            @if ($url)
                <div>
                    <p>Boom &mdash; your short link is ready!</p>
                    <div class="mt-2">
                        <input type="text" readonly class="w-full rounded-lg border-slate-300 text-slate-800 h-14 px-5 text-lg placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500" value="{{ $url->id }}">
                    </div>
                </div>
            @else
                <input type="text" id="url" wire:model="form.url" class="w-full rounded-lg border-slate-300 text-slate-800 h-14 px-5 text-lg placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500" placeholder="e.g. https://google.com">
            @endif

            <div class="flex items-baseline space-x-4">
                <button type="submit" class="bg-blue-500 text-blue-50 rounded-lg px-10 mt-4 h-11 font-medium">Get short URL</button>

                @error('form.url')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </form>
    @endvolt
</x-app-layout>
