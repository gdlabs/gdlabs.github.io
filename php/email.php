<?php
$ascii = array("\'", chr(10), chr(13));
$hex = array("'", "<br>", "<br>");


function emailCheck($email) {
	if (strstr($email, "@")) {
		if (strstr($email, ".")){
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
if ( (!strlen($_REQUEST['name'])>0) || (!strlen($_REQUEST['message'])>0) || (!emailCheck($_REQUEST['email'])) ) {
	echo "error=true";
} else {
	$to = "gdlabs <info@gdlabs.it>";
	$email = strip_tags($_REQUEST['email']);
	$subject = "gdlabs - contatto web da parte di '$email'";
	$name = strip_tags($_REQUEST['name'],"<br>");
	$name = str_replace(chr(10),"<br/>",$name);
	$name = str_replace($ascii,$hex,$name);
	$surname = strip_tags($_REQUEST['surname'],"<br>");
	$surname = str_replace(chr(10),"<br/>",$surname);
	$surname = str_replace($ascii,$hex,$surname);
	$organization = strip_tags($_REQUEST['organization'],"<br>");
	$organization = str_replace(chr(10),"<br/>",$organization);
	$organization = str_replace($ascii,$hex,$organization);
	$reason = strip_tags($_REQUEST['reason'],"<br>");
	$reason = str_replace(chr(10),"<br/>",$reason);
	$reason = str_replace($ascii,$hex,$reason);
	$budget = strip_tags($_REQUEST['budget'],"<br>");
	$budget = str_replace(chr(10),"<br/>",$budget);
	$budget = str_replace($ascii,$hex,$budget);
	$phone = strip_tags($_REQUEST['phone'],"<br>");
	$phone = str_replace(chr(10),"<br/>",$phone);
	$phone = str_replace($ascii,$hex,$phone);
	$message = strip_tags($_REQUEST['message'],"<br />");
	$message = str_replace(chr(10),"<br/>",$message);
	$message = str_replace($ascii,$hex,$message);

	$body = "<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">".
			"<html xmlns=\"http://www.w3.org/1999/xhtml\">".
			"	<head>".
			"		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />".
			"		<title>gdlabs</title>".
			"	</head>".
			"	<body style=\"background: #f1f1f1\">".
			"		<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">".
			"  			<tr>".
			"    			<td height=\"86\"><img src=\"http://www.gdlabs.it/gfx/img/lgo-mail.png\" width=\"251\" height=\"59\" border=\"0\" /></td>".
			"    		</tr>".
			"    		<tr><td height=\"1\" bgcolor=\"#dadada\"><!-- --></td></tr>".
			"    		<tr><td height=\"1\" bgcolor=\"#f6f6f6\"><!-- --></td></tr>".
			"    		<tr><td height=\"20\"><!-- --></td></tr>".
			"    		<tr>".
			"    			<td>".
			"    				<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>Name:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">$name</td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>Surname:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">$surname</td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>Organization:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">$organization</td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>Reason:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">$reason</td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>Budget:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">$budget</td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>Tel:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">$phone</td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>Message:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">$message</td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td colspan=\"2\" height=\"20\"><!-- --></td>".
			"    					</tr>".
			"    					<tr>".
			"    						<td width=\"20%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\"><strong>IP:</strong></td>".
			"    						<td width=\"80%\" valign=\"top\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #333\">" . $_SERVER["REMOTE_ADDR"] . "</td>".
			"    					</tr>".
			"    				</table>".
			"    			</td>".
			"    		</tr>".
			"    		<tr><td height=\"20\"><!-- --></td></tr>".
			"    		<tr><td height=\"1\" bgcolor=\"#dadada\"><!-- --></td></tr>".
			"    		<tr><td height=\"1\" bgcolor=\"#f6f6f6\"><!-- --></td></tr>".
			"    		<tr><td height=\"20\" style=\"font-family: Arial, Helvetica, Verdana, sans-serif; font-size: 12px; color: #999\">&copy;2012 gdlabs.</td></tr>".
			"		</table>".
			"	</body>".
			"</html>";

	$mailheaders = "MIME-Version: 1.0\n";
	$mailheaders .= "Content-type: text/html; charset=iso-8859-1\n";
	$mailheaders .= "From: $email\r\n";
	$mailheaders .= "Reply-To: " . $email ."\r\n";
	$mailheaders .= "X-Mailer: PHP/" . @phpversion();


	if (mail($to, $subject, $body, $mailheaders)) {
		echo json_encode(array(
			'error' => 'false',
			'msg' => 'Your email has been sent'
		));
	} else {
		echo json_encode(array(
			'error' => 'true',
			'msg' => 'Error'
		));
	}
}

?>