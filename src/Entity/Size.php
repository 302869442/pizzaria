<?php

namespace App\Entity;

use App\Repository\SizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SizeRepository::class)]
class Size
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'size', targetEntity: Order::class)]
    private $Order_size;

    public function __construct()
    {
        $this->Order_size = new ArrayCollection();
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

    /**
     * @return Collection<int, order>
     */
    public function getOrderSize(): Collection
    {
        return $this->Order_size;
    }

    public function addOrderSize(order $orderSize): self
    {
        if (!$this->Order_size->contains($orderSize)) {
            $this->Order_size[] = $orderSize;
            $orderSize->setSize($this);
        }

        return $this;
    }

    public function removeOrderSize(order $orderSize): self
    {
        if ($this->Order_size->removeElement($orderSize)) {
            // set the owning side to null (unless already changed)
            if ($orderSize->getSize() === $this) {
                $orderSize->setSize(null);
            }
        }

        return $this;
    }
}
