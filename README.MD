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
* [Sequence](#sequence)
    

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
$objectify->uppercase(0); // Level up!
```

### Chaining

Methods may be chained for ease of use:

```php
use Objectify\ObjectifyString\ObjectifyString;

$objectify = new ObjecifyString("pu level");
$objectify->reverse()->append('!')->uppercase(0); // Level up!
```

## Sequence

### What is the sequence?

Sequence is [ruby style element reference][1] that allows you manipulate with a part(s) of string. 

### Okay, so how does it work?

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

But in [objectify][2] library you can use the sequence in most functions. (See: list of functions that supports the sequence).

Some examples with the sequence: 

```php
$objectify = new A("its a pit");

$objectify->append("'", 1); // it's a pit
$objectify->reverse('-3..'); // it's a tip
$objectify->append('!'); // it's a tip!
$objectify->uppercase('..4'); // IT'S a tip!
```

With chaining:

```php
$objectify->append("'", 1)->reverse('-3..')->append('!')->uppercase('..4');
```

### The sequence explanation with pictures


[1]: 'http://ruby-doc.org/core-2.2.0/String.html#method-i-slice'
[2]: 'https://github.com/enocryph/objectify'
[3]: https://getcomposer.org/