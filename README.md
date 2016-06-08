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

You can also use this token for collaborator method accepted date string:

```php

       $collaborator->methodAcceptedDateString(new DatetimeApproximateToken(new \DateTime()))->shouldBeCalled();
       
```
