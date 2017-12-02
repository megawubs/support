<?php

namespace Wubs\Support;

/**
 * @param string $string
 *
 * @return \Wubs\Support\Str
 */
function str(string $string)
{
    return new Str($string);
}

