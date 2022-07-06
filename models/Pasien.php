<?php

require_once(realpath (dirname(__FILE__)) . '/../Utility/Database.php');

class Pasien
{
    public ?int $id = null;
    public string $faskes;
    public string $nama;
    public string $nik;
    public string $kelamin;
    public int $umur;
    public string $hp;

    public function load($pasien)
    {
        $this->id = $pasien['id'] ?? null;
        $this->faskes = $pasien['faskes'];
        $this->nama = $pasien['nama'];
        $this->nik = $pasien['nik'];
        $this->kelamin = $pasien['kelamin'];
        $this->umur = $pasien['umur'];
        $this->hp = $pasien['hp'];
    }

    public function save()
    {
        $db = new Database();
        if ($this->id) {
            $db->updatePasien($this);
        } else {
            $db->createPasien($this);
        }
    }
}