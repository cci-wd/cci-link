<?php

namespace App\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Business
 *
 * @ORM\Table(name="businesses", indexes={@ORM\Index(name="Business_User", columns={"user_id"})})
 * @ORM\Entity
 * @UniqueEntity(
 *      fields = {"email"},
 *      message = "L'email fourni existe déjà"
 * )
 * 
 */
class Business
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     * @Assert\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "Le nom doit contenir {{ limit }} caractères au minimum",
     *      maxMessage = "Le nom ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slogan", type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "Le slogan ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    private $slogan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=400, nullable=true)
     * @Assert\Length(
     *      max = 400,
     *      maxMessage = "Le description ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var int|null
     *
     * @ORM\Column(name="employees", type="integer", nullable=true)
     */
    private $nbEmployees;

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     * @Assert\Url(
     *      message = "L'url {{ value }} n'est pas valide",
     * )
     */
    private $website;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_foundation", type="date", nullable=true)
     */
    private $dateFoundation;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=8, nullable=true)
     * @Assert\Regex(
     *      pattern = "/^([\d]{2}[\s.]?[\d]{2}[\s.]?[\d]{2})$/",
     *      message = "Le numéro fourni n'est pas valide"
     * )
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Assert\Email(
     *     message = "L'adresse mail '{{ value }}' n'est pas valide."
     * )
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     * @Assert\Url(
     *      message = "L'url {{ value }} n'est pas valide",
     * )
     */
    private $facebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     * @Assert\Url(
     *      message = "L'url {{ value }} n'est pas valide",
     * )
     */
    private $twitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     * @Assert\Url(
     *      message = "L'url {{ value }} n'est pas valide",
     * )
     */
    private $linkedin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="youtube", type="string", length=255, nullable=true)
     * @Assert\Url(
     *      message = "L'url {{ value }} n'est pas valide",
     * )
     */
    private $youtube;

    /**
     * @var \User
     *
     * @ORM\OneToOne(targetEntity="User", inversedBy="business")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offer", mappedBy="business", fetch="EAGER", orphanRemoval=true)
     */
    private $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getNbEmployees(): ?int
    {
        return $this->nbEmployees;
    }

    public function setNbEmployees(?int $nbEmployees): self
    {
        $this->nbEmployees = $nbEmployees;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getDateFoundation(): ?\DateTimeInterface
    {
        return $this->dateFoundation;
    }

    public function setDateFoundation(?\DateTimeInterface $dateFoundation): self
    {
        $this->dateFoundation = $dateFoundation;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Offer[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setBusiness($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->contains($offer)) {
            $this->offers->removeElement($offer);
            // set the owning side to null (unless already changed)
            if ($offer->getBusiness() === $this) {
                $offer->setBusiness(null);
            }
        }

        return $this;
    }
}
