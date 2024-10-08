<?php
class Email{
	public static function smtp_mail($subject, $email, $name, $message, $footer){
		$html_message = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			  <title>[SUBJECT]</title>
			  <style type="text/css">
			  body {
			   padding-top: 0 !important;
			   padding-bottom: 0 !important;
			   padding-top: 0 !important;
			   padding-bottom: 0 !important;
			   margin:0 !important;
			   width: 100% !important;
			   -webkit-text-size-adjust: 100% !important;
			   -ms-text-size-adjust: 100% !important;
			   -webkit-font-smoothing: antialiased !important;
			 }
			 .tableContent img {
			   border: 0 !important;
			   display: block !important;
			   outline: none !important;
			 }
			
			p, h2{
			  margin:0;
			}
			
			div,p,ul,h2,h2{
			  margin:0;
			}
			
			h2.bigger,h2.bigger{
			  font-size: 32px;
			  font-weight: normal;
			}
			
			h2.big,h2.big{
			  font-size: 21px;
			  font-weight: normal;
			}
			
			a.link1{
			  color:#00a65a;font-size:13px;font-weight:bold;text-decoration:none;
			}
			
			a.link2{
			  padding:8px;background:#00a65a;font-size:13px;color:#ffffff;text-decoration:none;font-weight:bold;
			}
			
			a.link3{
			  background:#00a65a; color:#ffffff; padding:8px 10px;text-decoration:none;font-size:13px;
			}
			.bgBody{
			background: #222d32;
			}
			.bgItem{
			background: #ffffff;
			}
			
			.text-center{
			  text-align: center;
			}
			
			</style>
			<script type="colorScheme" class="swatch active">
			  {
			    "name":"Default",
			    "bgBody":"222d32",
			    "link":"00a65a",
			    "color":"999999",
			    "bgItem":"ffffff",
			    "title":"555555"
			  }
			</script>
			
			</head>
			<body paddingwidth="0" paddingheight="0"   style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent bgBody" align="center"  style="font-family:helvetica, sans-serif;">
			  <tbody>
			  <tr>
			      <td height="25" bgcolor="#d2d6de" colspan="3"></td>
			    </tr>
			    <tr>
			      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tbody>
			    <tr>
			      <td valign="top" class="spechide"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tbody>
			    <tr>
			      <td height="250" bgcolor="#d2d6de">&nbsp;</td>
			    </tr>
			    <tr>
			      <td>&nbsp;</td>
			    </tr>
			  </tbody>
			</table>
			</td>
			      <td valign="top" width="600"><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="MainContainer" bgcolor="#ffffff">
			  <tbody>
			    <tr>
			      <td class="movableContentContainer">
			      		<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative; background-color: #d2d6de;">
			            	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
			                  <tr>
			                    <td bgcolor="#d2d6de" align="center" valign="middle" >
			                      <div class="contentEditableContainer contentImageEditable">
			                        <div class="contentEditable" >
			                          <img src="' . URL . '/img/favicon.png" alt="GDDManager" data-default="placeholder" data-max-width="150" width="150" height="150">
			                        </div>
			                      </div>
			                    </td>
			                  </tr>
			                </table>
			            </div>
			            <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
			            	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
			                  <tr><td height="25" bgcolor="#d2d6de"></td></tr>
			
			                <tr><td height="5" bgcolor="#00a65a"></td></tr>
			
			                <tr><td height="40" class="bgItem"></td></tr>
			
			                <tr>
			                  <td>
			                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top" class="bgItem">
			                      <tr>
			                        <td  width="70"></td>
			                        <td  align="center" width="530">
			                          <div class="contentEditableContainer contentTextEditable">
			                            <div class="contentEditable" style="font-size:32px;color:#555555;font-weight:normal;">
			                              <h2 style="font-size:32px;">' .  $subject . '</h2>
			                            </div>
			                          </div>
			                        </td>
			                        <td  width="70"></td>
			                      </tr>
			                    </table>
			                  </td>
			                </tr>
			                </table>
			            </div>
			            <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
			            	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
			                        <tr><td height="20"> </td></tr>
			                      </table>
			            </div>
			            <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
			            	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
			                        <tr><td colspan="3" height="16">&nbsp;</td></tr>
			                        <tr>
			                          <td width="16" class="spechide">&nbsp;</td>
			                          <td width="568" class="specbundle2">
			                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top" >
			                              <tr>
			                                <td align="left" valign="top">
			                                  <div class="contentEditableContainer contentTextEditable" >
			                                   <div class="contentEditable" style="color:#555555;font-size:16px;font-weight:normal;">
			                                    ' . $message . '
			                                  </div>
			                                </div>
			                              </td>
			                            </tr>
			                          <tr><td height="20">&nbsp;</td></tr>
			                      </table>
			                    </td>
			                    <td width="16" class="spechide">&nbsp;</td>
			                  </tr>
			                  <tr><td colspan="3" height="16">&nbsp;</td></tr>
			                </table>
			            </div>
			            <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
			            	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top" class="bgBody" >
			                  <tr><td height="54" style="border-bottom:1px solid #DAE0E4">&nbsp;</td></tr>
			
			                  <tr><td height="28"></td></tr>
			
			                  <tr>
			
			                    <td valign="top" align="center">
			                      <div class="contentEditableContainer contentTextEditable">
			                        <div class="contentEditable" style="color:#a8b0b6; font-size:13px;line-height: 16px;">
			                          <p>' . $footer . '</p>
			                          <br/><br/>
			                        </div>
			                      </div>
			                      </td>
			                    </tr>
			                </table>
			            </div>
			      
			      </td>
			    </tr>
			  </tbody>
			</table>
			</td>
			      <td valign="top" class="spechide"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tbody>
			    <tr>
			      <td height="250" bgcolor="#d2d6de">&nbsp;</td>
			    </tr>
			    <tr>
			      <td>&nbsp;</td>
			    </tr>
			  </tbody>
			</table>
			</td>
			    </tr>
			  </tbody>
			</table>
			</td>
			    </tr>
			  </tbody>
			</table>
			
			  </body>
			  </html>
			';
		
	    $message = str_replace('<br/>', '\\n\\n', $message);
	    $message = strip_tags($message);
	    $message = base64_encode($message);
	    $html_message = base64_encode($html_message);
	    
	    ini_set('default_socket_timeout', '3');
	    $user = 'postmaster@mail.gddmanager.com';
	    $pass = 'a647725bbd6a1d5016627b2b9fec5468-c322068c-9bb64111';
	    $host = 'smtp.mailgun.org';
	    $port = 587;
	    $to = $email;
	    $from = 'info@mail.gddmanager.com';
	    $template = "Subject: $subject\r\n"
	    ."To: $name <$email>\r\n"
	    ."From: GDDManager <info@mail.gddmanager.com>\r\n"
	    ."Return-PATH: <bounce@mail.gddmanager.com>\r\n"
	    ."Date: " . date('r', time()) . "\r\n"
	    ."MIME-Version: 1.0\r\n"
	    ."Content-type: multipart/alternative; boundary=\"simple boundary\"\r\n\r\n"
	    
	    ."--simple boundary\r\n"
	    ."Content-Type: text/plain; charset=utf-8\r\n"
	    ."Content-Transfer-Encoding: base64\r\n\r\n"
	    .$message . "\r\n\r\n"
	    
	    ."--simple boundary\r\n"
	    ."Content-Type: text/html; charset=utf-8\r\n"
	    ."Content-Transfer-Encoding: base64\r\n\r\n"
	    .$html_message . "\r\n"
	    ."--simple boundary--\r\n"
	    .".";
	    
	    if ($h = fsockopen($host, $port)){
	    	$data = array(
	    		0,
	    		"EHLO $host",
	    		'AUTH LOGIN',
	    		base64_encode($user),
	    		base64_encode($pass),
	    		"MAIL FROM: <$from>",
	    		"RCPT TO: <$to>",
	    		'DATA',
	    		$template
	    	);
	    	foreach($data as $c)
	    	{
	    		$c && fwrite($h, "$c\r\n");
	    		while(substr(fgets($h, 256), 3, 1) != ' '){}
	    	}
	    	fwrite($h, "QUIT\r\n");
	    	return fclose($h);
	    }
	    else{
	    	return false;
	    }
	}
}
?>