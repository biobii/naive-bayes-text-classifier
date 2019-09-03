# Naive Bayes Text Classifier

Library untuk klasifikasi teks Bahasa Indonesia menggunakan algoritma Naive Bayes Classifier (NBC). Proses stemming pada package ini menggunakan library [Sastrawi](https://github.com/sastrawi/sastrawi).

## Cara Penggunaan

Install menggunakan perintah `composer require biobii/naive-bayes-text-classifier`.

Menyiapkan data training. Bentuk data harus mengikuti seperti contoh berikut. Nilai pada key `class` dapat disesuaikan sesuai kebutuhan.
```php
$data = [
    [
        'text' => 'Filmnya bagus, saya suka',
        'class' => 'positif'
    ],
    [
        'text' => 'Film jelek, aktingnya payah.',
        'class' => 'negatif'
    ],
];
```

Berikut contoh lengkap penggunaan.
```php
require __DIR__ . '/vendor/autoload.php';

use Biobii\NaiveBayes;

$data = [
    [
        'text' => 'Filmnya bagus, saya suka',
        'class' => 'positif'
    ],
    [
        'text' => 'Filmnya menarik, aktingnya bagus',
        'class' => 'positif'
    ],
    [
        'text' => 'Saya suka film ini sangat keren',
        'class' => 'positif'
    ],
    [
        'text' => 'Film jelek, aktingnya payah.',
        'class' => 'negatif'
    ],
    [
        'text' => 'Kecewa, ini adalah film terburuk yang pernah saya tonton',
        'class' => 'negatif'
    ],
];

$nb = new NaiveBayes();

// mendefinisikan class target sesuai dengan yang ada pada data training.
$nb->setClass(['positif', 'negatif']);

// proses training
$nb->training($data);

// pengujian
echo $nb->predict('alur ceritanya jelek dan aktingnya payah'); // output "negatif"
```