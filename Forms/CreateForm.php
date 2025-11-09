<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $subject = "Form",
        public string $action = "#",
        public string $method = "post",
        public string $classModel = "space-y-4",
        public int   $countInput = 0,
        public int   $startNameNumberPK = 1,
        public array $propertyTitleArray = [],
        public array $propertyInputTypeArray = [],
        public array $propertyInputRequiredArray = [],
        public array $propertyInputPlaceholderArray = [],
        public array $oldArray = [],
        public string $submitText = "Submit"
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.create-form');
    }
}
