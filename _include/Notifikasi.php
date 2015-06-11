<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'db_function.php';

class Notifikasi{
    private $tipe;          // 1= PM ; 2=chat; 3=trip; 4=pengalaman
    private $pengirim;
    private $penerima;
    private $judul = null;
    private $href = null;
    private $waktu;
    
    function __construct($tipe, $penerima) {
        $this->pengirim = @$_SESSION['username'];
        $this->penerima = $penerima; 
        $this->tipe = $tipe;
        $this->waktu = date("Y-m-d H:i:s");
        
    }
    
    function setJudul($judul){
        $this->judul = $judul;
    }
    
    function setHref($href){
        $this->href = $href;
    }
    
    function save(){
        $sql =  "REPLACE INTO tb_notifikasi (notif_tipe, notif_pengirim, notif_penerima, notif_judul, notif_href, notif_baru, notif_waktu) "
                . "VALUES ('". $this->tipe ."', '". $this->pengirim ."', '". $this->penerima ."', '". $this->judul ."', '". $this->href ."', '0', '". $this->waktu ."')";
        good_query($sql);
        //return $sql;
    }
}