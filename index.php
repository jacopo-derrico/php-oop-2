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

    trait PriceFormatter {
        public function formatPrice() {
            return number_format($this->prezzo, 2, ',', '.') . ' €';
        }
    }; 

    class Accessory extends Product {
        use PriceFormatter;
        public $materiale;
        public $taglia;
    
        function __construct($titolo, $prezzo, $animale, $img, $categoria, $materiale, $taglia) {
            parent::__construct($titolo, $prezzo, $animale, $img, $categoria);
            $this->materiale = $materiale;
            $this->taglia = $taglia;
        }
    };
    
    
    class Food extends Product {
        use PriceFormatter;
        public $scadenza; // MM/YYYY
        public $calorie;
    
        function __construct($titolo, $prezzo, $animale, $img, $categoria, $scadenza, $calorie) {
            parent::__construct($titolo, $prezzo, $animale, $img, $categoria);
            $this->scadenza = $scadenza;
            $this->calorie = $calorie;
        }

        function getCal() {
            return $this->calorie . 'kcal' ;
        }
    };
    
    
    class Toy extends Product {
        use PriceFormatter;
        public $eta;
        public $batterie;
    
        function __construct($titolo, $prezzo, $animale, $img, $categoria, $eta, $batterie) {
            parent::__construct($titolo, $prezzo, $animale, $img, $categoria);
            $this->eta = $eta;
            $this->batterie = $batterie;
        }

        function hasBatteries() {
            if ($this->batterie) {
                return $this->batterie = 'Batterie incluse';
            } else {
                return $this->batterie = 'Batterie NON incluse';
            }
        }
    };

    
    $productsArray = [ 
        $collare = new Accessory(
            'Collare',
            15,
            'cane',
            'https://picsum.photos/400/400',
            'Accessories',
            'Pelle',
            'L'
        ),
        $croc15 = new Food(
            'Crocchette 15kg',
            45,
            'cane',
            'https://picsum.photos/400/400',
            'Food',
            '08/2025',
            350
        ),
        $topino = new Toy(
            'Topino lana',
            4,
            'gatto',
            'https://picsum.photos/400/400',
            'Toys',
            'Cucciolo',
            true
        )
        ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal store</title>

    <!-- Fontawesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==' crossorigin='anonymous'/>
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center mt-3">
        Pet shop <i class="fa-solid fa-paw"></i>
    </h1>
    <div class="container-fluid my-5">
        <div class="row col-10 mx-auto gap-3">
            <?php foreach($productsArray as $product) : ?>
            <div class="card col-3 px-0 ">
                <figure class="figure position-relative " style="height: 80%; width:100%;">
                    <img src="<?= $product->img ?>" class="img-fluid object-fit-cover" alt="<?= $product->titolo.' copertina' ?>"
                    style="border-radius: 0.3rem 0.3rem 0 0">
                    <span class="position-absolute bg-white rounded rounded-circle px-2 py-1" style="top: 10px; right: 10px; aspect-ratio: 1;">
                        <i class="fa-solid <?= ($product->animale === 'cane') ? 'fa-dog' : 'fa-cat' ?>"></i>
                    </span>
                </figure>
                <div class="card-body">
                    <h5 class="card-title"><?= $product->titolo ?></h5>
                    <h6 class="card-text">
                        <?= $product->formatPrice();?>
                    </h6>
                </div>
                <div class="card-footer text-body-secondary">
                    <?= $product->categoria ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>


    <!-- Bootstrap 5.3.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>