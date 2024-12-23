<?php

namespace App\View\Components;

use App\Models\Employee;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    public $currentUser;
    public $staff;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->staff = User::where('id', Auth::id())->firstOrFail();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
