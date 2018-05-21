<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flight
 *
 * @ORM\Table(name="flight")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FlightRepository")
 */
class Flight
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Site",
     *                inversedBy="departures")
     * @ORM\JoinColumn(nullable=false, name="departure_site_id")
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Site",
     *                inversedBy="arrivals")
     * @ORM\JoinColumn(name="arrival_site_id", nullable=false)
     */
    private $arrival;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $pilot;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PlaneModel",
     *                inversedBy="flights")
     */
    private $plane;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation",
     *                mappedBy="flight"
     * )
     */
    private $passenger;


    /**
     * @var int
     *
     * @ORM\Column(name="nbFreeSeats", type="smallint")
     */
    private $nbFreeSeats;

    /**
     * @var float
     *
     * @ORM\Column(name="seatPrice", type="float")
     */
    private $seatPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="takeOffTime", type="datetime")
     */
    private $takeOffTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationTime", type="datetime")
     */
    private $publicationTime;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="wasDone", type="boolean")
     */
    private $wasDone;


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
     * Set nbFreeSeats
     *
     * @param integer $nbFreeSeats
     *
     * @return Flight
     */
    public function setNbFreeSeats($nbFreeSeats)
    {
        $this->nbFreeSeats = $nbFreeSeats;

        return $this;
    }

    /**
     * Get nbFreeSeats
     *
     * @return int
     */
    public function getNbFreeSeats()
    {
        return $this->nbFreeSeats;
    }

    /**
     * Set seatPrice
     *
     * @param float $seatPrice
     *
     * @return Flight
     */
    public function setSeatPrice($seatPrice)
    {
        $this->seatPrice = $seatPrice;

        return $this;
    }

    /**
     * Get seatPrice
     *
     * @return float
     */
    public function getSeatPrice()
    {
        return $this->seatPrice;
    }

    /**
     * Set takeOffTime
     *
     * @param \DateTime $takeOffTime
     *
     * @return Flight
     */
    public function setTakeOffTime($takeOffTime)
    {
        $this->takeOffTime = $takeOffTime;

        return $this;
    }

    /**
     * Get takeOffTime
     *
     * @return \DateTime
     */
    public function getTakeOffTime()
    {
        return $this->takeOffTime;
    }

    /**
     * Set publicationTime
     *
     * @param \DateTime $publicationTime
     *
     * @return Flight
     */
    public function setPublicationTime($publicationTime)
    {
        $this->publicationTime = $publicationTime;

        return $this;
    }

    /**
     * Get publicationTime
     *
     * @return \DateTime
     */
    public function getPublicationTime()
    {
        return $this->publicationTime;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Flight
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set wasDone
     *
     * @param boolean $wasDone
     *
     * @return Flight
     */
    public function setWasDone($wasDone)
    {
        $this->wasDone = $wasDone;

        return $this;
    }

    /**
     * Get wasDone
     *
     * @return bool
     */
    public function getWasDone()
    {
        return $this->wasDone;
    }

    /**
     * Set departure.
     *
     * @param \AppBundle\Entity\Site $departure
     *
     * @return Flight
     */
    public function setDeparture(\AppBundle\Entity\Site $departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure.
     *
     * @return \AppBundle\Entity\Site
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set arrival.
     *
     * @param \AppBundle\Entity\Site $arrival
     *
     * @return Flight
     */
    public function setArrival(\AppBundle\Entity\Site $arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival.
     *
     * @return \AppBundle\Entity\Site
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set pilot.
     *
     * @param \AppBundle\Entity\User|null $pilot
     *
     * @return Flight
     */
    public function setPilot(\AppBundle\Entity\User $pilot = null)
    {
        $this->pilot = $pilot;

        return $this;
    }

    /**
     * Get pilot.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getPilot()
    {
        return $this->pilot;
    }

    /**
     * Set plane.
     *
     * @param \AppBundle\Entity\PlaneModel|null $plane
     *
     * @return Flight
     */
    public function setPlane(\AppBundle\Entity\PlaneModel $plane = null)
    {
        $this->plane = $plane;

        return $this;
    }

    /**
     * Get plane.
     *
     * @return \AppBundle\Entity\PlaneModel|null
     */
    public function getPlane()
    {
        return $this->plane;
    }

    ## CUSTOM FUNCTION ##
    public function __toString()
    {
        return 'departure: ' . $this->departure . ', arrival: ' . $this->arrival;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->passenger = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add passenger.
     *
     * @param \AppBundle\Entity\Reservation $passenger
     *
     * @return Flight
     */
    public function addPassenger(\AppBundle\Entity\Reservation $passenger)
    {
        $this->passenger[] = $passenger;

        return $this;
    }

    /**
     * Remove passenger.
     *
     * @param \AppBundle\Entity\Reservation $passenger
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePassenger(\AppBundle\Entity\Reservation $passenger)
    {
        return $this->passenger->removeElement($passenger);
    }

    /**
     * Get passenger.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassenger()
    {
        return $this->passenger;
    }
}
