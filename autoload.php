<?php

function autoLoad($classname){
    include 'controllers/' . $classname . '.php';
}

spl_autoload_register('autoLoad');