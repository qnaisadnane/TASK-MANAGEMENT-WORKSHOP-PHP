<?php

namespace App\Interfaces;

interface Prioritizable{

    public function isPriority():bool;

    public function isPrioritizable():bool;

    public function setPriority(string $priority):void;

}