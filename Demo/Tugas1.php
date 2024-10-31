<?php
    namespace tugas1;

    trait discount{
        public function hitungDiscount($discountPercent){
            return $this->harga - ($this->harga * $discountPercent / 100);
        }
    }


    abstract class produk {
        protected $nama;
        protected $harga;

        public function __construct($nama, $harga)
        {
            $this->nama = $nama;
            $this->harga = $harga;            
        }

        abstract public function getProductinfo();

        public function __toString()
        {
            return "Produk: {$this->nama}, Harga: {$this->harga}";
        }
    }

    class elektronik extends produk{
        use discount;

        private $garansi;

        public function __construct($nama, $harga, $garansi)
        {
            parent::__construct($nama, $harga);
            $this->garansi = $garansi;
        }

        public function getProductinfo()
        {
            return "Produk: {$this->nama}, Harga: {$this->harga}, Garansi: {$this->garansi} Tahun";
        }
    }

    class sepatu extends produk{
        use discount;

        private $ukuran;

        public function __construct($nama, $harga, $ukuran)
        {
            parent::__construct($nama, $harga);
            $this->ukuran = $ukuran;
        }

        public function getProductinfo()
        {
            return "Produk: {$this->nama}, Harga: {$this->harga}, Ukuran: {$this->ukuran}";
        }
    }


    $laptop = new elektronik("Asus", 15000000, 3);
    $adidas = new sepatu("Adidas", 750000, 43);

    echo $laptop->getProductinfo() . "<br>";
    echo "Harga setelah diskon 10%: " . $laptop->hitungDiscount(10) . "\n";
    // echo $laptop . "<br><br>";
    echo "<br><br>";

    echo $adidas->getProductinfo() . "<br>";
    echo "Harga setelah diskon 30%: " . $adidas->hitungDiscount(30) . "\n";
    // echo $adidas . "<br><br>";
?>