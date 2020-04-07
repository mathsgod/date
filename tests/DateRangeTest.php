<?

declare(strict_types=1);
error_reporting(E_ALL && ~E_WARNING);

use PHPUnit\Framework\TestCase;

final class DateRangeTest extends TestCase
{
    public function test_create()
    {
        $dr = DateRange::Create("2020-01-01", "2020-12-31");
        $this->assertInstanceOf(DateRange::class, $dr);
    }

    public function test_contain()
    {
        $dr = DateRange::Create("2020-01-01", "2020-12-31");
        $this->assertTrue($dr->contains("2020-03-01"));
        $this->assertFalse($dr->contains("2019-03-01"));

        $this->assertTrue($dr->contains("2020-01-01"));
        $this->assertTrue($dr->contains("2020-12-31"));
    }

    public function test_toString()
    {
        $dr = DateRange::Create("2020-01-01", "2020-12-31");
        $this->assertEquals("2020-01-01 ~ 2020-12-31", $dr->toString());
    }
}
