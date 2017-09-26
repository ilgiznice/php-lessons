<?php

namespace Build;

class Build
{
    public $is_opened;
    public $number;

    function open()
    {
        $this->is_opened = true;
        echo $this->number . 'Открыт';
    }

    function close()
    {
        $this->is_opened = false;
        echo $this->number . 'Закрыт';
    }
}