<?php
/**
 * @var array $barcode_config
 * @var array $items
 */

use App\Libraries\Barcode_lib;

$barcode_lib = new Barcode_lib();
?>

<!doctype html>
<html lang="<?= current_language_code() ?>">

<head>
    <meta charset="utf-8">
    <title><?= lang('Items.generate_barcodes') ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>css/barcode_font.css">
    <style>
        .barcode svg {
            height: <?= $barcode_config['barcode_height'] ?>px;
            width: <?= $barcode_config['barcode_width'] ?>px;
        }
    </style>
</head>

<body class=<?= 'font_' . $barcode_lib->get_font_name($barcode_config['barcode_font']) ?> style="font-size: <?= $barcode_config['barcode_font_size'] ?>px;">
    <table cellspacing="<?= $barcode_config['barcode_page_cellspacing'] ?>" width="<?= $barcode_config['barcode_page_width'] . '%' ?>">
        <tr>
            <?php
            $count = 0;
            foreach ($items as $item) {
                if ($count % $barcode_config['barcode_num_in_row'] == 0 && $count != 0) {
                    echo '</tr><tr>';
                }
                echo '<td>' . $barcode_lib->display_barcode($item, $barcode_config) . '</td>';
                $count++;
            }
            ?>
        </tr>
    </table>
</body>

</html>
