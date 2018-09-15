# Objectify ![Logo](/cube.png)

Object wrapper for PHP string. Allows manipulate strings in an object-oriented style.

[![Build Status](https://travis-ci.org/enocryph/objectify.svg?branch=master)](https://travis-ci.org/enocryph/objectify)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/enocryph/objectify/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/enocryph/objectify/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/enocryph/objectify/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/enocryph/objectify/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/enocryph/objectify/v/stable)](https://packagist.org/packages/enocryph/objectify)
[![License](https://poser.pugx.org/enocryph/objectify/license)](https://packagist.org/packages/enocryph/objectify)

# Contents
* [Requirements](#requirements)
* [Installation](#installation)
* [Usage](#usage)
    * [Chaining](#chaining)
    * [Using sequence](#using-sequence)
* [Sequence](#sequence)
    * [What is the sequence](#what-is-the-sequence)
    * [Types](#types)
    * [How does it work?](#how-does-it-work)
    * [Examples](#examples-with-the-sequence)
    * [Explanation](#explanation)
* [Methods](#methods)
    * [Uppercase](#uppercase)
    * [UppercaseFirst](#uppercasefirst)
    * [UppercaseWords](#uppercasewords)
    * [Lowercase](#lowercase)
    * [LowercaseFirst](#lowercasefirst)
    * [Trim or Strip](#trim)
    * [LTrim or StripLeft](#ltrim)
    * [RTrim or StripRight](#rtrim)
    * [Reverse](#reverse)
    * [Shuffle](#shuffle)
    * [Length](#length)
    * [Slice](#slice)
    * [Pad](#pad)
    * [Repeat](#repeat)
    * [Replace](#replace)
    * [ReplaceWith](#replacewith)
    * [Split](#split)
    * [CompareWith](#comparewith)
    * [Position](#position)
    * [Wordwrap](#wordwrap)
    * [StartsWith](#startswith)
    * [EndsWith](#endswith)
    * [Append](#append)
    * [Prepend](#prepend)
    * [AppendBoth](#appendboth)

## Requirements

* PHP `7.0` or higher

## Installation

The preferred way to install this package is to use [Composer][3]:

``` bash
$ composer require enocryph/objectify
```

## Usage

```php
use Objectify\ObjectifyString\ObjectifyString;

$objectify = new ObjecifyString("pu level");
$objectify->reverse(); // level up
$objectify->append('!'); // level up!
$objectify->uppercaseFirst(); // Level up!
```

### Chaining

Methods may be chained for ease of use:

```php
use Objectify\ObjectifyString\ObjectifyString;

$objectify = new ObjecifyString("pu level");
$objectify->reverse()->append('!')->uppercaseFirst(); // Level up!
```

### Using [Sequence](#sequence)

```php
use Objectify\ObjectifyString\ObjectifyString;

$objectify = new ObjectifyString("its a pit");

$objectify->append("'", 1); // it's a pit
$objectify->reverse('-3..'); // it's a tip
$objectify->append('!'); // it's a tip!
$objectify->uppercase('..4'); // IT'S a tip!

//or chained

$objectify->append("'", 1)->reverse('-3..')->append('!')->uppercase('..4');
```

## Sequence

### What is the sequence?

Sequence is [ruby style element reference][1] that allows you manipulate with a part(s) of string. 

### Types

1. Index
2. Start, length
3. Range
4. Regex, match group

### How does it work?

Okay, let's use `slice` function for example.

```php 
slice(...$sequence)
```

If passed a single *index* `slice(1) or slice('1')`, returns a substring of one character at that index.

If passed a start *index* and a *length* `slice(2, 3) or slice('2, 3')`, returns a substring containing length 
characters starting at the index.

If passed a *range* `slice('2..3')`, its beginning and end are interpreted as offsets delimiting the substring 
to be returned.

**Regex now is not supported :(**

But in [objectify][2] library you can use the sequence with most functions, not only with slice.

#### Examples with the sequence: 

```php
use Objectify\ObjectifyString\ObjectifyString;

$objectify = new ObjectifyString("its a pit");

$objectify->append("'", 1); // it's a pit
$objectify->reverse('-3..'); // it's a tip
$objectify->append('!'); // it's a tip!
$objectify->uppercase('..4'); // IT'S a tip!
```

With chaining:

```php
$objectify->append("'", 1)->reverse('-3..')->append('!')->uppercase('..4');
```

## Methods

### uppercase
> Associated with [`strtoupper`][100].

``` php
$objectify = new ObjectifyString("Hello World!");
$objectify->uppercase();
```

Result: `HELLO WORLD!`

### uppercaseFirst
> Associated with [`ucfirst`][101].

``` php
$objectify = new ObjectifyString("hello world!");
$objectify->uppercase();
```

Result: `Hello world!`

### uppercaseWords
> Associated with [`ucwords`][102].

``` php
$objectify = new ObjectifyString("hello world!");
$objectify->uppercase();
```

Result: `Hello World!`

### lowercase
> Associated with [`strtolower`][103].

``` php
$objectify = new ObjectifyString("Hello World!");
$objectify->lowercase();
```

Result: `hello world!`

### lowercaseFirst
> Associated with [`lcfirst`][104].

``` php
$objectify = new ObjectifyString("HELLO World!");
$objectify->lowercaseFirst();
```

Result: `hELLO world!`

### trim
> Available alias : `strip`

> Associated with [`trim`][105].

``` php
$objectify = new ObjectifyString("  Hello World!  ");
$objectify->trim();
```

Result: `Hello World!`

### ltrim
> Available alias : `stripLeft`

> Associated with [`ltrim`][106].

``` php
$objectify = new ObjectifyString("  Hello World!  ");
$objectify->ltrim();
```

Result: `"Hello World!  "`

### rtrim
> Available alias : `stripRight`

> Associated with [`rtrim`][107].

``` php
$objectify = new ObjectifyString("  Hello World!  ");
$objectify->rtrim();
```

Result: `"  Hello World!"`

### reverse
> Associated with [`strrev`][108].

``` php
$objectify = new ObjectifyString("trap");
$objectify->reverse();
```

Result: `part`

### shuffle
> Associated with [`str_shuffle`][109].

``` php
$objectify = new ObjectifyString("trap");
$objectify->shuffle();
```

Result: random shuffle :)

### length
> Associated with [`strlen`][110].

``` php
$objectify = new ObjectifyString("trap");
$objectify->length();
```

Result: 4

### slice
> Associated with [`substr`][111].

``` php
$objectify = new ObjectifyString("check chapter about sequence");
$objectify->slice("-8..");
```

Result: `sequence`

### pad
> Associated with [`str_pad`][112].

``` php
$objectify = new ObjectifyString("world");
$objectify->pad($objectify->length() + 10, " -=- ", STR_PAD_BOTH)->trim();
```

Result: `-=- world -=-`

### repeat
> Associated with [`str_repeat`][113].

``` php
$objectify = new ObjectifyString("=+=");
$objectify->repeat(5);
```

Result: `=+==+==+==+==+=`

### replace
> Associated with [`str_replace`][114].

> Associated with [`str_ireplace`][115].

```php 
$this replace(string $search, string $replace[, boolean $caseSensitive = true, ...$sequence])
```

``` php
$objectify = new ObjectifyString("<body text=%BODY%>");
$objectify->replace('%body%', 'black');
```

Result: `<body text=black>`

### replaceWith
> Associated with [`substr_replace`][116].

```php 
$this replaceWith(string $replacement[, ...$sequence])
```

``` php
$objectify = new ObjectifyString("it's a part");
$objectify->replaceWith('trap', '-4..');
```

Result: `it's a trap`

### split
> Associated with [`str_split`][117].

``` php
$objectify = new ObjectifyString("Hello Friend");
$objectify->split();
```

Result: `['H', 'e', 'l', 'l', 'o', ' ', 'F', 'r', 'i', 'e', 'n', 'd']`

### compareWith
> Associated with [`strcmp`][118].

> Associated with [`strcasecmp`][119].

```php 
integer compareWith(string $string [, boolean $caseSensitive = true, ...$sequence])
```

``` php
$objectify = new ObjectifyString("hello");
$objectify->compareWith("hello");
```

Result: `0`

### position
> Associated with [`strrpos`][120].

> Associated with [`strripos`][121].

> Associated with [`strpos`][122].

> Associated with [`stripos`][123].

```php 
integer|boolean position(string $needle[, integer $offset = 10, boolean $caseSensitive = true, boolean $fromEnd = false , ...$sequence])
```

``` php
$objectify = new ObjectifyString("hello");
$objectify->position("l");
```

Result: `2`

### wordwrap
> Associated with [`wordwrap`][124].

``` php
$objectify = new ObjectifyString("The quick brown fox jumped over the lazy dog.");
$objectify->split();
```

Result: `['H', 'e', 'l', 'l', 'o', ' ', 'F', 'r', 'i', 'e', 'n', 'd']`

### startsWith

```php 
boolean startsWith(string $string[, boolean $caseSensitive = true, ...$sequence])
```

``` php
$objectify = new ObjectifyString("hello world!");
$objectify->startsWith("hel");
```

Result: `true`

### endsWith

```php 
boolean endsWith(string $string[, boolean $caseSensitive = true, ...$sequence])
```

``` php
$objectify = new ObjectifyString("hello world!");
$objectify->endsWith("hel");
```

Result: `false`

### append

```php 
$this append(string $string[, ...$sequence])
```

``` php
$objectify = new ObjectifyString("hello");
$objectify->append(" world!");
```

Result: `hello world!`

### prepend

```php 
$this prepend(string $string[, ...$sequence])
```

``` php
$objectify = new ObjectifyString("world!");
$objectify->prepend("hello ");
```

Result: `hello world!`

### appendBoth

```php 
$this appendBoth(string $string[, ...$sequence])
```

``` php
$objectify = new ObjectifyString("Hello World");
$objectify->appendBoth("!");
```

Result: `!Hello World!`


[1]: http://ruby-doc.org/core-2.2.0/String.html#method-i-slice
[2]: https://github.com/enocryph/objectify
[3]: https://getcomposer.org/

[100]: http://php.net/manual/en/function.strtoupper.php
[101]: http://php.net/manual/en/function.ucfirst.php
[102]: http://php.net/manual/en/function.ucwords.php
[103]: http://php.net/manual/en/function.strtolower.php
[104]: http://php.net/manual/en/function.lcfirst.php
[105]: http://php.net/manual/en/function.trim.php
[106]: http://php.net/manual/en/function.ltrim.php
[107]: http://php.net/manual/en/function.rtrim.php
[108]: http://php.net/manual/en/function.strrev.php
[109]: http://php.net/manual/en/function.str-shuffle.php
[110]: http://php.net/manual/en/function.length.php
[111]: http://php.net/manual/en/function.substr.php
[112]: http://php.net/manual/en/function.str-pad.php
[113]: http://php.net/manual/en/function.str-repeat.php
[114]: http://php.net/manual/en/function.str-replace.php
[115]: http://php.net/manual/en/function.str-ireplace.php
[116]: http://php.net/manual/en/function.substr-replace.php
[117]: http://php.net/manual/ru/function.str-split.php
[118]: http://php.net/manual/ru/function.strcmp.php
[119]: http://php.net/manual/ru/function.strcasecmp.php
[120]: http://php.net/manual/ru/function.strrpos.php
[121]: http://php.net/manual/ru/function.strripos.php
[122]: http://php.net/manual/ru/function.strpos.php
[123]: http://php.net/manual/ru/function.stripos.php
[124]: http://php.net/manual/ru/function.wordwrap.php