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


}
