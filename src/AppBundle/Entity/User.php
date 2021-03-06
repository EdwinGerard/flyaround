<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Review", mappedBy="reviewAuthor")
     */
    private $reviewAuthors;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flight", mappedBy="pilot")
     */
    private $pilots;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="passenger")
     */
    private $passengers;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=32)
     * @Assert\NotNull()
     * @Assert\NotBlank(message="Please enter your firstname.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=32,
     *     minMessage="The firstname is too short.",
     *     maxMessage="The firstname is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $firstName;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @Assert\NotBlank(message="Please enter your lastname.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=32,
     *     minMessage="The lastname is too short.",
     *     maxMessage="The lastname is too long.",
     *     groups={"Registration", "Profile"}
     * )
     * @ORM\Column(name="lastName", type="string", length=32)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="phoneNumber", type="string", length=32)
     */
    protected $phoneNumber;

    /**
     * @var \DateTime
     *
     * @Assert\NotNull()
     * @ORM\Column(name="birthDate", type="date")
     */
    protected $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable=true)
     */
    protected $creationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint", nullable=true)
     */
    protected $note;

    /**
     * @var bool
     *
     * @ORM\Column(name="isACertifiedPilot", type="boolean")
     */
    private $isACertifiedPilot;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return User
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return User
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set isACertifiedPilot
     *
     * @param boolean $isACertifiedPilot
     *
     * @return User
     */
    public function setIsACertifiedPilot($isACertifiedPilot)
    {
        $this->isACertifiedPilot = $isACertifiedPilot;

        return $this;
    }

    /**
     * Get isACertifiedPilot
     *
     * @return bool
     */
    public function getIsACertifiedPilot()
    {
        return $this->isACertifiedPilot;
    }

    public function __toString ()
    {
        return $this->firstName.$this->lastName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->reviewAuthors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pilots = new \Doctrine\Common\Collections\ArrayCollection();
        $this->passengers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reviewAuthor
     *
     * @param \AppBundle\Entity\Flight $reviewAuthor
     *
     * @return User
     */
    public function addReviewAuthor(\AppBundle\Entity\Flight $reviewAuthor)
    {
        $this->reviewAuthors[] = $reviewAuthor;

        return $this;
    }

    /**
     * Remove reviewAuthor
     *
     * @param \AppBundle\Entity\Flight $reviewAuthor
     */
    public function removeReviewAuthor(\AppBundle\Entity\Flight $reviewAuthor)
    {
        $this->reviewAuthors->removeElement($reviewAuthor);
    }

    /**
     * Get reviewAuthors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviewAuthors()
    {
        return $this->reviewAuthors;
    }

    /**
     * Add pilot
     *
     * @param \AppBundle\Entity\Flight $pilot
     *
     * @return User
     */
    public function addPilot(\AppBundle\Entity\Flight $pilot)
    {
        $this->pilots[] = $pilot;

        return $this;
    }

    /**
     * Remove pilot
     *
     * @param \AppBundle\Entity\Flight $pilot
     */
    public function removePilot(\AppBundle\Entity\Flight $pilot)
    {
        $this->pilots->removeElement($pilot);
    }

    /**
     * Get pilots
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPilots()
    {
        return $this->pilots;
    }

    /**
     * Add passenger
     *
     * @param \AppBundle\Entity\Flight $passenger
     *
     * @return User
     */
    public function addPassenger(\AppBundle\Entity\Flight $passenger)
    {
        $this->passengers[] = $passenger;

        return $this;
    }

    /**
     * Remove passenger
     *
     * @param \AppBundle\Entity\Flight $passenger
     */
    public function removePassenger(\AppBundle\Entity\Flight $passenger)
    {
        $this->passengers->removeElement($passenger);
    }

    /**
     * Get passengers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassengers()
    {
        return $this->passengers;
    }
}
