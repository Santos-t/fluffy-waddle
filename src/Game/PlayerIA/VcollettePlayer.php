<?php
namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;
/**
 * Class VcollettePlayer
 * @package Hackathon\PlayerIA
 * @author VictorC
 */
class VcollettePlayer extends Player
{
    // BONJOUR ROBIN
    protected $mySide;
    protected $opponentSide;
    protected $result;
    public function getChoice()
    {
        $turnnum = $this->result->getNbRound();
        $opp_name = $this->result->getStatsFor($this->opponentSide)['name'];
        // Gang du T9, collaboration accrue.
        $gangDuT9 = array("Mattiashell", "Santost", "Paultato");

        // Technique ancestrale du T9
        if ($turnnum === 9) {
            // Gentil avec la confrérie des T9
            if (in_array($opp_name, $gangDuT9))
                return parent::friendChoice();
            return parent::foeChoice();
        }
        $lastOpponentAction = $this->result->getLastChoiceFor($this->opponentSide);
        if ($lastOpponentAction === 0)
        {
            return parent::friendChoice();
        }

        return $lastOpponentAction;
    }

};
