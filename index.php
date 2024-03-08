<?php
    class Product {
        public $titolo;
        public $prezzo;
        public $animale;
        public $img;
        public $categoria;

        function __construct($titolo, $prezzo, $animale, $img, $categoria) {
            $this->titolo =$titolo;
            $this->prezzo =$prezzo;
            $this->animale =$animale;
            $this->img =$img;
            $this->categoria =$categoria;
        }
    };
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal store</title>
</head>
<body>
    
</body>
</html>