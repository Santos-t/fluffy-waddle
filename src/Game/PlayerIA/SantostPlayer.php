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

    public function getOpositeChoice()
    {
        if ($this->result->getLastChoiceFor($this->opponentSide) == parrent::friendChoice)
            return parent::foeChoice;
        else return parent::friendChoice;
    }



    public function getChoice()
    {
        //Salut Robin ! Bonne correction

        //Quelques variables pour faciliter l'écriture et la lecture du code
        $gangDuT9 = array('Paultato', 'Mattiashell', 'Vcollette', 'Neosia67');
        $nbRound = $this->result->getNbRound();
        $oppStats = $this->result->getStatsFor($this->opponentSide);
        $myStats = $this->result->getStatsFor($this->mySide);
        $oppName = $oppStats['name'];


        //Stratégie du Gang du T9
        if ($this->result->getNbRound() === 99 )
        {
            if (in_array($oppName, $gangDuT9))
                return parent::friendChoice();
            return parent::foeChoice();
        }

        //Au début on est gentil quand même
        if ($nbRound === 0)
            return parent::friendChoice();

        //Au tour 1 on copie l'adversaire
        else if ($nbRound == 1)
            return $this->result->getLastChoiceFor($this->opponentSide);

        //Tour 2 et plus

        //Je suis mauvais perdant ...
        if ($oppStats['score'] > $myStats['score'])
            return parent::foeChoice();

        //Si j'ai appris un truc au lycée c'est que quand on sait pas on copie ...
        return $this->result->getLastChoiceFor($this->opponentSide);



        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

    }

};
