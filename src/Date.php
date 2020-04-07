<?

class Date extends DateTime
{
    public static function Create(int $year = null, int $month = null, int $day = null): self
    {
        $now = static::now();

        $defaults = array_combine(["year", "month", "day"], explode("-", $now->format("Y-n-j")));

        $year = $year ?? $defaults["year"];
        $month = $month ?? $defaults["month"];
        $day = $day ?? $defaults["day"];

        $date = new self($year . "-" . $month . "-" . $day);
        return $date;
    }

    public static function Now(): self
    {
        return new self();
    }

    public function set(string $name, int $value)
    {
        switch ($name) {
            case "year":
                $this->year($value);
                break;
            case "month":
                $this->month($value);
                break;
            case "day":
                $this->day($value);
                break;
        }
    }

    public function get(string $name)
    {
        switch ($name) {
            case "year":
                return intval($this->format("Y"));
                break;
            case "month":
                return intval($this->format("m"));
                break;
            case "day":
                return intval($this->format("d"));
                break;
        }
    }

    public function __set($name, $value)
    {
        return $this->set($name, $value);
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function year(int $year): self
    {
        $this->setDate($year, $this->month, $this->day);
        return $this;
    }

    public function month(int $month): self
    {
        $this->setDate($this->year, $month, $this->day);
        return $this;
    }

    public function day(int $day): self
    {
        $this->setDate($this->year, $this->month, $day);
        return $this;
    }
    public function addYears(int $value = 1)
    {
        return $this->modify((int) $value . ' year');
    }

    public function addMonths(int $value = 1)
    {
        return $this->modify((int) $value . ' months');
    }

    public function addDays(int $value = 1)
    {
        return $this->modify((int) $value . ' day');
    }
}
