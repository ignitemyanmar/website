<?php

class MailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$dlname=Input::get('dlname');
		$name=Input::get('name');
		$phone=Input::get('phone');
		$toemail=Input::get('toemail');
		$email=Input::get('email');
		$message=Input::get('expmessage');
		$message=strip_tags($message);
		$subjectStr ="Customer Contact ($name) from Automobile Weekly Car Journal Website";
		$message  ="<p style='padding:10px;'><b>Dear $dlname</b></p><br><p style='padding:10px;'>$message";
		$message .="<br></p>";				                
		
		$footer	  ="";

/* TO SENT dealer ****************************************/
		$fromAddr =$email;
		$recipientAddr =$toemail;
		// $recipientAddr ='sawnaythuaung92@gmail.com';
		

		$bodytext=$message;
$mailBodyText = <<<HHHHHHHHHHHHHH
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Customer Contact from Automobile Weekly Car Journal</title> 
</head>
<body>
<table width="100%" border="0" align="left" bgcolor="#eeffee">
<tr><td colspan="2" bgcolor="#EF7B0F" height="40px" valign="baseline" align="center"><font color="#fff" size="+2" face="Cambria"><b>$subjectStr</b></font></td></tr>
<tr>
<td height="30px" colspan="2">&nbsp;</td>
</tr>
<tr style="margin-left:40px;">
<td colspan="2" width="80%"><div  style="padding:8px; color:#555555; border:1px solid #eee;margin:5px 30px 50px; font-family:Georgia, 'Times New Roman', Times, serif; min-height:10px;">$bodytext</div></td>
</tr>
<tr>
<td colspan="2">$footer</td>
</tr>
<tr>
<td colspan="2" height="30px" style="background:#EF7B0F; font-family:Cambria" align="center"><a href="http://www.automobile.com.mm" style="color:#eee;">Automobile Weekly Car Journal</a></td>
</tr>
</table>
</body>
</html>
HHHHHHHHHHHHHH;
$headers = "From: ".$fromAddr."\r\n";  
$headers .= "Reply-To: ".$fromAddr."\r\n";  
$headers .= "Return-Path: ".$fromAddr."\r\n";   
$headers .= "Content-type: text/html\r\n"; 
mail("$recipientAddr","$subjectStr" ,"$mailBodyText","$headers");	
return Redirect::to('/');				
}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
