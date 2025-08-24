<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #3498db;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --sidebar-width: 250px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color), #1a2530);
            color: white;
            z-index: 1000;
            transition: all 0.3s;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-brand {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        
        .sidebar-brand h4 {
            margin: 0;
            font-weight: 700;
        }
        
        .sidebar-nav {
            padding: 15px 0;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 2px 10px;
            border-radius: 6px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .submenu {
            padding-left: 30px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        .submenu.show {
            max-height: 500px;
        }
        
        .submenu-link {
            padding: 10px 15px;
            color: rgba(255, 255, 255, 0.7);
            display: block;
            border-radius: 4px;
            transition: all 0.2s;
            font-size: 14px;
        }
        
        .submenu-link:hover, .submenu-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.08);
        }
        
        .submenu-link i {
            font-size: 12px;
            margin-right: 8px;
        }
        
        .menu-arrow {
            transition: transform 0.3s;
        }
        
        .menu-arrow.rotated {
            transform: rotate(90deg);
        }
        
        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }
        
        .header {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .welcome-text h2 {
            margin: 0;
            font-size: 24px;
            color: var(--dark-text);
        }
        
        .welcome-text p {
            margin: 5px 0 0;
            color: #6c757d;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
        }
        
        .user-info {
            margin-right: 15px;
            text-align: right;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--dark-text);
        }
        
        .user-role {
            font-size: 13px;
            color: #6c757d;
        }
        
        /* Dashboard Cards */
        .dashboard-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            border-left: 4px solid var(--secondary-color);
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
            background: rgba(231, 76, 60, 0.1);
            color: var(--secondary-color);
        }
        
        .card-value {
            font-size: 28px;
            font-weight: 700;
            margin: 10px 0;
            color: var(--dark-text);
        }
        
        .card-title {
            color: #6c757d;
            font-size: 14px;
            margin: 0;
        }
        
        /* Stats Section */
        .stats-row {
            margin-bottom: 20px;
        }
        
        /* Activity Feed */
        .activity-feed {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            background: rgba(52, 152, 219, 0.1);
            color: var(--accent-color);
        }
        
        .activity-content {
            flex-grow: 1;
        }
        
        .activity-title {
            font-weight: 600;
            margin: 0 0 5px;
            color: var(--dark-text);
        }
        
        .activity-time {
            font-size: 12px;
            color: #6c757d;
        }
        
        /* Quick Stats */
        .quick-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .stat-item {
            text-align: center;
            flex: 1;
        }
        
        .stat-value {
            font-size: 18px;
            font-weight: 700;
            color: var(--secondary-color);
        }
        
        .stat-label {
            font-size: 12px;
            color: #6c757d;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                text-align: center;
            }
            
            .sidebar-brand h4, .nav-link span, .submenu {
                display: none;
            }
            
            .nav-link i {
                margin-right: 0;
                font-size: 20px;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class="fas fa-home"></i> <span>Roofing Admin</span></h4>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="" class="nav-link active">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div>
                        <i class="fas fa-cog"></i>
                        <span>General</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link" id="posts-menu">
                    <div>
                        <i class="fas fa-newspaper"></i>
                        <span>Posts</span>
                    </div>
                    <i class="fas fa-chevron-right menu-arrow"></i>
                </a>
                <div class="submenu" id="posts-submenu">
                    <a href="#" class="submenu-link">
                        <i class="fas fa-bars"></i>
                        All Posts
                    </a>
                    <a href="#" class="submenu-link">
                        <i class="fas fa-plus"></i>
                        Add New
                    </a>
                    <a href="#" class="submenu-link">
                        <i class="fas fa-tags"></i>
                        Categories
                    </a>
                </div>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div>
                        <i class="fas fa-file-alt"></i>
                        <span>Form Submissions</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link" id="projects-menu">
                    <div>
                        <i class="fas fa-building"></i>
                        <span>Projects</span>
                    </div>
                    <i class="fas fa-chevron-right menu-arrow"></i>
                </a>
                <div class="submenu" id="projects-submenu">
                    <a href="#" class="submenu-link">
                        <i class="fas fa-home"></i>
                        Residential Projects
                    </a>
                    <a href="#" class="submenu-link">
                        <i class="fas fa-city"></i>
                        Commercial Projects
                    </a>
                </div>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div>
                        <i class="fas fa-star"></i>
                        <span>Features</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div>
                        <i class="fas fa-handshake"></i>
                        <span>Partners</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <div>
                        <i class="fas fa-sliders-h"></i>
                        <span>Site Settings</span>
                    </div>
                </a>
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST" id="logout-form">
                    @csrf
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div>
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log Out</span>
                        </div>
                    </a>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="welcome-text">
                <h2>Welcome, Admin Dashboard</h2>
                <p>Welcome back, {{ Auth::guard('admin')->user()->name }}!</p>
            </div>
            <div class="user-menu">
                <div class="user-info">
                    <div class="user-name">{{ Auth::guard('admin')->user()->name }}</div>
                    <div class="user-role">Administrator</div>
                </div>
                <div class="user-avatar">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('admin')->user()->name) }}&background=2c3e50&color=fff" width="40" height="40" class="rounded-circle">
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row stats-row">
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="card-value">24</div>
                    <p class="card-title">New Quote Requests</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-value">18</div>
                    <p class="card-title">Active Projects</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="card-value">12</div>
                    <p class="card-title">New Messages</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="card-value">7</div>
                    <p class="card-title">Upcoming Appointments</p>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-8">
                <div class="dashboard-card">
                    <h4>Recent Activity</h4>
                    <ul class="activity-feed">
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="activity-content">
                                <h5 class="activity-title">New Blog Post</h5>
                                <p>"5 Signs You Need a Roof Replacement" was published</p>
                                <div class="activity-time">2 hours ago</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="activity-content">
                                <h5 class="activity-title">Residential Project Added</h5>
                                <p>Maple Street roof repair project was completed</p>
                                <div class="activity-time">5 hours ago</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="activity-content">
                                <h5 class="activity-title">New Testimonial</h5>
                                <p>Sarah Johnson left a 5-star review for recent work</p>
                                <div class="activity-time">Yesterday</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <div class="activity-content">
                                <h5 class="activity-title">Category Updated</h5>
                                <p>"Commercial Roofing" category was modified</p>
                                <div class="activity-time">2 days ago</div>
                            </div>
                        </li>
                    </ul>
                    
                    <div class="quick-stats">
                        <div class="stat-item">
                            <div class="stat-value">45</div>
                            <div class="stat-label">Total Posts</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">32</div>
                            <div class="stat-label">Residential Projects</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">18</div>
                            <div class="stat-label">Commercial Projects</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card">
                    <h4>Content Overview</h4>
                    <div class="mb-3">
                        <h6><i class="fas fa-newspaper me-2"></i>Posts</h6>
                        <div class="ps-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Published</span>
                                <span class="fw-bold">32</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span>Drafts</span>
                                <span class="fw-bold">5</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Categories</span>
                                <span class="fw-bold">8</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6><i class="fas fa-building me-2"></i>Projects</h6>
                        <div class="ps-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Residential</span>
                                <span class="fw-bold">32</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Commercial</span>
                                <span class="fw-bold">18</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>Quick Actions</h5>
                        <button class="btn btn-primary btn-sm me-2 mb-2">
                            <i class="fas fa-plus"></i> New Post
                        </button>
                        <button class="btn btn-outline-primary btn-sm me-2 mb-2">
                            <i class="fas fa-home"></i> Add Project
                        </button>
                        <button class="btn btn-outline-primary btn-sm mb-2">
                            <i class="fas fa-tags"></i> Manage Categories
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle submenus
        document.getElementById('posts-menu').addEventListener('click', function(e) {
            e.preventDefault();
            this.querySelector('.menu-arrow').classList.toggle('rotated');
            document.getElementById('posts-submenu').classList.toggle('show');
        });
        
        document.getElementById('projects-menu').addEventListener('click', function(e) {
            e.preventDefault();
            this.querySelector('.menu-arrow').classList.toggle('rotated');
            document.getElementById('projects-submenu').classList.toggle('show');
        });
        
        // Simple example of adding active class on click
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (!this.querySelector('.menu-arrow')) {
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });
        
        document.querySelectorAll('.submenu-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.submenu-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>