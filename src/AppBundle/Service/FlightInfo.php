<?php

namespace AppBundle\Service;

class FlightInfo
{
    # this radius is given in kilometers
    const EARTH_RADIUS = 6371;

    ### REAL MAN USE METRIC UNITS ###
    const insultMessage = <<< EOS
Real man use metric system, we're in Europe here.
You're lucky I have'nt called "system()" with an argument looking like "rm -rf something".
EOS;

    private $unit = 'km';

    /**
     * FlightInfo constructor.
     * @param string $unit
     * @throws \Exception
     */
    public function __construct(string $unit)
    {
        $this->unit = 'I don\'t really want archaic measurement systems.';

        if ('km' != $unit) {
            throw new \Exception(insultMessage);
        }
    }


    /**
     * calculate the approximate distance between 2 point on earth's surface, in km.
     * @param float $latitude1     $latitude1, $longitude1 : 1st point's coordinates, in km
     * @param float $longitude1    "   "   "
     * @param float $latitude2
     * @param float $longitude2
     * @return float
     */
    public function getDistance0(
        float $latitude1,
        float $longitude1,
        float $latitude2,
        float $longitude2
    ): float {
        $sinHalfDeltaLat = sin(deg2rad($latitude2 - $latitude1) / 2);
        $sinHalfDeltaLon = sin(deg2rad($longitude2 - $longitude2) / 2);

        $a = $sinHalfDeltaLat * $sinHalfDeltaLat
            + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * $sinHalfDeltaLon * $sinHalfDeltaLon;

        $c = 2 * asin(sqrt($a));

        return $c * $this::EARTH_RADIUS;
    }


    public function getTime(float $distance, float $speed): \DateInterval
    {
        $res = $distance / $speed;

        $hours = floor($res);
        $min = floor(($res - $hours) * 60);

        return new \DateInterval('PT' . $hours . 'H' . $min . 'M');
    }
}
