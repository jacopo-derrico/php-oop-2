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
    
    $productsArray = [ 
        $collare = new Product(
            'Collare',
            15,
            'cane',
            'https://picsum.photos/picsum/200/300',
            'Accessories'
        ),
        $croc15 = new Product(
            'Crocchette 15kg',
            45,
            'cane',
            'https://picsum.photos/picsum/200/300',
            'Food'
        ),
        $topino = new Product(
            'Topino lana',
            4,
            'gatto',
            'https://picsum.photos/picsum/200/300',
            'Toys'
        )
     ]
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