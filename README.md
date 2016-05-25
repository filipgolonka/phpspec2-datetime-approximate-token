prophecy-datetime-approximate-token
---------------

Installation
============

```
composer require filipgolonka/prophecy-datetime-approximate-token
```

Usage
=====

Inside some example:

```php

       $collaborator->methodAcceptedDatetime(new DatetimeApproximateToken(new \DateTime()))->shouldBeCalled();

```
