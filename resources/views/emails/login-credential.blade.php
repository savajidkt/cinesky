<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome to the Cinesky!</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<style>
		* {

			box-sizing: border-box;
			padding: 0;
			border-spacing: 0px;
			margin: 0;
			padding: 0;
			font-family: 'Montserrat', sans-serif;
		}

		p {
			font-family: 'Montserrat', sans-serif;
			margin: 0;
			margin-top: 10px;
			font-size: 14px;
			line-height: 18px;
			color: #183D49;
			font-weight: 400;

		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: 'Montserrat', sans-serif;
			color: #183D49;

		}

		@media only screen and (max-width:450px) {
			.w100 {
				width: 100% !important;
				max-width: 100% !important;

			}

			.w40 {
				width: 100% !important;
				max-width: 100% !important;
				display: block !important;
				text-align: center !important;
			}

			.w60 {
				width: 100% !important;
				max-width: 100% !important;
				display: block !important;
				text-align: center !important;
				padding-top: 15px !important;
			}
		}
	</style>
</head>

<body style="margin:0;background-color: #fff;">
	<table style="width: 100%;background-color: #fff;" cellpadding="0" cellspacing="0" border="0" align="center">
		<tr>
			<td>



				<center>
					<table style="border: none;padding: 0;margin:auto;" align="center" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td style="padding: 0;max-width: 600px; min-width: 200px; line-height: 1.4; color: #183D49;padding: 0;border-spacing: 0;border-spacing: 0;padding: 0;margin: 0;box-sizing: border-box;width: 600px;background-color: #ffffff;padding-top: 0px;" width="600" class="w100">

								<table style="width: 600px;" border="0" cellpadding="0" cellspacing="0" width="600" class="w100">
									<tr>
										<td style="box-sizing: border-box;background-color: #183D49;padding: 20px;padding-bottom: 0;" class="w100">
											<table style="width: 560px;" border="0" cellpadding="0" cellspacing="0" width="560" class="w100">
												<tr>
													<td style="width: 260px;box-sizing: border-box;" width="260" class="w40">
														<img src="{{ asset('assets/img/email-logo.png') }}" alt="" style="width: 220px;" width="220">
													</td>
													<td style="width: 300px;box-sizing: border-box;text-align: right;" width="300" class="w60">
														<h2 style="margin: 0;color: #fff;">Cinesky</h2>
													</td>

												</tr>
											</table>

										</td>

									</tr>
								</table>
								<table style="width: 600px;" border="0" cellpadding="0" cellspacing="0" width="600" class="w100">
									<tr>
										<td class="w100">
											<img src="{{ asset('assets/img/Header-01.png') }}" alt="" style="width: 600px;display: block;" width="600" class="w100">
										</td>

									</tr>
								</table>
								<table style="width: 600px;" border="0" cellpadding="0" cellspacing="0" width="600" class="w100">
									<tr>
										<!-- background-image: url({{ asset('assets/img/email-Background-Image.png') }}); background-size: cover;background-position: center; -->
										<td style="background-color: #e7e7e7;" class="w100">
											<table style="width: 600px;" border="0" cellpadding="0" cellspacing="0" width="600" class="w100">
												<tr>
													<td style="padding: 40px;padding-bottom: 10px;box-sizing: border-box;" class="w100">
														<h2 style="text-align: center;color: #183D49;">Welcome to the Relational Intelligence Assessment!</h2>
														<p style="margin: 0;margin-top: 20px;">
															This assessment
															will explore your ability to work through real-life business scenarios that
															focus on relational skills in the workplace. There will be <b>22 scenarios</b>
															where you must rank order your responses for solving each problem based
															on what you think is most appropriate. You will be given <b>40 minutes</b> to
															complete the assessment.<b> Your responses are confidential and
																anonymous.</b> You will be the only one to receive feedback after you
															complete the assessment. No other leaders or key stakeholders at your
															organization will see the results.
														</p>
														<p style="margin: 0;margin-top: 20px;">
															Your log-in credentials are below. You have been given a temporary
															password that you will get to change once you have entered the Bandelli &
															Associates assessment portal.
														</p>
														<p style="margin: 0;margin-top: 30px;text-align: center;">
															<a href="{{ $url }}" target="_blank" style="text-decoration: none;color: #183D49;border:1px solid #4ACAF6;display: inline-block;font-weight: bold;padding: 6px 8px;">
																<span style="font-style: italic;background-color: #4ACAF6;padding: 12px 30px;display: inline-block;color: #183D49;">Log In</span>
															</a>
														</p>
														<p style="margin: 0;margin-top: 30px;">
															Username: <b>{{$user->email}}</b>
														</p>
														<p style="margin: 0;margin-top: 5px;">
															Password: <b>{{$password}}</b>
														</p>
														<p style="margin: 0;margin-top: 20px;">
															If you have any technical difficulties completing the assessment, please
															contact us at <a href="mailto:admin@bandelliandassociates.com" target="_blank">admin@bandelliandassociates.com</a>
														</p>
													</td>
												</tr>
											</table>

											<img src="{{ asset('assets/img/email-Footer-Image.png') }}" alt="" style="width: 600px;display: block;" width="600" class="w100">
											<table style="width: 600px; background-image: url({{ asset('assets/img/footer-bg.png') }}); background-size: cover;background-position: center;" border="0" cellpadding="0" cellspacing="0" width="600" class="w100">
												<tr>
													<td style="box-sizing: border-box;padding-right: 0px;padding-left: 10px;padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #fff;"><a href="{{route('unsubscribe')}}">Unsubscribe</a> from lists</td>
													<td style="box-sizing: border-box;padding-right: 30px;padding-left: 30px;padding-bottom: 10px; padding-top: 10px;" align="right" class="w100">
														<table>
															<tr>
																<td>
																	<a href="https://www.facebook.com/officialbandelliassociates" target="_blank">
																		<img src="{{ asset('assets/img/email-facebook.png') }}" alt="" style="width: 35px;" width="35">
																	</a>
																</td>
																<td style="padding-left: 10px;">
																	<a href="https://www.instagram.com/adambandelli/" target="_blank">
																		<img src="{{ asset('assets/img/email-insta.png') }}" alt="" style="width: 35px;" width="35">
																	</a>
																</td>
																<td style="padding-left: 10px;">
																	<a href="https://www.youtube.com/channel/UCDhhamF26lfFqe8UAsEFv4g" target="_blank">
																		<img src="{{ asset('assets/img/email-youtube.png') }}" alt="" style="width: 35px;" width="35">
																	</a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>

									</tr>
								</table>



							</td>
						</tr>
					</table>




				</center>


			</td>
		</tr>
	</table>
</body>

</html>