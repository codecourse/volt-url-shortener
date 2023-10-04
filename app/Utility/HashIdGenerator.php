<?php

namespace App\Utility;

use App\Models\Url;
use Hashids\Hashids;

class HashIdGenerator
{
    public function __construct(protected Hashids $hashids) {}

    public function generate()
    {
        $id = Url::latest()->select('id')->first()?->id ?? 0;

        do {
            $id++;
            $hashid = (new Hashids())->encode($id);
        } while (Url::where('hashid', $hashid)->exists());

        return $hashid;
    }
}
