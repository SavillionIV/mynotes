<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

    <!-- =========================
         PAGE WRAPPER
    ========================== -->
    <div class="page-wrapper">

        <!-- =========================
             HEADER
        ========================== -->
        <header class="top-header">
            <div class="profile-preview">
                <div class="profile-image-box">
                    <span>Profile Image</span>
                </div>
            </div>

            <div class="welcome-area">
                <h1>Welcome, Saville Young IV</h1>
            </div>

            <div class="dashboard-link">
                <a href="#">My Profile (Dashboard)</a>
            </div>
        </header>

        <!-- =========================
             TOP NAVIGATION
        ========================== -->
        <nav class="top-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Messages <span class="notif">0</span></a></li>
                <li><a href="#">Stories</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Friends</a></li>
                <li><a href="#">Favorites</a></li>
                <li><a href="#">Merch</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>

        <!-- =========================
             MAIN CONTENT AREA
        ========================== -->
        <main class="main-layout">

            <!-- =========================
                 LEFT SIDEBAR
            ========================== -->
            <aside class="sidebar">

                <section class="sidebar-card">
                    <h2>Household Essentials</h2>
                    <div class="sidebar-content">
                        <div class="thumb-box"></div>
                        <div class="text-lines">
                            <p>Item 1</p>
                            <p>Item 2</p>
                            <p>Item 3</p>
                            <p>Item 4</p>
                        </div>
                    </div>
                </section>

                <section class="sidebar-card">
                    <h2>My Autobiography</h2>
                    <div class="sidebar-content">
                        <div class="thumb-box"></div>
                        <div class="text-lines">
                            <p>Chapter 1</p>
                            <p>Chapter 2</p>
                            <p>Chapter 3</p>
                        </div>
                    </div>
                </section>

                <section class="sidebar-card">
                    <h2>My Current Studies</h2>
                    <div class="sidebar-content">
                        <div class="thumb-box"></div>
                        <div class="text-lines">
                            <p>HTML</p>
                            <p>CSS</p>
                            <p>JavaScript</p>
                        </div>
                    </div>
                </section>

                <section class="sidebar-card">
                    <h2>Activities & More</h2>
                    <div class="sidebar-content">
                        <div class="thumb-box"></div>
                        <div class="text-lines">
                            <p>Camping</p>
                            <p>Drawing</p>
                            <p>Gaming</p>
                        </div>
                    </div>
                </section>

                <section class="sidebar-card">
                    <h2>Projects & Growth Plan</h2>
                    <div class="sidebar-content">
                        <div class="thumb-box"></div>
                        <div class="text-lines">
                            <p>Portfolio Site</p>
                            <p>Backend Practice</p>
                            <p>Database Setup</p>
                        </div>
                    </div>
                </section>

            </aside>

            <!-- =========================
                 MAIN DASHBOARD
            ========================== -->
            <section class="dashboard-grid">

                <div class="dashboard-card small-card">
                    <h2>Your Progress</h2>
                    <div class="card-body center-text">
                        <p class="big-text">Good Job!</p>
                    </div>
                </div>

                <div class="dashboard-card small-card">
                    <h2>Your Highlights</h2>
                    <div class="card-body">
                        <ul>
                            <li>Someone liked a photo</li>
                            <li>You completed a task</li>
                            <li>New message received</li>
                        </ul>
                    </div>
                </div>

                <div class="dashboard-card tall-card">
                    <h2>Ongoing Projects</h2>
                    <div class="card-body">
                        <ul>
                            <li>Build dashboard layout</li>
                            <li>Create login system</li>
                            <li>Connect database</li>
                        </ul>
                    </div>
                </div>

                <div class="dashboard-card tall-card">
                    <h2>Finished Projects</h2>
                    <div class="card-body">
                        <ul>
                            <li>Initial wireframe sketch</li>
                            <li>Page structure planning</li>
                        </ul>
                    </div>
                </div>

                <div class="dashboard-card medium-card">
                    <h2>Reminders</h2>
                    <div class="card-body">
                        <ul>
                            <li>Update profile</li>
                            <li>Add gallery images</li>
                            <li>Write notes</li>
                        </ul>
                    </div>
                </div>

                <div class="dashboard-card medium-card">
                    <h2>Your Notes</h2>
                    <div class="card-body">
                        <p>Add your notes here...</p>
                    </div>
                </div>

            </section>
        </main>

        <!-- =========================
             FOOTER
        ========================== -->
        <footer class="footer">
            <div class="footer-left">
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Terms & Conditions</a>
            </div>

            <div class="footer-center">
                <p>&copy; 2026</p>
            </div>

            <div class="footer-right">
                <a href="#">Jane Doe</a>
                <a href="#">John Doe</a>
                <a href="#">Start Chat</a>
            </div>
        </footer>

    </div>

</body>
</html>