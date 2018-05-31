<?php

namespace AppBundle\Service;

class FlightInfo
{
    const EARTH_RADIUS = 6371;

    ### REAL MAN USE METRIC UNITS ###
    private $unit = 'km';
    const insultMessage = <<< EOS
Real man use metric system, we're in Europe here.
You're lucky I have'nt called "system()" with an argument looking like "rm -rf something".
EOS;

    /**
     * FlightInfo constructor.
     * @param string $unit
     * @throws \Exception
     */
    public function __construct(string $unit)
    {
        $this->unit = 'I don\'t really care about this...';

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
    public function getDistance(
        float $latitude1,
        float $longitude1,
        float $latitude2,
        float $longitude2
    ): float
    {
        $sinDeltaLatitude = sin(deg2rad(abs( $latitude2 - $latitude1)) / 2);
        $sinDeltaLongitude = sin( deg2rad(abs($longitude2 - $longitude2)) / 2);

        $a = $sinDeltaLatitude * $sinDeltaLatitude
            + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * $sinDeltaLongitude * $sinDeltaLongitude;

        $c = 2 * atan2( sqrt($a), sqrt(1-$a));

        return $c * $this::EARTH_RADIUS;
    }

}
