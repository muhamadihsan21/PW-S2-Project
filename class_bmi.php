<?php

require_once "class_bmipasien.php";

class bmi extends BMIPasien{
    public $berat;
    public $tinggi;

    public function __construct($berat, $tinggi){
        $this -> berat = $berat;
        $this -> tinggi = $tinggi;
    }

    function getnilaiBMI(){
        $berat = $this->berat;
        $tinggi = $this->tinggi/100;
        
        $nilai = ($berat / ($tinggi * $tinggi));

        return $this->nilai = number_format($nilai, 1);

    }

    function getstatusBMI(){

        if ($this->nilai >= 30){
            return "Kegemukan (obesitas)";
        }
        else if ($this->nilai >= 25){
            return "Kelebihan berat badan";
        }
        else if ($this->nilai >=18.5){
            return "Normal (ideal)";
        }
        else if($this->nilai < 18.5){
            return "Kekurangan berat badan";
        }
    }

}

?>