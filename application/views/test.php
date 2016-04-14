<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<form action="<?=base_url('bitrix/post');?>" method="post">
	Title*: <input type="text" name="DATA[TITLE]" value="" /><br />
	Company Name: <input type="text" name="DATA[COMPANY_TITLE]" value="" /><br />
	First Name: <input type="text" name="DATA[NAME]" value="" /><br />
	Last Name: <input type="text" name="DATA[LAST_NAME]" value="" /><br />
	Comments: <textarea name="DATA[COMMENTS]"></textarea><br />
	<input type="submit" value="Send" />
</form>