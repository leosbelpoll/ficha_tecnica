<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ficha
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ficha
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud_total", type="string", length=255, nullable=true)
     */
    private $longitudTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=255)
     */
    private $idioma;

    /**
     * @var string
     *
     * @ORM\Column(name="distacia_ejes", type="string", length=255, nullable=true)
     */
    private $distaciaEjes;

    /**
     * @var string
     *
     * @ORM\Column(name="altura_asiento", type="string", length=255, nullable=true)
     */
    private $alturaAsiento;

    /**
     * @var string
     *
     * @ORM\Column(name="capacidad_combustible", type="string", length=255, nullable=true)
     */
    private $capacidadCombustible;

    /**
     * @var string
     *
     * @ORM\Column(name="cilindrada", type="string", length=255, nullable=true)
     */
    private $cilindrada;

    /**
     * @var string
     *
     * @ORM\Column(name="diametro_cilindro", type="string", length=255, nullable=true)
     */
    private $diametroCilindro;

    /**
     * @var string
     *
     * @ORM\Column(name="carrera_cilindro", type="string", length=255, nullable=true)
     */
    private $carreraCilindro;

    /**
     * @var string
     *
     * @ORM\Column(name="relacion_compresion", type="string", length=255, nullable=true)
     */
    private $relacionCompresion;

    /**
     * @var string
     *
     * @ORM\Column(name="potencia", type="string", length=255, nullable=true)
     */
    private $potencia;

    /**
     * @var string
     *
     * @ORM\Column(name="rpm", type="string", length=255, nullable=true)
     */
    private $rpm;

    /**
     * @var string
     *
     * @ORM\Column(name="alimentacion", type="string", length=255, nullable=true)
     */
    private $alimentacion;

    /**
     * @var string
     *
     * @ORM\Column(name="encendido", type="string", length=255, nullable=true)
     */
    private $encendido;

    /**
     * @var string
     *
     * @ORM\Column(name="arranque", type="string", length=255, nullable=true)
     */
    private $arranque;

    /**
     * @var string
     *
     * @ORM\Column(name="embrague", type="string", length=255, nullable=true)
     */
    private $embrague;

    /**
     * @var string
     *
     * @ORM\Column(name="chasis", type="string", length=255, nullable=true)
     */
    private $chasis;

    /**
     * @var string
     *
     * @ORM\Column(name="suspension_delantera", type="string", length=255, nullable=true)
     */
    private $suspensionDelantera;

    /**
     * @var string
     *
     * @ORM\Column(name="recorrido_suspension", type="string", length=255, nullable=true)
     */
    private $recorridoSuspension;

    /**
     * @var string
     *
     * @ORM\Column(name="suspension_trasera", type="string", length=255, nullable=true)
     */
    private $suspensionTrasera;

    /**
     * @var string
     *
     * @ORM\Column(name="freno_delantero", type="string", length=255, nullable=true)
     */
    private $frenoDelantero;

    /**
     * @var string
     *
     * @ORM\Column(name="freno_trasero", type="string", length=255, nullable=true)
     */
    private $frenoTrasero;

    /**
     * @var string
     *
     * @ORM\Column(name="neumatico_delantero", type="string", length=255, nullable=true)
     */
    private $neumaticoDelantero;

    /**
     * @var string
     *
     * @ORM\Column(name="neumatico_trasero", type="string", length=255, nullable=true)
     */
    private $neumaticoTrasero;

    /**
     * @ORM\ManyToOne(targetEntity="Vehiculo", inversedBy="fichas")
     * @ORM\JoinColumn(name="vehiculo_id", referencedColumnName="id")
     */
    private $vehiculo;


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
     * Set vehiculo
     *
     * @param Vehiculo $vehiculo
     * @return Ficha
     */
    public function setVehiculo(\App\Entity\Vehiculo $vehiculo = null)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return Vehiculo
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     * @return Vehiculo
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return string
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set longitudTotal
     *
     * @param string $longitudTotal
     * @return Vehiculo
     */
    public function setLongitudTotal($longitudTotal)
    {
        $this->longitudTotal = $longitudTotal;

        return $this;
    }

    /**
     * Get longitudTotal
     *
     * @return string
     */
    public function getLongitudTotal()
    {
        return $this->longitudTotal;
    }

    /**
     * Set distaciaEjes
     *
     * @param string $distaciaEjes
     * @return Vehiculo
     */
    public function setDistaciaEjes($distaciaEjes)
    {
        $this->distaciaEjes = $distaciaEjes;

        return $this;
    }

    /**
     * Get distaciaEjes
     *
     * @return string
     */
    public function getDistaciaEjes()
    {
        return $this->distaciaEjes;
    }

    /**
     * Set alturaAsiento
     *
     * @param string $alturaAsiento
     * @return Vehiculo
     */
    public function setAlturaAsiento($alturaAsiento)
    {
        $this->alturaAsiento = $alturaAsiento;

        return $this;
    }

    /**
     * Get alturaAsiento
     *
     * @return string
     */
    public function getAlturaAsiento()
    {
        return $this->alturaAsiento;
    }

    /**
     * Set capacidadCombustible
     *
     * @param string $capacidadCombustible
     * @return Vehiculo
     */
    public function setCapacidadCombustible($capacidadCombustible)
    {
        $this->capacidadCombustible = $capacidadCombustible;

        return $this;
    }

    /**
     * Get capacidadCombustible
     *
     * @return string
     */
    public function getCapacidadCombustible()
    {
        return $this->capacidadCombustible;
    }

    /**
     * Set cilindrada
     *
     * @param string $cilindrada
     * @return Vehiculo
     */
    public function setCilindrada($cilindrada)
    {
        $this->cilindrada = $cilindrada;

        return $this;
    }

    /**
     * Get cilindrada
     *
     * @return string
     */
    public function getCilindrada()
    {
        return $this->cilindrada;
    }

    /**
     * Set diametroCilindro
     *
     * @param string $diametroCilindro
     * @return Vehiculo
     */
    public function setDiametroCilindro($diametroCilindro)
    {
        $this->diametroCilindro = $diametroCilindro;

        return $this;
    }

    /**
     * Get diametroCilindro
     *
     * @return string
     */
    public function getDiametroCilindro()
    {
        return $this->diametroCilindro;
    }

    /**
     * Set carreraCilindro
     *
     * @param string $carreraCilindro
     * @return Vehiculo
     */
    public function setCarreraCilindro($carreraCilindro)
    {
        $this->carreraCilindro = $carreraCilindro;

        return $this;
    }

    /**
     * Get carreraCilindro
     *
     * @return string
     */
    public function getCarreraCilindro()
    {
        return $this->carreraCilindro;
    }

    /**
     * Set relacionCompresion
     *
     * @param string $relacionCompresion
     * @return Vehiculo
     */
    public function setRelacionCompresion($relacionCompresion)
    {
        $this->relacionCompresion = $relacionCompresion;

        return $this;
    }

    /**
     * Get relacionCompresion
     *
     * @return string
     */
    public function getRelacionCompresion()
    {
        return $this->relacionCompresion;
    }

    /**
     * Set potencia
     *
     * @param string $potencia
     * @return Vehiculo
     */
    public function setPotencia($potencia)
    {
        $this->potencia = $potencia;

        return $this;
    }

    /**
     * Get potencia
     *
     * @return string
     */
    public function getPotencia()
    {
        return $this->potencia;
    }

    /**
     * Set rpm
     *
     * @param string $rpm
     * @return Vehiculo
     */
    public function setRpm($rpm)
    {
        $this->rpm = $rpm;

        return $this;
    }

    /**
     * Get rpm
     *
     * @return string
     */
    public function getRpm()
    {
        return $this->rpm;
    }

    /**
     * Set alimentacion
     *
     * @param string $alimentacion
     * @return Vehiculo
     */
    public function setAlimentacion($alimentacion)
    {
        $this->alimentacion = $alimentacion;

        return $this;
    }

    /**
     * Get alimentacion
     *
     * @return string
     */
    public function getAlimentacion()
    {
        return $this->alimentacion;
    }

    /**
     * Set encendido
     *
     * @param string $encendido
     * @return Vehiculo
     */
    public function setEncendido($encendido)
    {
        $this->encendido = $encendido;

        return $this;
    }

    /**
     * Get encendido
     *
     * @return string
     */
    public function getEncendido()
    {
        return $this->encendido;
    }

    /**
     * Set arranque
     *
     * @param string $arranque
     * @return Vehiculo
     */
    public function setArranque($arranque)
    {
        $this->arranque = $arranque;

        return $this;
    }

    /**
     * Get arranque
     *
     * @return string
     */
    public function getArranque()
    {
        return $this->arranque;
    }

    /**
     * Set embrague
     *
     * @param string $embrague
     * @return Vehiculo
     */
    public function setEmbrague($embrague)
    {
        $this->embrague = $embrague;

        return $this;
    }

    /**
     * Get embrague
     *
     * @return string
     */
    public function getEmbrague()
    {
        return $this->embrague;
    }

    /**
     * Set chasis
     *
     * @param string $chasis
     * @return Vehiculo
     */
    public function setChasis($chasis)
    {
        $this->chasis = $chasis;

        return $this;
    }

    /**
     * Get chasis
     *
     * @return string
     */
    public function getChasis()
    {
        return $this->chasis;
    }

    /**
     * Set suspensionDelantera
     *
     * @param string $suspensionDelantera
     * @return Vehiculo
     */
    public function setSuspensionDelantera($suspensionDelantera)
    {
        $this->suspensionDelantera = $suspensionDelantera;

        return $this;
    }

    /**
     * Get suspensionDelantera
     *
     * @return string
     */
    public function getSuspensionDelantera()
    {
        return $this->suspensionDelantera;
    }

    /**
     * Set recorridoSuspension
     *
     * @param string $recorridoSuspension
     * @return Vehiculo
     */
    public function setRecorridoSuspension($recorridoSuspension)
    {
        $this->recorridoSuspension = $recorridoSuspension;

        return $this;
    }

    /**
     * Get recorridoSuspension
     *
     * @return string
     */
    public function getRecorridoSuspension()
    {
        return $this->recorridoSuspension;
    }

    /**
     * Set suspensionTrasera
     *
     * @param string $suspensionTrasera
     * @return Vehiculo
     */
    public function setSuspensionTrasera($suspensionTrasera)
    {
        $this->suspensionTrasera = $suspensionTrasera;

        return $this;
    }

    /**
     * Get suspensionTrasera
     *
     * @return string
     */
    public function getSuspensionTrasera()
    {
        return $this->suspensionTrasera;
    }

    /**
     * Set frenoDelantero
     *
     * @param string $frenoDelantero
     * @return Vehiculo
     */
    public function setFrenoDelantero($frenoDelantero)
    {
        $this->frenoDelantero = $frenoDelantero;

        return $this;
    }

    /**
     * Get frenoDelantero
     *
     * @return string
     */
    public function getFrenoDelantero()
    {
        return $this->frenoDelantero;
    }

    /**
     * Set frenoTrasero
     *
     * @param string $frenoTrasero
     * @return Vehiculo
     */
    public function setFrenoTrasero($frenoTrasero)
    {
        $this->frenoTrasero = $frenoTrasero;

        return $this;
    }

    /**
     * Get frenoTrasero
     *
     * @return string
     */
    public function getFrenoTrasero()
    {
        return $this->frenoTrasero;
    }

    /**
     * Set neumaticoDelantero
     *
     * @param string $neumaticoDelantero
     * @return Vehiculo
     */
    public function setNeumaticoDelantero($neumaticoDelantero)
    {
        $this->neumaticoDelantero = $neumaticoDelantero;

        return $this;
    }

    /**
     * Get neumaticoDelantero
     *
     * @return string
     */
    public function getNeumaticoDelantero()
    {
        return $this->neumaticoDelantero;
    }

    /**
     * Set neumaticoTrasero
     *
     * @param string $neumaticoTrasero
     * @return Vehiculo
     */
    public function setNeumaticoTrasero($neumaticoTrasero)
    {
        $this->neumaticoTrasero = $neumaticoTrasero;

        return $this;
    }

    /**
     * Get neumaticoTrasero
     *
     * @return string
     */
    public function getNeumaticoTrasero()
    {
        return $this->neumaticoTrasero;
    }

    public function __toString()
    {
        return $this->id;
    }
}
