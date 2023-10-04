<?php
use function Livewire\Volt\{state};

state(['counter' => 0]);

$increment = function () {
    $this->counter++;
}
?>

<x-app-layout>
    @volt
        <div>
            {{ $counter }}
            <button wire:click="increment">Increment</button>
        </div>
    @endvolt
</x-app-layout>
