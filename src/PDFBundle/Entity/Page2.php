<?php

namespace PDFBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page2
 */
class Page2
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
