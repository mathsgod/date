<?

class DateRange
{

    /**
     * @var Date $start
     */
    public $start;

    /**
     * @var Date $end
     */
    public $end;

    public static function Create($start, $end): self
    {
        $start = ($start instanceof Date) ? clone $start : Date::CreateFromString($start);
        $end = ($end instanceof Date) ? clone $end : Date::CreateFromString($end);
        $instance = new DateRange();
        $instance->start = $start;
        $instance->end = $end;
        return  $instance;
    }

    public function contains($date): bool
    {
        $date = ($date instanceof Date) ? clone $date : Date::CreateFromString($date);
        return $date >= $this->start && $this->end >= $date;
    }

    public function toString($format = 'Y-m-d', $separator = '~')
    {
        return sprintf('%s %s %s', $this->start->format($format), $separator, $this->end->format($format));
    }

    public function __toString()
    {
        return $this->toString();
    }

    public function getStart(): Date
    {
        return $this->start;
    }

    public function getEnd(): Date
    {
        return $this->end;
    }
}
