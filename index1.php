<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Defines the character set so text displays correctly -->
    <meta charset="UTF-8">

    <!-- Makes the site responsive on phones, tablets, and smaller screens -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Text shown in the browser tab -->
    <title>Saville's Portfolio</title>

    <!-- Links this page to the external CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- =========================
         HEADER
         Main introduction area
    ========================== -->
    <header class="header">
        <h1>Saville's Portfolio</h1>
        <p class="subtitle">Build quietly. Learn deeply. Grow with purpose.</p>
    </header>

    <!-- =========================
         NAVBAR
         Main navigation links
         Note:
         These anchor links jump to sections
         with matching IDs on the same page.
    ========================== -->
    <nav class="navbar">
        <div class="nav-links">
            <!-- "Home" can point to the top of the page -->
            <a href="#">Home</a>

            <!-- These must match actual section IDs below -->
            <a href="#projects">Projects</a>
            <a href="#goals">Goals</a>
            <a href="#gallery">Gallery</a>
            <a href="#qa">Q&amp;A</a>
            <a href="#contact">Contact</a>
        </div>

        <!-- Search field for filtering project/goal items -->
        <div class="nav-search">
            <input
                type="search"
                id="searchInput"
                class="search"
                placeholder="Search goals or projects..."
            >
        </div>
    </nav>

    <!-- =========================
         MAIN CONTENT
         Holds the major sections of the page
    ========================== -->
    <main class="main">

        <!-- =========================
             ABOUT ME SECTION
        ========================== -->
        <section class="card aboutme">
            <!-- Profile image -->
            <img src="images/profile.png" alt="Profile picture of Saville">

            <h2>About Me</h2>
            <p>
                I was born in California and grew up in Utah. I moved around a lot,
                exploring much of the western United States, including Washington,
                Oregon, California, Idaho, Nevada, Utah, Montana, and Wyoming. To 
				pass the time, I would draw, write or getting hands on with anything 
				that kept me busy and out of trouble. I use to enjoy playing with 
				Bionicles and Legos to help with this. I also was a Boy Scout for 
				close to a decade, which is where I really developed my interest in 
				the outdoors and getting training in wilderness survival. 
            </p>

            <h2>Introduction</h2>
            <p>
                I’m someone who digs deeper than most. I don’t settle for surface-level answers—I want
                to understand how things really work, whether it’s human behavior, societal systems,
                survival strategies, or my own development.
            </p>

            <p>
                I’m grounded and self-aware. I know my limits, but I continue to push for growth where
                it matters. There’s a thoughtful intensity to how I analyze people and systems, and a
                solitude in how I approach the world—like I’m quietly laying the groundwork for something
                better.
            </p>

            <p>
                Whether it's preparing for a future family, building resilience, or seeking peace, I do
                it deliberately and on my own terms.
            </p>

            <p>
                You could call me a <strong>quiet builder</strong>—someone who sees the flaws in things
                but doesn’t give up on trying to fix what I can. Even when life stacks the odds
                financially, mentally, or socially, I recalibrate. I adapt. I keep going.
            </p>

            <p>
                In a world that prizes flash and speed, quiet builders often go unnoticed. But we build
                foundations that last.
            </p>
			
			<h2>Education</h2>
			<p>So, I went to a lot of different schools growing up. Which made it easy to make new friends, however, made it difficult to keep friends</p>
			
			<div class="edu">
				<h3>Oakridge Preschool (1998)</h3>
				<p>
				Located in Provo, Ut.
				</p>
				
				<p>
				I had learn the basics, nothing much to note here.
				</p>
			</div>
			
			<div class="edu">
				<h3>Sunset View Elementary</h3>
				<p>
				Located in Provo, Ut.
				</p>
				<p>
				Continuing to learn the basics, nothing much to note here. 
				</p>
			</div>
			
			<div class="edu">
				<h3>Greenwood Elementry</h3>
				<p>
				Located in American Fork, Ut. This is where I discovered that the classroom setting isn't exactly the best place for me to learn new things or try advancing my education.  
				</p>
			</div>
			
			<div class="edu">
				<h3>Park Elementary</h3>
				<p>
				Located in Spanish Fork, Ut. I didn't spend much time here, I didn't exactly learn much. 
				</p>
			</div>
			
			<div class="edu">
				<h3>Spanish Fork Middle School</h3>
				<p>
				Located in Spanish Fork, Ut. This is where I learned how to play the trumpet 
				</p>
			</div>
			
			<div class="edu">
				<h3>Fruita Middle School</h3>
				<p>
				Located in Fruita, Co. I continued in band class, got into woodworking, even tried learning how to fly in a simulater. 
				</p>
			</div>
			
			<div class="edu">
				<h3>Spanish Fork Jr. High</h3>
				<p>
				Located in Spanish Fork, Ut. I took classes like 
				</p>
			</div>
			
			<div class="edu">
				<h3>Spanish Fork High School</h3>
				<p>
				Located in Spanish Fork, Ut. I took classes such as Biology, Human Biology and Anatomy, Psychology, Auto Body, Small Engines, Welding, Theater, Chior 
				</p>
			</div>

			<div class="edu">
				<h3>Roy High School</h3>
				<p>
				Located in Roy, Ut. I took classes such as woodworking, health, 
				</p>
			</div>

			<div class="edu">
				<h3>Landmark High School</h3>
				<p>
				Located in Spanish Fork, Ut. This is where I graduated from high school. 
				</p>
			</div>

            <h2>Work History</h2>

            <p>
                I have more than 10 years of hands-on work experience in manufacturing, production, and
                warehouse environments. My background includes machine operation, assembly, packaging,
                forklift use, quality checks, and general labor. I’ve worked with companies such as
                Nestlé, Little Giant Ladder Systems, and Northern Gold Foods.
            </p>

            <div class="job">
                <h3>Elwood Staffing</h3>
                <p>
                    Performed various assignments including warehouse operations, packaging, order
                    picking, and general labor roles across multiple industries.
                </p>
            </div>

            <div class="job">
                <h3>Nestlé / Spherion</h3>
                <p>
                    Worked primarily as a General Laborer, with additional roles as a Palletizing
                    Operator, Automated Caser Operator, and Linen Room Attendant—supporting production,
                    sanitation, and logistics functions.
                </p>
            </div>

            <div class="job">
                <h3>Little Giant Ladder Systems</h3>
                <p>
                    Held the role of Pultrusionist, operating specialized machinery to produce fiberglass
                    railings for ladders. Responsibilities included machine setup, maintenance,
                    troubleshooting, and full breakdown and reassembly during repairs.
                </p>
            </div>

            <div class="job">
                <h3>Northern Gold Foods</h3>
                <p>
                    Employed as a Mixer, handling bulk ingredients, following food safety protocols, and
                    ensuring precise batch formulation for product consistency. I also worked in wrapping
                    and casing areas.
                </p>
            </div>

            <div class="job">
                <h3>Buy 2</h3>
                <p>
                    Worked as a Customer Service Representative, Fry Cook, Cashier, and Pump Attendant,
                    managing food prep, customer interactions, and front-line retail service.
                </p>
            </div>

            <div class="job">
                <h3>Pierce Fittings</h3>
                <p>
                    Served as an Assembler in the manufacturing department, with additional
                    responsibilities in the Galvanizing Department, handling coating and finishing
                    processes for metal parts.
                </p>
            </div>

            <div class="job">
                <h3>Express Employment</h3>
                <p>
                    Performed order picking, packaging, and general warehouse tasks for various
                    short-term industrial clients.
                </p>
            </div>

            <div class="job">
                <h3>Tony’s Window Cleaning</h3>
                <p>
                    Worked as a Lawn Care Specialist, performing tasks such as mowing, weeding, and leaf
                    removal. Also assisted in residential and commercial window cleaning.
                </p>
            </div>

            <p>
                <strong>Other Experience:</strong> I’ve also worked in call centers, restaurants, and
                construction—gaining broad exposure to hands-on environments, team collaboration, and
                problem-solving under pressure.
            </p>

            <h2>Skills and Talents</h2>
            <ul>
                <li>Machine Operation &amp; General Labor</li>
                <li>Forklift, Hand Tools, and Assembly</li>
                <li>Team Coordination &amp; Customer Service</li>
                <li>Basic Computer Operations</li>
                <li>Problem Solving &amp; Conflict Resolution</li>
                <li>Survival Training (Urban/Wilderness)</li>
                <li>Bilingual (Novice-level German &amp; Spanish)</li>
                <li>Auto Maintenance &amp; Repair</li>
            </ul>

            <h2>Fun Facts</h2>
            <ul>
                <li>I enjoy hiking, camping, and spending time outdoors whenever I get the chance.</li>
                <li>I like learning practical skills that improve both everyday life and long-term self-reliance.</li>
                <li>I’ve always been interested in how things work, from machines and systems to people and behavior.</li>
                <li>I enjoy solving problems, especially when the solution is clear, useful, and efficient.</li>
                <li>I collect trading cards and enjoy games that involve strategy, planning, and creative thinking.</li>
                <li>I tend to prefer building steady progress over chasing quick results.</li>
            </ul>

            <h2>Hobbies and Interests</h2>
            <p>
                Outside of work and programming, I enjoy hobbies that combine creativity, strategy,
                exploration, and personal growth. A lot of my interests reflect how I naturally think—I
                enjoy learning systems, solving problems, and exploring ideas in both practical and
                imaginative ways.
            </p>

            <p>
                I enjoy playing video games, watching movies and series, collecting trading cards,
                learning languages, and spending time outdoors. Some of these interests help me relax,
                while others help me stay curious and continue learning.
            </p>

            <p>
                <strong>Other things I find interesting include:</strong> paintball and airsoft.
            </p>

            <h3>Favorite Movies and Series</h3>
            <p>
                I enjoy stories with strong world-building, memorable characters, and a sense of
                adventure or deeper meaning.
            </p>
            <ul>
                <li>The Lord of the Rings / The Hobbit</li>
                <li>The MCU</li>
                <li>Star Trek</li>
					<p>My favorite series is Voyager and my favorite movie is Nemisis.</p>
            </ul>

            <h3>Favorite Games</h3>
            <p>
                I’m drawn to games that offer exploration, choice, strategy, and immersion. I especially
                enjoy games that let you build, adapt, or approach situations in different ways.
            </p>
            <ul>
                <li>Skyrim</li>
                <li>Fallout</li>
                <li>Fable</li>
                <li>The Lord of the Rings: The Third Age</li>
                <li>Minecraft</li>
            </ul>
			
			<h3>Collecting Coins, Metals and 

            <h3>Trading Card Collections</h3>
            <p>
                I primarily collect Yu-Gi-Oh!, Magic: The Gathering, and Pokémon. Collecting cards gives
                me a mix of nostalgia, strategy, organization, and appreciation for artwork and design.
            </p>
            <p>My collection is organized into four sections:</p>
            <ol>
                <li>Sealed product kept in its original packaging</li>
                <li>Binders for individual cards without duplicate copies</li>
                <li>A box of playable cards for visiting family and friends</li>
                <li>A box for trading or selling</li>
            </ol>

            <h3>Outdoor Interests</h3>
            <p>
                I also enjoy camping, hiking, and exploring the outdoors. Those experiences help me reconnect
                with simplicity, awareness, and peace of mind, while also strengthening my appreciation for
                preparedness, resilience, and self-reliance.
            </p>

            <h3>Creative and Personal Interests</h3>
            <p>
                Beyond entertainment and collecting, I enjoy learning languages, exploring new ideas, and working
                toward long-term creative and technical goals. Whether I’m studying programming, thinking through
                future projects, or improving practical life skills, I value growth that builds a stronger
                foundation over time.
            </p>
        </section>

        <!-- =========================
             GOALS SECTION
             Searchable items use .filter-item
        ========================== -->
        <section class="card" id="goals">
            <h2>My Goals</h2>

            <p>
                I’m working toward a life built on steady progress, practical skill, and long-term purpose.
                My goals are not only about learning how to program—they’re also about becoming more capable,
                more disciplined, and more prepared to build something meaningful for the future.
            </p>

            <ul class="goal-list">
                <li class="filter-item">Build strong skills in web development and software creation.</li>
                <li class="filter-item">Create websites, tools, and projects that reflect both function and creativity.</li>
                <li class="filter-item">Continue learning programming languages and technologies that open new opportunities.</li>
                <li class="filter-item">Learn how to build games and interactive digital experiences.</li>
                <li class="filter-item">Improve my discipline in budgeting, health, and daily habits.</li>
                <li class="filter-item">Strengthen communication through language learning and continued self-education.</li>
                <li class="filter-item">Build a more stable and independent future through practical growth.</li>
                <li class="filter-item">Turn knowledge into action by creating real projects instead of only studying ideas.</li>
                <li class="filter-item">Develop the mindset and foundation needed for business, leadership, and family life.</li>
                <li class="filter-item">Keep evolving into someone who can build, adapt, and endure through change.</li>
            </ul>
        </section>

        <!-- =========================
             PROJECTS SECTION
        ========================== -->
        <section class="card" id="projects">
            <h2>Projects and Growth Path</h2>

            <p class="filter-item">
                I am learning programming so I can build websites, games, and applications.
                I also enjoy learning languages and working toward bigger creative projects.
            </p>

            <p class="filter-item">
                I am working on programming lessons in HTML, CSS, JavaScript, PHP, and MySQL.
            </p>

            <p class="filter-item">
                I am also learning German and Spanish to improve communication and open more opportunities.
            </p>

            <p class="filter-item">
                Another long-term goal is building websites, interactive tools, and eventually games and software.
            </p>

            <h3>Skills and Talents I'm Interested In</h3>
            <ul>
                <li>Entrepreneurship / Small Business Management</li>
                <li>IT Support &amp; Digital Marketing</li>
                <li>Emergency Communications &amp; Logistics</li>
            </ul>

            <h3>Certifications, Permits, and Licenses I’m Interested In</h3>
            <p class="filter-item">
                As part of my long-term development, I’m exploring practical certifications, permits,
                and licenses that support safety, technical work, transportation, small business growth,
                and emergency preparedness.
            </p>

            <h4>Safety &amp; Emergency Preparedness</h4>
            <ul>
                <li class="filter-item">CPR / First Aid / AED</li>
                <li class="filter-item">OSHA 10 &amp; OSHA 30</li>
                <li class="filter-item">HAZWOPER (Hazardous Waste Operations)</li>
                <li class="filter-item">Wilderness First Responder</li>
                <li class="filter-item">Community Emergency Response Team (CERT – FEMA)</li>
                <li class="filter-item">Confined Space Entry</li>
                <li class="filter-item">Lockout/Tagout</li>
                <li class="filter-item">HAM Radio License (Technician Class)</li>
            </ul>

            <h4>Transport &amp; Industry</h4>
            <ul>
                <li class="filter-item">Forklift Operator Certification</li>
                <li class="filter-item">CDL (Commercial Driver's License)</li>
                <li class="filter-item">TWIC Card</li>
                <li class="filter-item">Basic Auto Repair / Diesel Engine Certification</li>
            </ul>

            <h4>Professional &amp; Technical</h4>
            <ul>
                <li class="filter-item">Lean Six Sigma (Yellow &amp; Green Belt)</li>
                <li class="filter-item">Google IT Support / Coursera Tech Certificates</li>
                <li class="filter-item">Digital Marketing (Google, HubSpot, Meta)</li>
                <li class="filter-item">Bookkeeping / QuickBooks</li>
                <li class="filter-item">Small Business Administration (SBA) Courses</li>
                <li class="filter-item">Trade Licenses: Landscaping, Lawncare, Window Cleaning</li>
                <li class="filter-item">Business License / EIN / Resale Certificate</li>
                <li class="filter-item">Food Handler’s Permit</li>
            </ul>
        </section>

		<!-- ========================================
			 GALLERY SECTION
			 Automatically displays images from images/gallery/
		========================================= -->
		<section class="card" id="gallery">
			<h2>Gallery</h2>
			<p>
				This section displays images from the <strong>images/gallery/</strong> folder.
				To add new gallery images, place them in that folder.
			</p>

			<div class="gallery-grid">
				<?php if (!empty($galleryImages)): ?>
					<?php foreach ($galleryImages as $image): ?>
						<div class="gallery-item">
							<img src="<?php echo htmlspecialchars($image); ?>" alt="Gallery image">
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p>No gallery images found yet. Add images to <strong>images/gallery/</strong>.</p>
				<?php endif; ?>
			</div>
		</section>

		<!-- ========================================
			 Q&A SECTION
			 Visitors can post questions/comments
			 and see previous submissions
		========================================= -->
		<section class="card" id="qa">
			<h2>Q&amp;A / Comment Section</h2>
			<p>
				Visitors can leave questions, thoughts, or comments here.
			</p>

			<?php if ($qaStatus === "success"): ?>
				<p class="status-message success-message">Your comment was posted successfully.</p>
			<?php elseif ($qaStatus === "empty"): ?>
				<p class="status-message error-message">Please fill out both name and comment.</p>
			<?php elseif ($qaStatus === "error"): ?>
				<p class="status-message error-message">Something went wrong while saving your comment.</p>
			<?php endif; ?>

			<form class="qa-form" id="qaForm" action="includes/qa_process.php" method="POST">
				<label for="qa_name">Name</label>
				<input
					type="text"
					id="qa_name"
					name="qa_name"
					placeholder="Enter your name"
				>

				<label for="qa_question">Question or Comment</label>
				<textarea
					id="qa_question"
					name="qa_question"
					rows="5"
					placeholder="Write your question or comment here"
				></textarea>

				<button type="submit">Post Comment</button>
			</form>

			<div class="comment-list">
				<h3>Recent Comments</h3>

				<?php if (!empty($qaComments)): ?>
					<?php foreach ($qaComments as $comment): ?>
						<div class="comment-card">
							<h4><?php echo htmlspecialchars($comment["name"]); ?></h4>
							<p><?php echo nl2br(htmlspecialchars($comment["question"])); ?></p>
							<small>
								Posted on:
								<?php echo htmlspecialchars($comment["created_at"]); ?>
							</small>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<p>No comments yet. Be the first to post one.</p>
				<?php endif; ?>
			</div>
		</section>

	<!-- ========================================
		 CONTACT FORM
		 Sends messages into the database
	========================================= -->
	<section class="card contact" id="contact">
		<h2>Contact Me</h2>

		<?php if ($contactStatus === "success"): ?>
			<p class="status-message success-message">Your message was sent successfully.</p>
		<?php elseif ($contactStatus === "empty"): ?>
			<p class="status-message error-message">Please fill out all fields.</p>
		<?php elseif ($contactStatus === "invalid_email"): ?>
			<p class="status-message error-message">Please enter a valid email address.</p>
		<?php elseif ($contactStatus === "error"): ?>
			<p class="status-message error-message">Something went wrong while sending your message.</p>
		<?php endif; ?>

		<form id="contactForm" action="includes/contact_process.php" method="POST">
			<label for="name">Name</label>
			<input
				type="text"
				id="name"
				name="name"
				placeholder="Enter your name"
			>

			<label for="email">Email</label>
			<input
				type="email"
				id="email"
				name="email"
				placeholder="Enter your email"
			>

			<label for="message">Message</label>
			<textarea
				id="message"
				name="message"
				rows="5"
				placeholder="Write your message here"
			></textarea>

			<button type="submit">Submit</button>
		</form>
	</section>

    </main>

    <!-- =========================
         FOOTER
    ========================== -->
    <footer class="footer">
        <p>&copy; 2026 Saville's Website</p>
    </footer>

    <!-- Links to the external JavaScript file -->
    <script src="script.js"></script>
</body>
</html>