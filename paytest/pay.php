<?php
require_once("../paysys/kkb.utils.php");
$self = $_SERVER['PHP_SELF'];
$path1 = '../paysys/config.txt';	// ���� � ����� �������� config.dat
$order_id = 1;				// ���������� ����� ������ - ������������� � ������ "000001"
$currency_id = "398"; 			// ���� ������  - 840-USD, 398-Tenge
$amount = 10;				// ����� �������
$content = process_request($order_id,$currency_id,$amount,$path1); // ���������� ����������� � base64 ������������ XML �������� ��� �������� � ����
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
   <input type="hidden" name="Language" value="eng"> <!-- ���� ����� ������ rus/eng -->
   <input type="hidden" name="BackLink" value="http://merchant.loc/epay/paytest/pay.php">
   <input type="hidden" name="PostLink" value="http://merchant.loc/epay/paytest/postlink.php">
   �� ������ �������� (-�)<br>
   <input type="submit" name="GotoPay"  value="��, ������� � ������" >&nbsp;
</form>
</body>
</html>
