<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",
     *                inversedBy="reservations"
     * )
     */
    private $passenger;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Flight",
     *                inversedBy="reservations"
     * )
     */
    private $flight;

    /**
     * @var int
     *
     * @ORM\Column(name="nbReservedSeats", type="smallint")
     */
    private $nbReservedSeats;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="datetime")
     */
    private $publicationDate;

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
     * Set nbReservedSeats
     *
     * @param integer $nbReservedSeats
     *
     * @return Reservation
     */
    public function setNbReservedSeats($nbReservedSeats)
    {
        $this->nbReservedSeats = $nbReservedSeats;

        return $this;
    }

    /**
     * Get nbReservedSeats
     *
     * @return int
     */
    public function getNbReservedSeats()
    {
        return $this->nbReservedSeats;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     *
     * @return Reservation
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set wasDone
     *
     * @param boolean $wasDone
     *
     * @return Reservation
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
     * Set passenger.
     *
     * @param \AppBundle\Entity\User|null $passenger
     *
     * @return Reservation
     */
    public function setPassenger(\AppBundle\Entity\User $passenger = null)
    {
        $this->passenger = $passenger;

        return $this;
    }

    /**
     * Get passenger.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * Set flight.
     *
     * @param \AppBundle\Entity\Flight|null $flight
     *
     * @return Reservation
     */
    public function setFlight(\AppBundle\Entity\Flight $flight = null)
    {
        $this->flight = $flight;

        return $this;
    }

    /**
     * Get flight.
     *
     * @return \AppBundle\Entity\Flight|null
     */
    public function getFlight()
    {
        return $this->flight;
    }

    ## CUSTOM FUNCTION ##
    public function __toString()
    {
        return strval($this->id);
    }

}