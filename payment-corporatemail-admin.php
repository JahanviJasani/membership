<?php


$msg1='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sportsmaidan</title>
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="800" height="478" bgcolor="#eaeaea">
	<tr>
    	<td>
        	<table cellpadding="0" cellspacing="0" align="center" bgcolor="#fff" width="670" style="border:1px solid #e2e2e2; padding:9px 7px;">
            	
                <tr>
                	<td bgcolor="#fff"  height="25px"> </td>
                </tr>
                <tr>
                	<td bgcolor="#fff" >
                    	<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#fff"  align="center" style="padding-left:18px; font-family:Arial, Helvetica, sans-serif; text-align:left;">
                        	<tr>
                            	<td bgcolor="#fff"  style=" font-size:16px; font-weight:bold; color:#000; text-align:left;">
                                	Dear Admin,
                                </td>
                            </tr>
                             <tr>
                                <td height="25px" bgcolor="#fff" > </td>
                            </tr>
                            <tr>
                            	<td bgcolor="#fff"  style="font-size:13px; color:#666666;">
                                	We have received payment with the following information:
                                </td>
                            </tr>
                            <tr>
                                <td height="25px" bgcolor="#fff" > </td>
                            </tr>
							<td>
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td align="left">Amount: </td>
									<td align="left">'.$amount.'</td>
								  </tr>
								 <tr>
									<td align="left">Email: </td>
									<td align="left">'.$email.'</td>
								  </tr>
								 <tr>
									<td align="left">Phone Number: </td>
									<td align="left">'.$phone.'</td>
                                </tr>
                                <tr>
                                    <td align="left">Company Name: </td>
                                    <td align="left">'.$company.'</td>
                                </tr>
                                <tr>
                                    <td align="left">Plan Category: </td>
                                    <td align="left">'.$plan_category.'</td>
                                </tr>
								 <tr>
                                    <td align="left">Plan Name: </td>
                                    <td align="left">'.$plan_name.'</td>
                                </tr>

								 <tr>
                 <td align="left">Plan Type: </td>
                 <td align="left">'.$plan_type.'</td>
                 </tr>
								 
								</table>

							  </td>
							<tr>
                                <td height="25px" bgcolor="#fff" > </td>
                            </tr>
							
                            <tr>
                            	<td bgcolor="#fff"  style="font-size:14px; color:#666666;">
                                	Regards,
                                </td>
                            </tr>
                            <tr>
                            	<td bgcolor="#fff"  style="font-size:16px; font-weight:bold; color:#000; line-height:29px;">
                                	Sports Maidan
                                </td>
                            </tr>
                             <tr>
                                <td bgcolor="#fff"  height="25px"> </td>
                            </tr>
                            <tr>
                            	<td bgcolor="#fff"  style=" color:#dfdfdf;">
                            		<hr/>
                                </td>
                            </tr>
                         
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>';

//echo $msg1

$headers1  = "MIME-Version: 1.0\r\n";
$headers1 .= "Content-type: text/html; charset: utf8\r\n";
 //$headers1 .= "From:".$name."<".$email.">" . "\r\n";
//$headers1 .= "CC: satishsuper7@gmail.com\r\n";
// $to1="fr.jahanvijasani@gmail.com";
$to1="play@sportsmaidan.com";
$mail = mail($to1,"Membership Registration - Sports Maidan",$msg1,$headers1);



?>