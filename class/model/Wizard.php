<?php

namespace Model;

abstract class Wizard
{
    private $id;
    private $name;
    private $power = 0;
    private $lifePoint = 100;

    public function __construct($name, $power, $lifePoint)
    {
        $this->name = $name;
        $this->power = $power;
        $this->lifePoint = $lifePoint;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (!is_numeric($id)) {
            throw new Exception('Invalid id passed: '.$id);
        }
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (!is_string($name)) {
            throw new Exception('Invalid name passed: '.$name);
        }
        $this->name = $name;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function setPower($power)
    {
        if (!is_numeric($power)) {
            throw new Exception('Invalid power passed: '.$power);
        }
        $this->power = $power;
    }

    public function getLifePoint()
    {
        return $this->lifePoint;
    }

    public function setLifePoint($lifePoint)
    {
        if (!is_numeric($lifePoint)) {
            throw new Exception('Invalid lifePoint passed: '.$lifePoint);
        }
        $this->lifePoint = $lifePoint;
    }

    public function getTeam()
    {
        return "none";
    }

    /**
     * Display the wizard's properties
     * @param  boolean $useShortFormat Display with values names or not
     * @return string                  wizard properties
     */
    public function getNameAndSpecs($useShortFormat = false)
    {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s/%s',
                $this->name,
                $this->power,
                $this->lifePoint
            );
        } else {
            return sprintf(
                '%s: power: %s, life points: %s',
                $this->name,
                $this->power,
                $this->lifePoint
            );
        }
    }
}
