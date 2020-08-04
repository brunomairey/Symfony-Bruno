<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cars
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity
 */
class Cars
{
    /**
     * @var int
     *
     * @ORM\Column(name="car_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $carId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $img = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="brand", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $brand = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="model", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $model = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=6, scale=2, nullable=true, options={"default"="NULL"})
     */
    private $price = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $location = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="availability", type="string", length=55, nullable=true, options={"default"="NULL"})
     */
    private $availability = 'NULL';

    public function getCarId(): ?int
    {
        return $this->carId;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(?string $availability): self
    {
        $this->availability = $availability;

        return $this;
    }


}
