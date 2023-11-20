<?php

namespace App\View\Components;

use Illuminate\View\Component;

class myTest extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $testVar,$ok;
    public function __construct($testVar)
    {
        $this->testVar=$testVar;
        $this->ok='ok';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {


        return view('components.my-test');
    }
}
