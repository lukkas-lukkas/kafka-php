<?php

namespace EcommercePhp\Shared\UI\Http\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Bus\Dispatcher;

class AbstractAction extends Controller
{
    public function __construct(protected Dispatcher $dispatcher)
    {
    }
}
