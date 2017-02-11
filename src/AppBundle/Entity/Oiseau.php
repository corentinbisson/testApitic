<?php
/**
 * Created by PhpStorm.
 * User: coren
 * Date: 09/02/2017
 * Time: 21:21
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mamifere
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnimalRepository")
 */
class Oiseau extends Animal
{
    /**
     * @var string
     */
    private $couleur = '#F0E68C';

    /**
     * @var string
     *
     * @ORM\Column(name="feathers", type="string", length=100, nullable=true)
     */
    private $feathers;

    /**
     * Set feathers
     *
     * @param string $feathers
     * @return Oiseau
     */
    public function setFeathers($feathers)
    {
        $this->feathers = $feathers;

        return $this;
    }

    /**
     * Get feathers
     *
     * @return string
     */
    public function getFeathers()
    {
        return $this->feathers;
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
     * tweet
     *
     * @return string
     */
    public function tweet(){
        return 'je suis '.$this->getNom();
    }

    /**
     * get Description
     *
     * @return string
     */
    public function getDescription(){
        return $this->tweet().' et mon plumage est '.$this->feathers;
    }
}