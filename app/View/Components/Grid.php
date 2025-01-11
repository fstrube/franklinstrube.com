<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Grid extends Component
{
    public $data;
    public $paginated;

    /**
     * Create a new component instance.
     */
    public function __construct($data, $paginated = false)
    {
        $this->data = $data;
        $this->paginated = $paginated;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grid', ['data' => $this->data]);
    }
}
