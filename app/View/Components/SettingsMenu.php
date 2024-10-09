<?php

  namespace App\View\Components;

  use AllowDynamicProperties;
  use Closure;
  use Illuminate\Contracts\View\View;
  use Illuminate\View\Component;

  #[AllowDynamicProperties] class SettingsMenu extends Component
  {
    public $hideButtons; // Definir la propiedad

    /**
     * Create a new component instance.
     */
    public function __construct($hideButtons = false){
      $this->hideButtons = $hideButtons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render():View|Closure|string{
      return view('components.settings-menu');
    }
  }
