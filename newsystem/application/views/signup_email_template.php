<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $PAGE_TITLE;?></title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#015591;">
  <tr>
    <td align="center" valign="top" bgcolor="#015591" style="background-color:#FFF;"><br>
    <br>
    <table width="900" border="1" cellspacing="0" cellpadding="0" style="border:1px solid #015591;">
      <tr>
        <td align="left" valign="top" bgcolor="#015591" style="background-color:#015591;">
		<table width="100%" border="0" cellspacing="0" cellpadding="15">
          <tr>
            <td align="center" style="color:#FFF; font-family:Arial, Helvetica, sans-serif; font-size:22px; padding-top:30px;padding-bottom:30px;"> 
				<?php echo $PAGE_HEADING;?> <br />
			</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000000; padding:12px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="10" style="margin-bottom:10px;">
          <tr>
            <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#015591;">
              <div style="font-size:20px;"><?php echo $ADDRESS_TO;?>,</div>
			  <div><br>
				<?php echo $ADDRESS_CONTENT;?> </div> 
			</td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="10" style="margin-bottom:10px;">
            <tr>
              <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#015591;">
			  <div style="font-size:14px;"><b>
					<img src="<?php echo base_url();?>images/email_ok.png" align="left" style="margin-right:20px;">
					<?php echo $SUCCESS_HEADER;?> :</b></div>
					<div style="color:#015591;"> <br />
					<?php echo $SUCCESS_TEXT;?> 
					<a href="#" style="color:#015591;font-weight:bold;"> <?php echo $LINK_LABEL;?> </a> <br /><br />
					<p style="color:#015591;font-weight:bold;">
					Your User Name : <?php echo $USER_NAME;?> <br /><br />
					Your Password  : <?php echo $PASS_WORD;?>
					</div>
					</p>
				</td>
            </tr>
          </table>
          </td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#006c00" style="background-color:#015591;">
		<table width="100%" border="0" cellspacing="0" cellpadding="15">
          <tr>
            <td align="left" valign="top" style="color:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:13px;">
			Company Address <br>
              Contact Person <br>
              Phone: (123) 456-789 <br>
              Email: 
			  <a href="mailto:name@yourcompanyname.com" style="color:#ffffff; text-decoration:none;">name@yourcompanyname.com</a>
			  <br>
              Website: 
			  <a href="http://www.yourcompanyname.com" target="_blank" style="color:#ffffff; text-decoration:none;">
			  www.yourcompanyname.com</a></td>
          </tr>
        </table></td>
      </tr>
   </table>
	</td>
  </tr>
</table>
</body>
</html>