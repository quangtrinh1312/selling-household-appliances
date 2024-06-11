<?php

session_start();
$idsp = filter_var($_GET["idsp"], FILTER_SANITIZE_STRING);
$soluong = filter_var($_GET["soluong"], FILTER_SANITIZE_NUMBER_INT);

foreach($_SESSION['cart'] as $key => $value) {
    if ($_SESSION['cart'][$key]['idsp'] == $idsp) {
        $_SESSION['cart'][$key]['soluong'] = $soluong;
        break;
    }
}
$str = "";
$tongTien = 0;
foreach ($_SESSION["cart"] as $item) {
    $giaDaFormat = number_format($item['gia']);
    $tongDaFormat = number_format($item['gia'] * $item['soluong']);
    $str .= "<tr>
        <td name=idsp hidden>{$item['idsp']}</td>
        <td class=image><a href=\"#\"><img src='{$item['hinhanh']}' width=60px height=60px/></a></td>
        <td class=name><a href=\"#\">{$item['tensp']}</a></td>
        <td class=quantity><input type=text size=1 value='{$item['soluong']}' name=qty class=w30>
            &nbsp;
            <img class=update title=Update alt=Update src='image/update.png'/>
            &nbsp;<img title='Remove' alt='Remove' class=delete src='image/remove.png'></td>
        <td class=price>{$giaDaFormat} VNĐ</td>
        <td class=total>{$tongDaFormat} VNĐ</td>
    </tr>";
    $tongTien += ($item['soluong'] * $item['gia']);
}
$tongTien = number_format($tongTien);
$str .= "<tr>
    <td></td>
    <td></td>
    <td></td>
    <td class=price><b>Tổng tiền:</b></td>
    <td class=total>{$tongTien} VNĐ</td>
</tr>";
echo $str;
?>
