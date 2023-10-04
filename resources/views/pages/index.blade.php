<?php
use function Livewire\Volt\{state, rules, form};
use App\Livewire\Forms\UrlForm;

form(UrlForm::class);

$submit = function () {
    $this->form->validate();
}
?>

<x-app-layout>
    @volt
        <form wire:submit="submit">
            <input type="text" id="url" wire:model="form.url" class="w-full rounded-lg border-slate-300 text-slate-800 h-14 px-5 text-lg placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500" placeholder="e.g. https://google.com">

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
