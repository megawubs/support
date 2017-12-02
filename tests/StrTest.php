<?php

namespace Wubs\Support\Tests;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use Wubs\Support\Str;
use const STR_PAD_BOTH;
use const STR_PAD_LEFT;
use function Wubs\Support\str;

/**
 * Class StrTest
 *
 * @package Wubs\Support\Tests
 */
class StrTest extends TestCase
{

    /**
     * @test
     */
    public function string_can_be_transformed_to_camel_case()
    {
        $camel = str('foo_bar baz')->camel();

        $this->assertEquals('fooBarBaz', $camel);
    }

    /**
     * @test
     */
    public function string_contains_needle()
    {
        $contains = str('foo_bar baz')->contains('baz');

        $this->assertTrue($contains);

        $contains = str('foo_bar baz')->contains('bak');

        $this->assertFalse($contains);
    }

    /**
     * @test
     */
    public function string_ends_width_needles()
    {
        $endsWith = str('foo_bar baz')->endsWith('baz');

        $this->assertTrue($endsWith);

        $endsWith = str('foo_bar baz')->endsWith('bak');

        $this->assertFalse($endsWith);
    }

    /**
     * @test
     */
    public function string_finish()
    {
        $finish = str('foo_bar ')->finish('baz');

        $this->assertEquals('foo_bar baz', $finish);
    }

    /**
     * @test
     */
    public function string_is_string()
    {
        $is = str('foo_bar ')->is('foo*');

        $this->assertTrue($is);
    }

    /**
     * @test
     */
    public function string_is_object()
    {
        $is = str('foo_bar ')->is(str('foo*'));

        $this->assertTrue($is);
    }

    /**
     * @test
     */
    public function string_to_kebab()
    {
        $kebab = str('fooBar Baz')->kebab();

        $this->assertEquals('foo-bar-baz', $kebab);
    }

    /**
     * @test
     */
    public function string_length()
    {
        $length = str('fooBar Baz')->length();

        $this->assertEquals(10, $length);
    }

    /**
     * @test
     */
    public function string_limit_with_default_end()
    {
        $limit = str('fooBar Baz')->limit(3);

        $this->assertEquals('foo...', $limit);
    }

    /**
     * @test
     */
    public function string_limit_with_no_end()
    {
        $limit = str('fooBar Baz')->limit(3, '');

        $this->assertEquals('foo', $limit);
    }

    /**
     * @test
     */
    public function string_lower()
    {
        $lower = str('FooBar Baz')->lower();

        $this->assertEquals('foobar baz', $lower);
    }

    /**
     * @test
     */
    public function string_words_with_default_end()
    {
        $words = str('FooBar Baz')->words(1);

        $this->assertEquals('FooBar...', $words);
    }

    /**
     * @test
     */
    public function string_words_with_no_end()
    {
        $words = str('FooBar Baz')->words(1, '');

        $this->assertEquals('FooBar', $words);
    }

    /**
     * @test
     */
    public function string_parse_callback_string()
    {
        $callback = str('FooBar@baz')->parseCallback();

        $this->assertEquals('FooBar', $callback->first());
        $this->assertEquals('baz', $callback[1]);
    }

    /**
     * @test
     */
    public function string_plural()
    {
        $plural = str('house')->plural();

        $this->assertEquals('houses', $plural);
    }

    /**
     * @test
     */
    public function string_replace_array()
    {
        $replaced = str('FooBar Baz')->replaceArray('o', ['e', 'z']);

        $this->assertEquals('FezBar Baz', $replaced);
    }

    /**
     * @test
     */
    public function string_replace_first()
    {
        $replaced = str('FooBar Baz')->replaceFirst('o', 'e');

        $this->assertEquals('FeoBar Baz', $replaced);
    }

    /**
     * @test
     */
    public function string_replace_last()
    {
        $replaced = str('FooBar Baz')->replaceLast('o', 'e');

        $this->assertEquals('FoeBar Baz', $replaced);
    }

    /**
     * @test
     */
    public function string_start()
    {
        $start = str('Bar Baz')->start('Foo');

        $this->assertEquals('FooBar Baz', $start);
    }

    /**
     * @test
     */
    public function string_upper()
    {
        $upper = str('bar')->upper();

        $this->assertEquals('BAR', $upper);
    }

