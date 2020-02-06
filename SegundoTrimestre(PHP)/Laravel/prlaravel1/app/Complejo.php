<?php

namespace App;

class Complejo
{


    protected $real = 0;
    protected $img = 0;
    function suma(Complejo $d): Complejo
    {
        $r = new Complejo();
        $r->setReal($this->real + $d->real)
            ->setImg($this->img + $d->img);
        return $r;
    }
    function opuesto(): Complejo
    {
        $r = new Complejo();
        $r->setReal(-$this->real)
            ->setImg(-$this->img);
        return $r;
    }
    function resta(Complejo $d): Complejo
    {
        return $this->suma($d->opuesto());
        
    }

    /**
     * Get the value of real
     */
    public function getReal()
    {
        return $this->real;
    }

    /**
     * Set the value of real
     *
     * @return  self
     */
    public function setReal($real)
    {
        $this->real = $real;

        return $this;
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
}
