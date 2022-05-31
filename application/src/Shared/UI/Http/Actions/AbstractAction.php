<?php

namespace EcommercePhp\Shared\UI\Http\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;

class AbstractAction extends Controller
{
    public function __construct(
        protected Dispatcher $dispatcher,
        protected Request $request
    ) {
    }
}
