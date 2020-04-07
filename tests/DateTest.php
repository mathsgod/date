<?

declare(strict_types=1);
error_reporting(E_ALL && ~E_WARNING);

use PHPUnit\Framework\TestCase;

final class DateTest extends TestCase
{
    public function test_create()
    {
        $date = Date::Create(2000, 1, 1);
        $this->assertInstanceOf(Date::class, $date);

        $date = Date::Create(2000, 4, 31);
        $this->assertEquals(5, $date->month);
        $this->assertEquals(1, $date->day);

        $date = Date::Create(2000);
        $this->assertEquals($date->year, 2000);
    }

    public function test_year()
    {
        $d = Date::Create(2000, 1, 1);
        $this->assertEquals(2000, $d->year);
    }

    public function test_month()
    {
        $d = Date::Create(2000, 12, 1);
        $this->assertEquals(12, $d->month);
    }

    public function test_day()
    {
        $d = Date::Create(2000, 12, 31);
        $this->assertEquals(31, $d->day);
    }
}
