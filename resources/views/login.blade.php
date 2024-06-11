<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<title>JONUSA TRACKING </title>
	
	<link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">	
	<link type="text/css" href="{{asset('theme/jquery-ui.css')}}" rel="Stylesheet" />
	<link type="text/css" href="{{asset('theme/jquery.multiple.css')}}" rel="Stylesheet" />
	<link type="text/css" href="{{asset('theme/style.css')}}" rel="Stylesheet" />
	<link type="text/css" href="{{asset('theme/style.custom.php')}}" rel="Stylesheet" />
	
	<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.multiple.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.show-pass.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('js/gs.common.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/gs.connect.js')}}"></script>
</head>

<body id="login" onload="connectLoad()">
	<div id="loading_panel"></div>
	
	<div id="dialog_notify" title="" style="display: none;">
		<div class="row">
			<div class="row2">
				<div class="width100 center-middle">
					<span id="dialog_notify_text"></span>
				</div>
			</div>
		</div>
		<center>
			<input class="button" type="button" onclick="$('#dialog_notify').dialog('close');" value="OK" />
		</center>
	</div>
	
	<div class="wrapper">
		<div class="inner-wrapper">
			<div class="logo-block">
				<img class="logo" src="https://jontracking.com//img/logo.png" />	
			</div>
			
			<div class="server-select">
				<div class="row3">
								</div>
				
			</div>
							
			<div class="content">
				<div id="connect" class="content-block">
					<form action="#" target="" autocomplete="on">
						<div class="row3">
							<input placeholder="Username" class="inputbox icon icon-user" id="username" name="username" maxlength="50" value="jonusa">
						</div>
						<div class="row3" style="position: relative;">
															<div class="reveal" title="Show/hide password"></div>
														<input placeholder="Password" class="inputbox icon icon-password" type="password" id="password" name="password" maxlength="1000" value="123456">
						</div>
						<div class="submit-btn">
							<input type="submit" class="button" value="Login" onClick="connectLogin(); return false;"/>
							<div class="remember-block">
									<label for="remember_me" class="custom-checkbox" title="Remember me"></label>				
									<input class="checkbox float-right" type="checkbox" id="remember_me" name="checkbox-img" value="0">
							</div>
						</div>
					</form>
					
					<ul class="recover-register-block">
						<li><a href="#recover">Recover password</a></li>
												<span>or</span>
						<li><a href="#register">create account</a></li>
											</ul>
				</div>
				
				<div id="recover" class="content-block">
					<div class="row3">
						<input placeholder="E-mail" class="inputbox icon icon-email" id="rec_email" maxlength="50" />
					</div>
					<input type="hidden" id="rec_token" value="bd89a78b730f2707faecc80daa930eb2b5d4b3df" />
					<input type="button" class="button" value="Recover" onClick="connectRecoverURL();"/>
					<ul class="recover-register-block">
						<li><a href="#connect">Login</a></li>
												<span>or</span>
						<li><a href="#register">create account</a></li>
											</ul>
				</div>
				
								<div id="register" class="content-block">
					<div class="row3">
						<input placeholder="E-mail" class="inputbox icon icon-email" id="reg_email" maxlength="50" />
					</div>
					<input type="hidden" id="reg_token" value="bd89a78b730f2707faecc80daa930eb2b5d4b3df" />
					<input type="button" class="button" value="Register" onClick="connectRegister();"/>
					<ul class="recover-register-block">
						<li><a href="#connect">Login</a></li>
						<span>or</span>
						<li><a href="#recover">recover password</a></li>
					</ul>
				</div>
							</div>
	
			<div class="footer">
				<div class="float-left">
					<a class="mobile-v" href="mobile/index.php">Mobile version</a>
				</div>
				<div class="float-right">
					<select id="system_language" class="select float-right" onChange="switchLanguageLogin();"><option value="english">English</option><option value="indonesian">Indonesian</option></select>
				</div>
			</div>
			
			<br>
<center>

<a href="/demo"><img src="img/live-demo-button.png" alt="Live Demo" style="width:140px;height:40px;"></a>
<a href="/apps" target="_blank"><img src="img/android_app_button.png" alt="Live Demo" style="width:140px;height:40px;"></a>
<br>

</center>
<br>
<center>
<a href="/kebijakan-dan-privasi" target="_blank">Kebijakan dan Privasi</a>
			<br>		
			<center> <b>NEW Server IP : 127.0.0.1
			<br>
Info Port : <a target="_blank" href="/devices">http://127.0.0.1:8000/devices</a></b>
	
				
	</center>
					</div>
	</div>
</body>
</html>