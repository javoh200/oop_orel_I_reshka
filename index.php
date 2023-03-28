<?php
class Player {
    public $name;
    public $coins;

    public function __construct($name, $coins)
    {
        $this->name=$name;
        $this->coins=$coins;
    }
    public function point(Player $player){
        $this->coins++;
        $player->coins--;
    }
    public function bankrupt(){
        return $this->coins == 0;
    }
    public function bank(){
        return $this->coins;
    }
    public function odds(Player $player){
        return $player1odds = round($this->player-bank() / ($this->player->bank()+$player->bank()), 2) * 100 . "%";

    }
}
class Game {
    protected $player1;
    protected $player2;
    protected $flips=1;
    public function __construct(Player $player1,PLayer $player2)
    {
        $this->player1=$player1;
        $this->player2=$player2;
    }

    public function flip(){
        return rand(0, 1) ? "орёл" : "решка";
    }
    public function start()
    {

        echo <<<EOT
        {$this->player1->name} :шансы {$this->player1->odds($this->player2)}
        {$this->player2->name} :шансы {$this->player2->odds($this->player1)}
EOT;



         $this->play();
    }
    public function play()
    {
        while (true) {


            if ($this->flip() == "орёл") {
                $this->player1->point($this->player1);

            } else {
                $this->player2->point($this->player2);


            }
            if ($this->player1->bankrupt() == 0 || $this->player2->bankrupt() == 0) {
                return $this->end;
            }
            $this->flips++;
        }
    }
    public function winner(): Player
    {
        return $this->player1->bank() > $this->player2->bank() ? $this->player1 : $this->player2;
    }
    public function end(){
        echo <<<EOT
        Game over.
        Победитель:{$this->winner()->name}
        Кол-во подбрасываний:{$this->flips}
EOT;

    }
}
$game = new Game(
        new Player('Joe',100),
        new Player('Jane',100)

);

$game->start();

