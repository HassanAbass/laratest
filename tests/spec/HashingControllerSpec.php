<?php

namespace spec;

use App\Http\Controllers\HashingController;
use PhpSpec\ObjectBehavior;

class HashingControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(HashingController::class);
    }
}
