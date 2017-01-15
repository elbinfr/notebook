<?php

function color_note()
{
    $colors = collect([
        'red', 'lime', 'pink', 'purple', 'light-green', 'indigo', 'blue', 'cyan', 'teal', 'green'
    ]);

    return $colors->random();
}