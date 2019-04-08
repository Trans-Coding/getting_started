<!DOCTYPE html>

<style>
	body{
		font-family: 'Nunito', sans-serif;
	}
	table{
		width: 100%;
		text-align: left;
	}
	.job-image{
		width: 100%;
		border: 3px solid #55cdfc;
		border-radius: 15px;
		margin-bottom: 5px;
	}
	#resume_top{
		background-color: #55cdfc;
		height: 100px;
		font-size: 24px;
		text-align: center;
	}
	.section_holder{
		border-top: 5px solid;
		border-color: #f7a8b8;
		margin-top: 20px; 
	}
	#accordion a:link{
		color: #55cdfc;
	}
</style>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Jade's Resume</title>
		<meta name="description" content="Jade's Resume">
		<meta name="author" content="Jade Selke">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/styles.css?v=1.0">
		<link rel="apple-touch-icon" sizes="180x180" href="/public_html/pictures/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/public_html/pictures/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/public_html/pictures/favicon-16x16.png">
		<link rel="manifest" href="/public_html/pictures/site.webmanifest">
		<link rel="mask-icon" href="/public_html/pictures/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="/public_html/pictures/favicon.ico">
		<meta name="msapplication-TileColor" content="#b91d47">
		<meta name="msapplication-config" content="/public_html/pictures/browserconfig.xml">
		<meta name="theme-color" content="#941919">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>
	<body>

		<!-- top of resume -->
		<div id="resume_top" class="row align-items-center">
			<div class="col font-weight-bold">JADE R. SELKE</div>
			<div class="col">
				<a href="mailto:jade-transcoding@gmail.com?Subject=Re:Your%20Resume" target="_top">
					jade-transcoding@gmail.com
				</a>
			</div>
		</div>

		<!-- summary section -->
		<div id="resume_summary" class="row section_holder">
			<div class="col-12 font-weight-bold">SUMMARY</div>
			<div class="col-12">Team lead in software and website development, graduate of California State University, and veteran of the United States Air Force.</div>
		</div>

		<!-- skills section -->
		<div id="resume_skills" class="row section_holder">
			<div class="col-12 font-weight-bold">COMPUTER SKILLS</div>
			<div class="col-12">Languages: Proficient in: C++, C, JQuery, PHP, JavaScript, CSS/Bootstrap. Familiar with: Java, Visual Basic, XML, Swift, LISP.</div>
			<div class="col-12">Software: Database: MySQL Server, Microsoft Access, and Cloud SQL. Platforms: Windows, Linux (multiple distros), Android, and GitHub repository.</div>
		</div>

		<!-- experience section -->
		<div id="resume_experience" class="row section_holder">
			<div class="col-12 font-weight-bold">EXPERIENCE</div>

			<!-- begin accordion section for experience -->
			<div id="accordion">

				<!-- first exp section -->
				<div class="col-12 row">
					<div class="col-6 font-weight-bold">
						<a href="#" data-toggle="collapse" data-target="#fullStackExp" aria-expanded="false" aria-controls="fullStackExp"><i class="far fa-caret-square-down" style="color:#f7a8b8;"></i>Team Lead Full Stack (Lamp) Developer</a>
					</div>
					<div class="col-4 font-weight-bold">Magilla Loans</div>
					<div class="col-2 font-weight-bold">2018-present</div>
				</div>		
				
				<div class="col-12 collapse" id="fullStackExp" aria-labelledby="fullStackExp" data-parent="#accordion">
					<ul>
						<li>
							Increased user volume to main website by 25% over two month period by launching new SEM/SEO enhancements across 13 front facing landing pages.
						</li>
						<li>
							Created comprehensive tool suite for users utilizing interface controls provided via API access to Google, Stripe, Experian, Zillow, Optimal Blue, and Black Knight.
						</li>
						<li>
							Expanded impression and click through rates of ads by 20% by implementing real time monitoring of user interactions with AWS, Google Ad Manager and custom service components to maintain and analyze vendor interactions.
						</li>
						<li>
							Reduced overall testing time of customer registration process by over 75% through a custom designed, Selenium based automated testing suite.
						</li>
						<li>
							Language/Software used: PHP, CSS, JavaScript, JQuery, Java, Swift, MySQL, GitHub versioning
						</li>
					</ul>
					<div class="col-6 offset-3"><a href="https://www.magillaloans.com" target="_blank" ><img class="job-image" src="mag.png"/></a></div>
				</div>
				
				<!-- second exp section -->
				<div class="col-12 row">
					<div class="col-6 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#seniorProjectExp" aria-expanded="false" aria-controls="seniorProjectExp"><i class="far fa-caret-square-down" style="color:#f7a8b8;"></i>Senior Project</a></div>
					<div class="col-4 font-weight-bold">Catalysis Group, Inc., Sacramento, CA</div>
					<div class="col-2 font-weight-bold">2017</div>
				</div>
				<div class="col-12 collapse" id="seniorProjectExp" aria-labelledby="seniorProjectExp" data-parent="#accordion">
					<ul>
						<li>
							Authored new symmetric key cipher block and GitHub repository using SCRUM methodology.
						</li>
						<li>
							Integrated automated testing suite and control flow graphs to verify code execution allowing for simplification of the software development cycle.
						</li>
						<li>
							Coordinated tasks and communication with group of five senior level students.
						</li>
						<li>
							Language/Software used: C, C++, Visual Studio, GitHub versioning
						</li>
					</ul>
					<div class="col-6 offset-3"><a href="https://www.csus.edu" target="_blank" ><img class="job-image" src="csus.png"/></a></div>
				</div>
				
				<!-- third exp section -->
				<div class="col-12 row">
					<div class="col-6 font-weight-bold">
						<a href="#" data-toggle="collapse" data-target="#internExp" aria-expanded="false" aria-controls="internExp"><i class="far fa-caret-square-down" style="color:#f7a8b8;"></i>Web Dev/Computer Systems Analyst Intern</a>
					</div>
					<div class="col-4 font-weight-bold">Black Diamond Data, Pittsburgh, CA</div>
					<div class="col-2 font-weight-bold">2014-2015</div>
				</div>
				<div class="col-12 collapse" id="internExp" aria-labelledby="internExp" data-parent="#accordion">
					<ul>
						<li>
							Increased social awareness and activism efforts against cybercriminals and stalkers by maintaining Alliance Against Cybercrime website and social media presence.
						</li>
						<li>
							Established a secure, city-wide Wi-Fi network for public use with interference collection techniques and testing industry standard security capabilities and protocols.
						</li>
						<li>
							Coordinated interactions with San Francisco Electronic Crimes Task Force.
						</li>
						<li>
							Language/Software used: HTML/PHP, CSS
						</li>
					</ul>
					<div class="row">
						<div class="col-6">
							<a href="https://www.facebook.com/Black-Diamond-Data-170883673004075/" target="_blank"><img class="job-image" src="bdd.png"/></a>
						</div>
						<div class="col-6">	
							<a href="https://www.facebook.com/allianceagainstcybercrime/" target="_blank"><img class="job-image" src="aac.png"/></a>
						</div>
					</div>
				</div>
				
				<!-- fourth exp section -->
				<div class="col-12 row">	
					<div class="col-6 font-weight-bold">
						<a href="#" data-toggle="collapse" data-target="#airForceExp" aria-expanded="false" aria-controls="airForceExp"><i class="far fa-caret-square-down" style="color:#f7a8b8;"></i>Airborne Cryptologic Linguist and Head of Security</a>
					</div>
					<div class="col-4 font-weight-bold">United States Air Force</div>
					<div class="col-2 font-weight-bold">2003-2010</div>
				</div>
				<div class="col-12 collapse" id="airForceExp" aria-labelledby="airForceExp" data-parent="#accordion">
					<ul>
						<li>
							Unified the physical, personnel, industrial, and information security standards while interacting with six national government intelligence agencies.
						</li>
						<li>
							Maintained on call support 24/7 for 18 months by simultaneously performing the duties of three security manager personnel of higher rank.
						</li>
						<li>Software used: Microsoft Access</li>
					</ul>
					<div class="col-6 offset-3"><a href="https://www.airforce.com" target="_blank" ><img class="job-image" src="usaf.png"/></a></div>
				</div>

			</div>
			<!-- end accordion -->
		</div>
		<!-- end experience section -->
		

		<!-- education section -->
		<div id="resume_education" class="row section_holder">
			<div class="col-12 font-weight-bold">EDUCATION</div>

			<div class="col-6 font-weight-bold">California State University</div>
			<div class="col-4 font-weight-bold">Sacramento, CA</div>
			<div class="col-2 font-weight-bold">2015-2017</div>
			<div class="col-12">
				<ul>
					<li>
						Bachelor of Science in Computer Science, GPA in major: 3.75
					</li>
					<li>
						Minor in Mathematics
					</li>
					<li>
						Coursework: Computer System Attacks and Countermeasures, Cryptography, Intelligent Systems, Linear Programming, and Probability Theory
					</li>
				</ul>
			</div>

			<div class="col-6 font-weight-bold">Contra Costa Community College</div>
			<div class="col-4 font-weight-bold">San Pablo, CA</div>
			<div class="col-2 font-weight-bold">2013-2015</div>
			<div class="col-12">
				<ul>
					<li>
						Major in Computer Science and Mathematics.
					</li>
				</ul>
			</div>		


			<div class="col-6 font-weight-bold">Community College of the Air Force</div>
			<div class="col-4 font-weight-bold">Okinawa, Japan</div>
			<div class="col-2 font-weight-bold">2003-2010</div>
			<div class="col-12">
				<ul>
					<li>
						Obtained Certificate in Communications Technology and Records Custody.
					</li>
				</ul>
			</div>

			<div class="col-6 font-weight-bold">Defense Language Institute</div>
			<div class="col-4 font-weight-bold">Monterey, CA</div>
			<div class="col-2 font-weight-bold">2003-2005</div>
			<div class="col-12">
				<ul>
					<li>
						Obtained Certificate for fluency in Mandarin Chinese.
					</li>
				</ul>
			</div>
		</div>
		<!-- end education section -->


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>