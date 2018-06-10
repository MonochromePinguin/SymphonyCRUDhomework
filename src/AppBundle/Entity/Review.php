<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Review
 *
 * @ORM\Table(name="review",
 *           indexes={
 *              @ORM\Index( columns={"user_rated_id"} ),
 *              @ORM\Index( columns={"review_author_id"} )
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
     * @ORM\ManyToOne( targetEntity="AppBundle\Entity\User")
     * @Assert\NotBlank(
     *     message = "Ce champs doit faire référence à un utilisateur"
     * )
     */
    private $userRated;

    /**
     * @ORM\ManyToOne( targetEntity="AppBundle\Entity\User")
     * @Assert\NotBlank(
     *     message = "Ce champs doit faire référence à un utilisateur"
     * )
     */
    private $reviewAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     * @Assert\NotBlank(
     *     message = "Ce champs doit contenir du texte"
     * )
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="datetime")
     * @Assert\NotBlank()
     * @Assert\Type(type = "DateTime")
     */
    private $publicationDate;


    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint")
     * @Assert\NotBlank(message="Prière d'aller remuer la salade")
     * @Assert\Type(
     *     type = "integer",
     *     message = "Ce champ doit être un nombre entier entre 0 et 5 inclus"
     * )
     * @Assert\Range(
     *     min = 0, max = 5,
     *     minMessage = "Ce champ doit être un nombre entier entre 0 et 5 inclus",
     *     maxMessage = "Ce champ doit être un nombre entier entre 0 et 5 inclus",
     *     invalidMessage = "Ce champ doit être un nombre entier entre 0 et 5 inclus"
     * )
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


    /**
     * Set userRated.
     *
     * @param \AppBundle\Entity\User|null $userRated
     *
     * @return Review
     */
    public function setUserRated(\AppBundle\Entity\User $userRated = null)
    {
        $this->userRated = $userRated;

        return $this;
    }

    /**
     * Get userRated.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getUserRated()
    {
        return $this->userRated;
    }

    /**
     * Set reviewAuthor.
     *
     * @param \AppBundle\Entity\User|null $reviewAuthor
     *
     * @return Review
     */
    public function setReviewAuthor(\AppBundle\Entity\User $reviewAuthor = null)
    {
        $this->reviewAuthor = $reviewAuthor;

        return $this;
    }

    /**
     * Get reviewAuthor.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getReviewAuthor()
    {
        return $this->reviewAuthor;
    }
}
