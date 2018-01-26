<?php
require_once("../paysys/kkb.utils.php");
$self = $_SERVER['PHP_SELF'];
$path1 = '../paysys/config.txt';	// Ïóòü ê ôàéëó íàñòðîåê config.dat
$order_id = rand(1, 100000);				// Ïîðÿäêîâûé íîìåð çàêàçà - ïðåîáðàçóåòñÿ â ôîðìàò "000001"
$currency_id = "398"; 			// Øèôð âàëþòû  - 840-USD, 398-Tenge
$amount = 10;				// Ñóììà ïëàòåæà
$content = process_request($order_id,$currency_id,$amount,$path1); // Âîçâðàùàåò ïîäïèñàííûé è base64 êîäèðîâàííûé XML äîêóìåíò äëÿ îòïðàâêè â áàíê
?>
<html>
<head>
<title>Pay</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
<form name="SendOrder" method="post" action="https://testpay.kkb.kz/jsp/process/logon.jsp">
   <input type="hidden" name="Signed_Order_B64" value="<?php echo $content;?>">
   E-mail: <input type="text" name="email" size=50 maxlength=50  value="mirzoxid1992@gmail.com">
   <p>
   <input type="hidden" name="Language" value="eng"> <!-- ÿçûê ôîðìû îïëàòû rus/eng -->
   <input type="hidden" name="BackLink" value="https://baibol.herokuapp.com/paytest/pay.php">
   <input type="hidden" name="PostLink" value="https://baibol.herokuapp.com/paytest/postlink.php">
   Chiqimga tayyormisiz<br>
   <input type="submit" name="GotoPay"  value="Unda bitta chertvoring ))" >&nbsp;
</form>
</body>
</html>
