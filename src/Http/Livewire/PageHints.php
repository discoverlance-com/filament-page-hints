<?php

namespace Discoverlance\FilamentPageHints\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Discoverlance\FilamentPageHints\Facades\FilamentPageHints;
use \Discoverlance\FilamentPageHints\Models\PageHint;
use Filament\Forms\ComponentContainer;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\CreateAction;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Filament\Forms;


class PageHints extends Component implements Forms\Contracts\HasForms
{
    public ?Collection $pageHints;

    public function mount(): void
    {
        $this->pageHints = $this->getPageHintItems();
    }

    public function getPageHintItems()
    {
        $current_route = Route::currentRouteName();
        $current_url = url()->current();

        return PageHint::where('route', $current_route)
            ->orWhere('url', $current_url)
            ->get();
    }

    public function submit(): void {

    }

    public function deletePageHint($id) {
        
    }
    public function render(): View
    {
        return view('filament-page-hints::page-hints');
    }
}
