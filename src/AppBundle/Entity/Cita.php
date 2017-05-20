<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cita
 *
 * @ORM\Table(name="cita", indexes={@ORM\Index(name="fk_Cita_Mascota1_idx", columns={"Mascota_id"})})
 * @ORM\Entity
 */
class Cita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_atencion", type="date", nullable=true)
     */
    private $fechaAtencion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="proxima_cita", type="date", nullable=true)
     */
    private $proximaCita;

    /**
     * @var \Mascota
     *
     * @ORM\ManyToOne(targetEntity="Mascota")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Mascota_id", referencedColumnName="id")
     * })
     */
    private $mascota;



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
     * Set fechaAtencion
     *
     * @param \DateTime $fechaAtencion
     *
     * @return Cita
     */
    public function setFechaAtencion($fechaAtencion)
    {
        $this->fechaAtencion = $fechaAtencion;

        return $this;
    }

    /**
     * Get fechaAtencion
     *
     * @return \DateTime
     */
    public function getFechaAtencion()
    {
        return $this->fechaAtencion;
    }

    /**
     * Set proximaCita
     *
     * @param \DateTime $proximaCita
     *
     * @return Cita
     */
    public function setProximaCita($proximaCita)
    {
        $this->proximaCita = $proximaCita;

        return $this;
    }

    /**
     * Get proximaCita
     *
     * @return \DateTime
     */
    public function getProximaCita()
    {
        return $this->proximaCita;
    }

    /**
     * Set mascota
     *
     * @param \AppBundle\Entity\Mascota $mascota
     *
     * @return Cita
     */
    public function setMascota(\AppBundle\Entity\Mascota $mascota = null)
    {
        $this->mascota = $mascota;

        return $this;
    }

    /**
     * Get mascota
     *
     * @return \AppBundle\Entity\Mascota
     */
    public function getMascota()
    {
        return $this->mascota;
    }
}
