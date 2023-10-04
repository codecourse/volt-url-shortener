<?php
use function Livewire\Volt\{state, mount};
use function Laravel\Folio\name;
use App\Models\Url;

name('redirect');
// state(['url' => fn () => $url]);

mount(function (Url $url) {
    $url->increment('visits');

    redirect($url->url, 301);
});
?>

@volt
    <div>
        You should be redirected
    </div>
@endvolt
