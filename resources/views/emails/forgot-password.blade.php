<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Reset Your Password | {{ env('APP_URL') }}</title>
		<style type="text/css">
			/* ----- Custom Font Import ----- */
			@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&subset=latin,latin-ext);

			/* ----- Text Styles ----- */
			table{
				font-family: 'Lato', Arial, sans-serif;
				-webkit-font-smoothing: antialiased;
				-moz-font-smoothing: antialiased;
				font-smoothing: antialiased;
			}

			@media only screen and (max-width: 700px){
				/* ----- Base styles ----- */
				.full-width-container{
					padding: 0 !important;
				}

				.container{
					width: 100% !important;
				}

				/* ----- Header ----- */
				.header td{
					padding: 30px 15px 30px 15px !important;
				}

				/* ----- Projects list ----- */
				.projects-list{
					display: block !important;
				}

				.projects-list tr{
					display: block !important;
				}

				.projects-list td{
					display: block !important;
				}

				.projects-list tbody{
					display: block !important;
				}

				.projects-list img{
					margin: 0 auto 25px auto;
				}

				/* ----- Half block ----- */
				.half-block{
					display: block !important;
				}

				.half-block tr{
					display: block !important;
				}

				.half-block td{
					display: block !important;
				}

				.half-block__image{
					width: 100% !important;
					background-size: cover;
				}

				.half-block__content{
					width: 100% !important;
					box-sizing: border-box;
					padding: 25px 15px 25px 15px !important;
				}

				/* ----- Hero subheader ----- */
				.hero-subheader__title{
					padding: 80px 15px 15px 15px !important;
					font-size: 35px !important;
				}

				.hero-subheader__content{
					padding: 0 15px 90px 15px !important;
				}

				/* ----- Title block ----- */
				.title-block{
					padding: 0 15px 0 15px;
				}

				/* ----- Paragraph block ----- */
				.paragraph-block__content{
					padding: 25px 15px 18px 15px !important;
				}

				/* ----- Info bullets ----- */
				.info-bullets{
					display: block !important;
				}

				.info-bullets tr{
					display: block !important;
				}

				.info-bullets td{
					display: block !important;
				}

				.info-bullets tbody{
					display: block;
				}

				.info-bullets__icon{
					text-align: center;
					padding: 0 0 15px 0 !important;
				}

				.info-bullets__content{
					text-align: center;
				}

				.info-bullets__block{
					padding: 25px !important;
				}

				/* ----- CTA block ----- */
				.cta-block__title{
					padding: 35px 15px 0 15px !important;
				}

				.cta-block__content{
					padding: 20px 15px 27px 15px !important;
				}

				.cta-block__button{
					padding: 0 15px 0 15px !important;
				}
			}
		</style>

		<!--[if gte mso 9]><xml>
			<o:OfficeDocumentSettings>
				<o:AllowPNG/>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml><![endif]-->
	</head>

	<body style="padding: 0; margin: 0;" bgcolor="#eeeeee">
		<span style="color:transparent !important; overflow:hidden !important; display:none !important; line-height:0px !important; height:0 !important; opacity:0 !important; visibility:hidden !important; width:0 !important; mso-hide:all;">This is your preheader text for this email (Read more about email preheaders here - https://goo.gl/e60hyK)</span>

		<!-- / Full width container -->
		<table class="full-width-container" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#eeeeee" style="width: 100%; height: 100%; padding: 30px 0 30px 0;">
			<tr>
				<td align="center" valign="top">
					<!-- / 700px container -->
					<table class="container" border="0" cellpadding="0" cellspacing="0" width="700" bgcolor="#ffffff" style="width: 700px;">
						<tr>
							<td align="center" valign="top">
								<!-- / Header -->
								<table class="container header" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">
									<tr>
										<td style="padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;" align="left">
											<a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">{{env('APP_NAME')}}</a>
										</td>
									</tr>
								</table>
								<!-- /// Header -->

								<!-- / Hero subheader -->
								<table class="container hero-subheader" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">
									<tr>
										<td class="hero-subheader__title" style="font-size: 43px; font-weight: bold; padding: 40px 0 15px 0;" align="left">Reset Your Password</td>
									</tr>

									<tr>
										<td class="hero-subheader__content" style="font-size: 16px; line-height: 27px; color: #444444; padding: 0 60px 40px 0;" align="left">Hi {{$user->first_name}},<br/>
											If you requested a password reset for your account, click the button below.
											If you didn't request this, don't do anything and ignore this email.<br/>
											Do you need assistance or more information? Please check our contact form on <a href="{{url('/contact')}}">this link</a>.
										</td>
									</tr>

									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td class="cta-block__button" width="300" align="center" style="width: 300px;">
														<a href="{{ env('APP_URL') }}:8000/reset/{{ $user->email }}/{{ $code }}" style="border-radius: 0px; color: #fefefe; background-color: green; text-decoration: none; padding: 15px 45px; text-transform: uppercase; display: block; text-align: center; font-size: 16px;">Reset Your Password</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Hero subheader -->

								<!-- / Divider -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 25px;" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-bottom: solid 1px #eeeeee; width: 620px;">
												<tr>
													<td align="center">&nbsp;</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Divider -->

								<!-- / Info Bullets -->
								<table class="container info-bullets" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="width: 620px;">
												<tr>
													<td class="info-bullets__block" style="padding: 30px 30px 15px 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="img/img13.png">
																</td>

																<td class="info-bullets__content" style="color: #444444; font-size: 16px;">contact@example.com</td>
															</tr>
														</table>
													</td>

													<td class="info-bullets__block" style="padding: 30px 30px 15px 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="img/img11.png">
																</td>

																<td class="info-bullets__content" style="color: #444444; font-size: 16px;">(541) 754-3010</td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td class="info-bullets__block" style="padding: 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="img/img12.png">
																</td>

																<td class="info-bullets__content" style="color: #444444; font-size: 16px;">New York, 222 West 23rd</td>
															</tr>
														</table>
													</td>

													<td class="info-bullets__block" style="padding: 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="img/img12.png">
																</td>

																<td class="info-bullets__content" style="color: #444444; font-size: 16px;">Paris, Champ de Mars 54</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Info Bullets -->

								<!-- / Social nav -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-top: 1px solid #eeeeee; width: 620px;">
												<tr>
													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="img/img7.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="img/img8.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="img/img9.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="img/img10.png" border="0">
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Social nav -->

								<!-- / Footer -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-top: 1px solid #eeeeee; width: 620px;">
												<tr>
													<td style="text-align: center; padding: 50px 0 10px 0;">
														<a href="#" style="font-size: 28px; text-decoration: none; color: #444444;">{{env('APP_NAME')}}</a>
													</td>
												</tr>

												<tr>
													<td align="middle">
														<table width="60" height="2" border="0" cellpadding="0" cellspacing="0" style="width: 60px; height: 2px;">
															<tr>
																<td align="middle" width="60" height="2" style="background-color: none; width: 60px; height: 2px; font-size: 1px;"><img src="img/img16.jpg"></td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td style="color: #444444; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;">Copyright &copy; 2017 <a href="{{url('/home')}}" target="_blank" style="text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #444444;">{{env('APP_NAME')}}</a>. <br />All rights reserved.</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Footer -->
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>