    /**
     * @test
     */
    public function string_title()
    {
        $title = str('bar baz foo')->title();

        $this->assertEquals('Bar Baz Foo', $title);
    }

    /**
     * @test
     */
    public function string_singular()
    {
        $singular = str('houses')->singular();

        $this->assertEquals('house', $singular);
    }

    /**
     * @test
     */
    public function string_slug()
    {
        $slug = str('houses are warm')->slug();

        $this->assertEquals('houses-are-warm', $slug);
    }

    /**
     * @test
     */
    public function string_snake()
    {
        $snake = str('houses are warm')->snake();

        $this->assertEquals('houses_are_warm', $snake);
    }

    /**
     * @test
     */
    public function string_starts_with()
    {
        $startsWith = str('houses are warm')->startsWith(['houses', 'are']);

        $this->assertTrue($startsWith);
    }

    /**
     * @test
     */
    public function string_studly()
    {
        $studly = str('houses are warm')->studly();

        $this->assertEquals('HousesAreWarm', $studly);
    }

    /**
     * @test
     */
    public function string_substr()
    {
        $substr = str('houses are warm')->substr(0, 6);

        $this->assertEquals('houses', $substr);
    }

    /**
     * @test
     */
    public function string_ucfirst()
    {
        $ucfirst = str('houses')->ucfirst();

        $this->assertEquals('Houses', $ucfirst);
    }

    /**
     * @test
     */
    public function string_explode()
    {
        $exploded = str('houses, are, expensive')->explode(', ');

        $this->assertInstanceOf(Collection::class, $exploded);

        $this->assertInstanceOf(Str::class, $exploded[0]);
        $this->assertInstanceOf(Str::class, $exploded[1]);
        $this->assertInstanceOf(Str::class, $exploded[2]);

        $this->assertEquals('houses', $exploded[0]);
        $this->assertEquals('are', $exploded[1]);
        $this->assertEquals('expensive', $exploded[2]);
    }

    /**
     * @test
     */
    public function string_lines()
    {
        $lines = str("Hello,\nThis is a string that's multiple lines long.\nBye!")->lines();

        $this->assertInstanceOf(Collection::class, $lines);

        $this->assertInstanceOf(Str::class, $lines[0]);
        $this->assertInstanceOf(Str::class, $lines[1]);
        $this->assertInstanceOf(Str::class, $lines[2]);

        $this->assertEquals($lines[0], 'Hello,');
        $this->assertEquals($lines[1], "This is a string that's multiple lines long.");
        $this->assertEquals($lines[2], 'Bye!');
    }

    /**
     * @test
     */
    public function string_to_int()
    {
        $int = str('100')->int();

        $this->assertInternalType('int', $int);
        $this->assertEquals(100, $int);
    }

    /**
     * @test
     */
    public function string_empty()
    {
        $empty = str('')->empty();

        $this->assertTrue($empty);

        $empty = str('value')->empty();

        $this->assertFalse($empty);
    }

    /**
     * @test
     */
    public function string_split()
    {
        $alphabet = str('abc')->split();

        $this->assertInstanceOf(Collection::class, $alphabet);
        $this->assertInstanceOf(Str::class, $alphabet[0]);

        $this->assertEquals('a', $alphabet->first());
        $this->assertEquals('b', $alphabet->get(1));
        $this->assertEquals('c', $alphabet->get(2));
    }

    /**
     * @test
     */
    public function string_pad()
    {
        $pad = str('foo')->pad(5);

        $this->assertEquals('foo  ', $pad);

        $pad = str('foo')->pad(5, '-');

        $this->assertEquals('foo--', $pad);

        $pad = str('foo')->pad(5, '-', STR_PAD_LEFT);

        $this->assertEquals('--foo', $pad);

        $pad = str('foo')->pad(5, '-', STR_PAD_BOTH);

        $this->assertEquals('-foo-', $pad);
    }

    /**
     * @test
     */
    public function string_surround()
    {
        $surround = str('variable')->surround('-');

        $this->assertEquals('-variable-', $surround);
    }

    /**
     * @test
     */
    public function string_encapsulate()
    {
        $surround = str('variable')->encapsulate(str('()'));

        $this->assertEquals('(variable)', $surround);
    }


    /**
     * @test
     */
    public function string_chain_test()
    {
        $string = str('hello')
            ->concatenate(' world')
            ->title()
            ->replace(' ', '_');

        $this->assertEquals('Hello_World', $string);
    }
}