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
        public string $submitText = "Submit",
        public string $idSubmit = "",
        public string $nameSubmit = "",
        public string $submitStyle = "bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition cursor-pointer",

        public bool  $csrf = true,
        public bool  $autoNameId = true,

        public int   $countInput = 0,
        public int   $autoIdStart = 0,

        public array $propertyNameArray = [],
        public array $propertyIdArray = [],
        public array $propertyOldArray = [],
        public array $propertyTitleArray = [],
        public array $propertyInputTypeArray = [],
        public array $propertyInputRequiredArray = [],
        public array $propertyInputPlaceholderArray = [],

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
