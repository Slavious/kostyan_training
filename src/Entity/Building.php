<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BuildingRepository")
 */
class Building
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background;


    //private $brand_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Buttons", mappedBy="builiding_id")
     */
    private $buttons;

    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->buttons = new ArrayCollection();
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getBrandName(): ?string
    {
        return $this->brand_name;
    }

    public function setBrandName(string $brand_name): self
    {
        $this->brand_name = $brand_name;

        return $this;
    }

    /**
     * @return Collection|Buttons[]
     */
    public function getButtons(): Collection
    {
        return $this->buttons;
    }

    public function addButton(Buttons $button): self
    {
        if (!$this->buttons->contains($button)) {
            $this->buttons[] = $button;
            $button->setBuilidingId($this);
        }

        return $this;
    }

    public function removeButton(Buttons $button): self
    {
        if ($this->buttons->contains($button)) {
            $this->buttons->removeElement($button);
            // set the owning side to null (unless already changed)
            if ($button->getBuilidingId() === $this) {
                $button->setBuilidingId(null);
            }
        }

        return $this;
    }
}
