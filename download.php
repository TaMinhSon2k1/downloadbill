<?php
function downloadBill($GUEST, $ADDRESS, $LIST) {
include_once 'HtmlToDoc.class.php';  

$htd = new HtmlToDoc();

$NAME_SHOP = 'CỬA HÀNG REROLLACC CHUYÊN CUNG CẤP CÁC SẢN PHẨM LAPTOP';
$listprod = printProduct();
$SUM = sumBill();

$htmlConTent =
    '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>download</title>
        <style>
            body{
                color: black;
                text-align: center;
            }
            .headerShop{
                font-size: 18px;
            }
            h1{
                font-size: 35px;
            }
            h2{
                font-size: 20px;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;    
            }
            table.center {
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <p class="headerShop">'.$NAME_SHOP.'</p>
        <h1>HÓA ĐƠN MUA HÀNG</h1>
        <h2>KHÁCH HÀNG: '.$GUEST.'</h2>
        <h3>Địa chỉ: '.$ADDRESS.'</h3>
        <table style="width:100%">
            <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            </tr>'
            .$listprod.
            '<tr>
                <td colspan="2">Tổng</td>
                <td>'.$SUM.'</td>
            </tr>
        </table>
    </body>
    </html>';

$wordDoc = $htd->createDoc($htmlConTent, 'my-word-document', 1);

if($wordDoc) {
    echo "T";
} else {
    echo "F";
}

function printProduct() {
    //dùng for in ra các dòng
    $listprod = 
        '<tr>
        <td>Asus TUF A15</td>
        <td>1</td>
        <td>25000000</td>
        </tr>';
    return $listprod;
}

function sumBill() {
    //Code tính tổng bill
    return 0;
}
}
?>