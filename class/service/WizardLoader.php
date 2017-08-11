<?php

namespace Service;

use \PDO;
use \Model\Wizard;
/**
 * Service Classes: Do the work for Wizard
 */
class WizardLoader
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get the wizard to display them
     * @return Wizard[]
     */
    public function getWizards()
    {
        $wizards = array();
        $wizardsData = $this->queryForWizards();
        foreach ($wizardsData as $wizardData) {
            $wizards[] = $this->createWizardFromData($wizardData);
        }
        return $wizards;
    }

    /**
     * Create a Wizard from database
     * @param  array  $wizardData
     * @return Wizard
     */
    private function createWizardFromData(array $wizardData)
    {
        $wizard = new Wizard($wizardData['name'], $wizardData['power'], $wizardData['life_point']);
        $wizard->setId($wizardData['id']);

        return $wizard;
    }

    /**
     * Find a wizard with is ID
     * @param  integer $id
     * @return null|Wizard
     */
    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM wizard WHERE id = :id');
        $statement->execute(array('id' => $id));
        $wizardArray = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$wizardArray) {
            return null;
        }

        return $this->createWizardFromData($wizardArray);
    }

    /**
     * Select all wizards
     * @return Wizard[]
     */
    private function queryForWizards()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM wizard');
        $statement->execute();
        $wizardArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $wizardArray;
    }

    /**
     * Database connection
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }
}
