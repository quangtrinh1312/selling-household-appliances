<?php

session_start();
$idsp = filter_var($_GET["idsp"], FILTER_SANITIZE_STRING); 
$tensp = filter_var($_GET["tensp"], FILTER_SANITIZE_STRING); 
$soluong = filter_var($_GET["soluong"], FILTER_SANITIZE_NUMBER_INT);
$hinhanh = filter_var($_GET["hinhanh"], FILTER_SANITIZE_STRING); 
$gia = filter_var($_GET["gia"], FILTER_SANITIZE_NUMBER_INT);

$found = false;

foreach ($_SESSION["cart"] as $item) {
    if ($item['idsp'] == $idsp) {        
        $found = true;
        break;
    }
}


if (!$found) {
    $new_item = array('idsp' => $idsp, 'tensp' => $tensp, 'soluong' => $soluong, 'hinhanh' => $hinhanh, 'gia' => $gia);
    array_push($_SESSION["cart"], $new_item);
    //$_SESSION["sl"]=$_SESSION["sl"]+1;
}

$str = "<table>
            <tbody>";
foreach ($_SESSION["cart"] as $item) {
    $str .="<tr>
                <td class=image>
                    <a href=product.html>
                        <img width=43 height=43 src={$item['hinhanh']}>
                    </a>
                </td>
                <td class=name><a href=product.html>{$item['tensp']}</a></td>
                <td class=quantity>x&nbsp;{$item['soluong']}</td>
            </tr>";
}
$str .= "</tbody></table>";

$_SESSION["SoLuongGioHang"] = count($_SESSION["cart"]);

$result = array('str' => $str, 'soluonggiohang' => $_SESSION["SoLuongGioHang"], 'found' => $found);
print json_encode($result);
?>
