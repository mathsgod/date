# Date
```php
$date = Date::Create(2000, 1, 1);
echo $date->year; //2000
echo $date->month; //1
echo $date->day; //1

$date = Date::Now(); //now
$date->addYears(1); //next year

$tomorrow = Date::CreateFromString("tomorrow"); //tomorrow
```

# DateRange
```php
$range = DateRange::Create("2020-01-01", "2020-12-31");
echo $range->contains("2020-03-01"); //true
echo $range->contains("2019-03-01"); //false

```