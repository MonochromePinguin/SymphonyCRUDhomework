<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SiteRepository")
 */
class Site
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="icao", type="string", length=4)
     */
    private $icao;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128)
     */
    private $city;


    /**
     * @ORM\OneToMany( targetEntity="AppBundle\Entity\Flight", mappedBy="departure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departures;

    /**
     * @ORM\OneToMany( targetEntity="AppBundle\Entity\Flight", mappedBy="arrival")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrivals;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Site
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set icao
     *
     * @param string $icao
     *
     * @return Site
     */
    public function setIcao($icao)
    {
        $this->icao = $icao;

        return $this;
    }

    /**
     * Get icao
     *
     * @return string
     */
    public function getIcao()
    {
        return $this->icao;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Site
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Site
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Site
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    ### CUSTOM FUNCTION
    public function __toString()
    {
        return $this->name . ': ' . $this.$this->icao . ' at ' . $this->latitude . '/' . $this->longitude;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add departure.
     *
     * @param \AppBundle\Entity\Flight $departure
     *
     * @return Site
     */
    public function addDeparture(\AppBundle\Entity\Flight $departure)
    {
        $this->departures[] = $departure;

        return $this;
    }

    /**
     * Remove departure.
     *
     * @param \AppBundle\Entity\Flight $departure
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDeparture(\AppBundle\Entity\Flight $departure)
    {
        return $this->departures->removeElement($departure);
    }

    /**
     * Get departures.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartures()
    {
        return $this->departures;
    }

    /**
     * Add arrival.
     *
     * @param \AppBundle\Entity\Flight $arrival
     *
     * @return Site
     */
    public function addArrival(\AppBundle\Entity\Flight $arrival)
    {
        $this->arrivals[] = $arrival;

        return $this;
    }

    /**
     * Remove arrival.
     *
     * @param \AppBundle\Entity\Flight $arrival
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeArrival(\AppBundle\Entity\Flight $arrival)
    {
        return $this->arrivals->removeElement($arrival);
    }

    /**
     * Get arrivals.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArrivals()
    {
        return $this->arrivals;
    }
}
