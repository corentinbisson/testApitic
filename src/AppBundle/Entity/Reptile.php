<?php
/**
 * Created by PhpStorm.
 * User: coren
 * Date: 09/02/2017
 * Time: 21:13
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reptile
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnimalRepository")
 */
class Reptile extends Animal
{
    /**
     * @var string
     */
    private $couleur = '#FFA07A';

    /**
     * @var string
     *
     * @ORM\Column(name="scale", type="string", length=100, nullable=true)
     */
    private $scale;

    /**
     * Set scale
     *
     * @param string $scale
     * @return Reptile
     */
    public function setScale($scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Get scale
     *
     * @return string
     */
    public function getScale()
    {
        return $this->scale;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     * @return Reptile
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * hiss
     *
     * @return string
     */
    public function hiss(){
        return 'je suis '.$this->getNom();
    }

    /**
     * get Description
     *
     * @return string
     */
    public function getDescription(){
        return $this->hiss().' et mes écailles sont '.$this->scale;
    }
}