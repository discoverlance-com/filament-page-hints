<?php

namespace Discoverlance\FilamentPageHints\Http\Livewire;

use Discoverlance\FilamentPageHints\Concerns\HintForm;
use Discoverlance\FilamentPageHints\Models\PageHint;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Component;

/**
 * @property ComponentContainer $form
 */
class PageHints extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public ?Collection $pageHints;

    public ?PageHint $model = null;

    public ?string $title = '';

    public ?string $hint = '';

    public ?string $route = '';

    public ?string $url = '';

    public function mount(): void
    {
        $this->pageHints = $this->getPageHintItems();

        $this->model = new PageHint;
        $current_route = Route::currentRouteName();
        $current_url = url()->current();
        $this->form->fill([
            'title' => $this->model->title,
            'hint' => $this->model->hint,
            'route' => $this->model->route ?? $current_route,
            'url' => $this->model->url ?? $current_url,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            HintForm::getTitleComponent(),
            HintForm::getHintComponent(),
            Forms\Components\Hidden::make('route'),
            Forms\Components\Hidden::make('url'),
        ];
    }

    public function getPageHintItems()
    {
        $current_route = Route::currentRouteName();
        $current_url = url()->current();

        return PageHint::where('route', $current_route)
            ->where('url', $current_url)
            ->get();
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        if ($model) {
            $model->update($data);
        } else {
            PageHint::create($data);
        }

        Notification::make()
            ->title(__('filament-page-hints::translations.notification.upsert'))
            ->success()
            ->send();
        $this->redirectRoute($data['route']);
    }

    public function editPageHint(PageHint $hint): void
    {
        $this->model = $hint;
        $this->form->fill([
            'title' => $this->model->title,
            'hint' => $this->model->hint,
            'route' => $this->model->route,
            'url' => $this->model->url,
        ]);
    }

    public function deletePageHint(PageHint $hint): void
    {
        $hint->delete();
        Notification::make()
            ->title(__('filament-page-hints::translations.notification.delete'))
            ->success()
            ->send();
        $this->redirectRoute($hint->route);
    }

    protected function getFormModel(): PageHint
    {
        return $this->model;
    }

    public function render(): View
    {
        return view('filament-page-hints::page-hints');
    }
}
