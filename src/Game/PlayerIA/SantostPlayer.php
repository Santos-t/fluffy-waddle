<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class SantostPlayer
 * @package Hackathon\PlayerIA
 * @author Santos Theo
 */
class SantostPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        //Salut Robin ! Bonne correction

        //Quelques variables pour faciliter l'écriture et la lecture du code
        $gangDuT99 = array('Paultato', 'Mattiashell', 'Vcollette', 'Neosia67');
        $nbRound = $this->result->getNbRound();
        $oppStats = $this->result->getStatsFor($this->opponentSide);
        $myStats = $this->result->getStatsFor($this->mySide);
        $oppName = $oppStats['name'];
        $lastOppAction = $this->result->getLastChoiceFor($this->opponentSide);

        //Stratégie du Gang du T99
        if ($this->result->getNbRound() === 99)
        {
            if (in_array($oppName, $gangDuT99))
                return parent::friendChoice();
            return parent::foeChoice();
        }

        //Au début on est gentil quand même
        if ($nbRound === 0)
            return parent::friendChoice();

        //Au tour 1 on copie l'adversaire
        else if ($nbRound === 1)
            return $lastOppAction;

        //Tour 2 et plus

        //Je suis mauvais perdant ...
        if ($oppStats['score'] > $myStats['score'])
            return parent::foeChoice();

        //Si j'ai appris un truc au lycée c'est que quand on sait pas on copie ...
        return $lastOppAction;
    }

};
