<?php
namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;
/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author FlorentD
 */
class Mobe94Player extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    private $mylastscore = 0;
    private $hislastscore = 0;
    private $hisscore;
    private $myscore;
    private $heisbad;
    private $imbad;
    public function getChoice()
    {
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
        if ($this->result->getNbRound() == 0)
            return parent::friendChoice();
        else {
            $this->hislastscore = $this->result->getLastScoreFor($this->opponentSide);
            $this->mylastscore = $this->result->getLastScoreFor($this->mySide);
            if ($this->result->getLastChoiceFor($this->opponentSide) == "foe")
                $this->heisbad = true;
            else
                $this->heisbad = false;
            if ($this->hisscore > $this->hislastscore)
                return parent::foeChoice();
            else if ($this->hisscore == $this->hislastscore)
                return parent::friendChoice();
            else
                return parent::foeChoice();
        }
    }
}
