<?php

namespace App\Entity;

use App\App;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Vehiculo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Vehiculo
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Clase")
     */
    private $clase;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marca")
     */
    private $marca;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tipo")
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Grupo")
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=255, nullable=true)
     */
    private $media;

    /**
     * @var string
     *
     * @ORM\Column(name="canti", type="string", length=255, nullable=true)
     */
    private $canti;

    /**
     * @var string
     *
     * @ORM\Column(name="pagado", type="string", length=255, nullable=true)
     */
    private $pagado;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_inicio", type="string")
     * @Assert\Length(min = 4, minMessage = "El año debe estar compuesto por 4 números.")
     * @Assert\Length(max = 4, maxMessage = "El año debe estar compuesto por 4 números.")
     * @Assert\Regex(pattern="/\d{4}/", message="El año solo admite 4 números.")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="string", nullable=true)
     * @Assert\Length(min = 4, minMessage = "El año debe estar compuesto por 4 números.")
     * @Assert\Length(max = 4, maxMessage = "El año debe estar compuesto por 4 números.")
     * @Assert\Regex(pattern="/\d{4}/", message="El año solo admite 4 números.")
     */
    private $fechaFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creacion", type="date")
     */
    private $creacion;

    /**
     * @ORM\OneToMany(targetEntity="File", mappedBy="vehiculo", cascade={"persist","remove"})
     **/
    private $files;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="vehiculos")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @ORM\OneToMany(targetEntity="Ficha", mappedBy="vehiculo", cascade={"persist","remove"})
     **/
    private $fichas;

    /**
     * @ORM\OneToMany(targetEntity="Fcoches", mappedBy="vehiculo", cascade={"persist","remove"})
     **/
    private $fcoches;


    public function __construct()
    {
        $this->fichas = new ArrayCollection();
        $this->fcoches = new ArrayCollection();
        $this->files = new ArrayCollection();
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
     * Set fichas
     *
     * @param Ficha $fichas
     * @return Vehiculo
     */
    public function setFichas(\App\Entity\Ficha $fichas = null)
    {
        $this->fichas = $fichas;

        return $this;
    }

    /**
     * Get fichas
     *
     * @return Ficha
     */
    public function getFichas()
    {
        return $this->fichas;
    }

    /**
     * Set fcoches
     *
     * @param Fcoches $fcoches
     * @return Vehiculo
     */
    public function setFcoches(\App\Entity\Fcoches $fcoches = null)
    {
        $this->fcoches = $fcoches;

        return $this;
    }

    /**
     * Get fcoches
     *
     * @return Fcoches
     */
    public function getFcoches()
    {
        return $this->fcoches;
    }

    /**
     * Set clase
     *
     * @param App\Entity\Clase $clase
     * @return Vehiculo
     */
    public function setClase(\App\Entity\Clase $clase = null)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get clase
     *
     * @return App\Entity\Clase
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set marca
     *
     * @param App\Entity\Marca $marca
     * @return Vehiculo
     */
    public function setMarca(\App\Entity\Marca $marca = null)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return App\Entity\Marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set tipo
     *
     * @param App\Entity\Tipo $tipo
     * @return Vehiculo
     */
    public function setTipo(\App\Entity\Tipo $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return App\Entity\Tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set grupo
     *
     * @param App\Entity\Grupo $grupo
     * @return Vehiculo
     */
    public function setGrupo(\App\Entity\Grupo $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return App\Entity\Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Vehiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set media
     *
     * @param string $media
     * @return Vehiculo
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set canti
     *
     * @param string $canti
     * @return Vehiculo
     */
    public function setCanti($canti)
    {
        $this->canti = $canti;

        return $this;
    }

    /**
     * Get pagado
     *
     * @return string
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set pagado
     *
     * @param string $pagado
     * @return Vehiculo
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }

    /**
     * Get canti
     *
     * @return string
     */
    public function getCanti()
    {
        return $this->canti;
    }

    /**
     * Set fechaInicio
     *
     * @param string $fechaInicio
     * @return Vehiculo
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return string 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set creacion
     *
     * @param string $creacion
     * @return Vehiculo
     */
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;

        return $this;
    }

    /**
     * Get creacion
     *
     * @return string
     */
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Vehiculo
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Vehiculo
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set usuario
     *
     * @param \App\Entity\User $usuario
     * @return Vehiculo
     */
    public function setUsuario(\App\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \App\Entity\User 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Add fichas
     *
     * @param \App\Entity\Ficha $fichas
     * @return Vehiculo
     */
    public function addFicha(\App\Entity\Ficha $fichas)
    {
        $this->fichas[] = $fichas;

        return $this;
    }

    /**
     * Remove fichas
     *
     * @param \App\Entity\Ficha $fichas
     */
    public function removeFicha(\App\Entity\Ficha $fichas)
    {
        $this->fichas->removeElement($fichas);
    }

    /**
     * Add files
     *
     * @param \App\Entity\File $files
     * @return Vehiculo
     */
    public function addFile(\App\Entity\File $files)
    {
        $this->files[] = $files;

        return $this;
    }

    /**
     * Remove files
     *
     * @param \App\Entity\File $files
     */
    public function removeFile(\App\Entity\File $files)
    {
        $this->files->removeElement($files);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Add fcoches
     *
     * @param \App\Entity\Fcoches $fcoches
     * @return Vehiculo
     */
    public function addFcoch(\App\Entity\Fcoches $fcoches)
    {
        $this->fcoches[] = $fcoches;

        return $this;
    }

    /**
     * Remove fcoches
     *
     * @param \App\Entity\Fcoches $fcoches
     */
    public function removeFcoch(\App\Entity\Fcoches $fcoches)
    {
        $this->fcoches->removeElement($fcoches);
    }

    public function __toString()
    {
        return 'Vehiculo - ' . $this->id;
    }
}
