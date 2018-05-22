<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="review",
 *           indexes={
 *              @ORM\Index( columns={"user_rated_id"} ),
 *              @ORM\Index( columns={"review_autuhor_id"} )
 *          }
 * )
 * * @ORM\Entity(repositoryClass="AppBundle\Repository\ReviewRepository")
 */
class Review
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
     * @var int
     *
     * @ORM\Column(name="user_rated_id", type="integer")
     * @ORM\ManyToOne( targetEntity="AppBundle\Entity\User")
     */
    private $userRated;

    /**
     * @var int
     *
     * @ORM\Column(name="review_author_id", type="integer")
     * @ORM\ManyToOne( targetEntity="AppBundle\Entity\User")
     */
    private $reviewAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="datetime")
     */
    private $publicationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint")
     */
    private $note;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userRated.
     *
     * @param int $userRated
     *
     * @return Review
     */
    public function setUserRated($userRated)
    {
        $this->userRated = $userRated;

        return $this;
    }

    /**
     * Get userRated.
     *
     * @return int
     */
    public function getUserRated()
    {
        return $this->userRated;
    }

    /**
     * Set reviewAuthor.
     *
     * @param int $reviewAuthor
     *
     * @return Review
     */
    public function setReviewAuthor($reviewAuthor)
    {
        $this->reviewAuthor = $reviewAuthor;

        return $this;
    }

    /**
     * Get reviewAuthor.
     *
     * @return int
     */
    public function getReviewAuthor()
    {
        return $this->reviewAuthor;
    }

    /**
     * Set text.
     *
     * @param string $text
     *
     * @return Review
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set publicationDate.
     *
     * @param \DateTime $publicationDate
     *
     * @return Review
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate.
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set note.
     *
     * @param int $note
     *
     * @return Review
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }
}
