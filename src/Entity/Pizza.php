<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'pizzas')]
    private $category;

    #[ORM\OneToMany(mappedBy: 'pizza', targetEntity: Order::class)]
    private $pizza_order;

    public function __construct()
    {
        $this->pizza_order = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getPizzaOrder(): Collection
    {
        return $this->pizza_order;
    }

    public function addPizzaOrder(Order $pizzaOrder): self
    {
        if (!$this->pizza_order->contains($pizzaOrder)) {
            $this->pizza_order[] = $pizzaOrder;
            $pizzaOrder->setPizza($this);
        }

        return $this;
    }

    public function removePizzaOrder(Order $pizzaOrder): self
    {
        if ($this->pizza_order->removeElement($pizzaOrder)) {
            // set the owning side to null (unless already changed)
            if ($pizzaOrder->getPizza() === $this) {
                $pizzaOrder->setPizza(null);
            }
        }

        return $this;
    }
}
