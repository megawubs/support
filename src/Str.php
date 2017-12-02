<?php

namespace Wubs\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Str as SupportString;


/**
 * Class Str
 */
class Str
{

    /**
     * @var
     */
    private $value;

    /**
     * Line constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return static
     */
    public function camel()
    {
        return new static(SupportString::camel($this->value));
    }

    /**
     * Determine if the sting contains a given substring.
     *
     * @param  string|array $needles
     *
     * @return bool
     */
    public function contains($needles)
    {
        return SupportString::contains($this->value, $needles);
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string|array $needles
     *
     * @return bool
     */
    public function endsWith($needles)
    {
        return SupportString::endsWith($this->value, $needles);
    }

    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string $cap
     *
     * @return Str
     */
    public function finish($cap)
    {
        return new static(SupportString::finish($this->value, $cap));
    }

    /**
     * @param $string
     *
     * @return \Wubs\Support\Str
     */
    public function append($string)
    {
        return $this->finish($string);
    }

    /**
     * @param $string
     *
     * @return \Wubs\Support\Str
     */
    public function concatenate($string)
    {
        return $this->finish($string);
    }

    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string|array $pattern
     *
     * @return bool
     */
    public function is($pattern)
    {
        return SupportString::is($pattern, $this->value);
    }

    /**
     * Convert a string to kebab case.
     *
     * @return Str
     */
    public function kebab()
    {
        return $this->snake('-');
    }

    /**
     * Return the length of the given string.
     *
     * @param  string $encoding
     *
     * @return int
     */
    public function length($encoding = null)
    {
        return SupportString::length($this->value, $encoding);
    }

    /**
     * Limit the number of characters in a string.
     *
     * @param  int    $limit
     * @param  string $end
     *
     * @return Str
     */
    public function limit($limit = 100, $end = '...')
    {
        return new static(SupportString::limit($this->value, $limit, $end));
    }

    /**
     * Convert the given string to lower-case.
     *
     * @return Str
     */
    public function lower()
    {
        return new static(SupportString::lower($this->value));
    }

    /**
     * Limit the number of words in a string.
     *
     * @param  int    $words
     * @param  string $end
     *
     * @return Str
     */
    public function words($words = 100, $end = '...')
    {
        return new static(SupportString::words($this->value, $words, $end));
    }

    /**
     * Parse a Class@method style callback into class and method.
     *
     * @param  string|null $default
     *
     * @return Collection
     */
    public function parseCallback($default = null)
    {
        return collect(SupportString::parseCallback($this->value, $default))->map(function ($string) {
            return new static($string);
        });
    }

    /**
     * Get the plural form of an English word.
     *
     * @param  int $count
     *
     * @return Str
     */
    public function plural($count = 2)
    {
        return new static(SupportString::plural($this->value, $count));
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int $length
     *
     * @return Str
     */
    public function random($length = 16)
    {
        return new static(SupportString::random($length));
    }

    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param        $search
     * @param  array $replace
     *
     * @return Str
     */
    public function replaceArray($search, array $replace)
    {
        return new static(SupportString::replaceArray($search, $replace, $this->value));
    }

    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string $search
     * @param  string $replace
     *
     * @return Str
     */
    public function replaceFirst($search, $replace)
    {
        return new static(SupportString::replaceFirst($search, $replace, $this->value));
    }

    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string $search
     * @param  string $replace
     *
     * @return Str
     */
    public function replaceLast($search, $replace)
    {
        return new static(SupportString::replaceLast($search, $replace, $this->value));
    }

    /**
     * Begin a string with a single instance of a given value.
     *
     * @param  string $prefix
     *
     * @return Str
     */
    public function start($prefix)
    {
        return new static(SupportString::start($this->value, $prefix));
    }

    /**
     * Convert the given string to upper-case.
     *
     * @return Str
     */
    public function upper()
    {
        return new static(SupportString::upper($this->value));
    }

    /**
     * Convert the given string to title case.
     *
     * @return Str
     */
    public function title()
    {
        return new static(SupportString::title($this->value));
    }

    /**
     * Get the singular form of an English word.
     *
     * @return Str
     */
    public function singular()
    {
        return new static(SupportString::singular($this->value));
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string $separator
     * @param  string $language
     *
     * @return Str
     */
    public function slug($separator = '-', $language = 'en')
    {
        return new static(SupportString::slug($this->value, $separator, $language));
    }

    /**
     * Convert a string to snake case.
     *
     * @param  string $delimiter
     *
     * @return Str
     */
    public function snake($delimiter = '_')
    {
        return new static(SupportString::snake($this->value, $delimiter));
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string|array $needles
     *
     * @return bool
     */
    public function startsWith($needles)
    {
        return SupportString::startsWith($this->value, $needles);
    }

    /**
     * Convert a value to studly caps case.
     *
     * @return Str
     */
    public function studly()
    {
        return new static(SupportString::studly($this->value));
    }

    /**
     * Returns the portion of string specified by the start and length parameters.
     *
     * @param  int      $start
     * @param  int|null $length
     *
     * @return Str
     */
    public function substr($start, $length = null)
    {
        return new static(SupportString::substr($this->value, $start, $length));
    }

    /**
     * Make a string's first character uppercase.
     *
     * @return Str
     */
    public function ucfirst()
    {
        return new static(SupportString::ucfirst($this->value));
    }

    /**
     * @param $delimiter
     *
     * @return Collection
     */
    public function explode($delimiter)
    {
        return collect(explode($delimiter, $this->value))->map(function ($string) {
            return new static($string);
        });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function lines()
    {
        return $this->explode("\n");
    }

    /**
     * Convert to int
     *
     * @return int
     */
    public function int()
    {
        return (int)$this->value;
    }

    /**
     * @return bool
     */
    public function empty()
    {
        return $this->value == null;
    }

    /**
     * @return Collection|Str[]
     */
    public function split()
    {
        return collect(str_split($this->value))->map(function ($item) {
            return new static($item);
        });
    }

    /**
     * @param        $length
     * @param string $string
     * @param int    $type
     *
     * @return \Wubs\Support\Str
     */
    public function pad($length, $string = ' ', $type = STR_PAD_RIGHT)
    {
        return new static(str_pad($this->value, $length, $string, $type));
    }

    /**
     * @param $char
     *
     * @return \Wubs\Support\Str
     */
    public function surround($char)
    {
        $padding = $this->length() + 2;

        return $this->pad($padding, $char, STR_PAD_BOTH);

    }

    /**
     * @param $string
     *
     * @return \Wubs\Support\Str
     */
    public function encapsulate($string)
    {
        if ($string instanceof static) {
            $string = $string->value;
        }

        return $this->start($string[0])
                    ->finish($string[1]);
    }

    /**
     * @param $search
     * @param $replace
     *
     * @return \Wubs\Support\Str
     */
    public function replace($search, $replace)
    {
        return new static(str_replace($search, $replace, $this->value));
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->value;
    }
}