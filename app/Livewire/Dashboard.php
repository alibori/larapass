<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

final class Dashboard extends Component
{
    #[Layout('layouts.larapass')]
    public function render(): View|Factory|Application
    {
        return view('livewire.dashboard');
    }
}
