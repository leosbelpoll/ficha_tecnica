<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="fos_user")
*/
class User extends BaseUser
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Vehiculo", mappedBy="usuario")
     **/
    private $vehiculos;

    public function __construct()
    {
    parent::__construct();
    $this->vehiculos = new ArrayCollection();
    // your own logic
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set vehiculos
     *
     * @param string $vehiculos
     * @return User
     */
    public function setVehiculos($vehiculos)
    {
        $this->vehiculos = $vehiculos;

        return $this;
    }

    /**
     * Get vehiculos
     *
     * @return string
     */
    public function getVehiculos()
    {
        return $this->vehiculos;
    }

    public function __toString()
    {
        return $this->username;
    }
}