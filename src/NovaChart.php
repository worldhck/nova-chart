<?php

namespace Worldhck\NovaChart;

use Laravel\Nova\Card;

class NovaChart extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';


    public function __construct($component = null)
    {
        $this->withMeta($this->calculate());

        parent::__construct($component);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-chart';
    }
}
