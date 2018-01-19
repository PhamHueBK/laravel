<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tada & Blog - Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon.png')}}"/>
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slippry.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="{{asset('css/font1.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('css/font2.css')}}" rel='stylesheet' type='text/css'>
	<link href="{{asset('css/font3.css')}}" rel='stylesheet' type='text/css'>
</head>

<body>

    
    <!-- *****************************************************************
    ** Preloader *********************************************************
    ****************************************************************** -->
    
	<div id="preloader-container">
    	<div id="preloader-wrap">
    		<div id="preloader"></div>
    	</div>
    </div>
    
    
    <!-- *****************************************************************
    ** Header ************************************************************ 
    ****************************************************************** --> 
        
    <header class="tada-container">
    
    
    	<!-- LOGO -->
    	<div class="logo-container">
        	<a href="{{url('/')}}"><img src="{{asset('img/logo.png')}}" alt="logo" ></a>
            <div class="tada-social">
            	<a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <a href="#"><i class="icon-vimeo4"></i></a>
                <a href="#"><i class="icon-linkedin2"></i></a>
            </div>
        </div>
    
    
    	<!-- MENU DESKTOP -->
    	<nav class="menu-desktop menu-sticky">
    
            <ul class="tada-menu">
                     <li><a href="{{url('/')}}">HOME <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="{{url('blog/home-1-column')}}">Home 1 Column</a></li>
                            <li><a href="{{url('/blog/blog-1-column_sidebar')}}">Home 1 Column + Sidebar</a></li>                            
                            <li><a href="{{url('/blog/home-2-columns-with-sidebar')}}">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>                                                                      
                        </ul>
                    </li>
                    <li><a href="#">FEATURES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>                            
                            <li><a href="post.html">Post Full Width</a></li>
                            <li><a href="post-with-right-sidebar.html">Post + Right Sidebar</a></li>
                            <li><a href="post-with-left-sidebar.html">Post + Left Sidebar</a></li>
                            <li><a href="no-sticky.html">No Sticky Menu</a></li>
                            <li><a href="no-slider.html">No Slider</a></li> 
                            <li><a href="#">Submenu <i class="icon-arrow-right8"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                    <li><a href="#">Item 4</a></li>
                                </ul>
                            </li>                                                                                            
                        </ul>                
                    </li>                                     
                    <li><a href="#" >BLOG <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="{{url('blog/blog-1-column')}}">Blog 1 Column</a></li>
                            <li><a href="blog-1-column-with-sidebar.html">Blog + Sidebar</a></li>                            
                            <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns + Sidebar</a></li>
                            <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                            <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>                                                                      
                        </ul>                
                    </li> 
                    <li><a href="{{url('/about')}}">ABOUT US</a></li>
                    <li><a href="{{url('/contact')}}" class="active">CONTACT</a></li>
            </ul>
        
        </nav>
        
        
        <!-- MENU MOBILE -->
        <div class="menu-responsive-container"> 
            <div class="open-menu-responsive">|||</div> 
            <div class="close-menu-responsive">|</div>              
            <div class="menu-responsive">   
                <ul class="tada-menu">
                     <li><a href="#">HOME <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="{{url('blog/blog-1-column')}}">Home 1 Column</a></li>
                            <li><a href="{{url('/blog/blog-1-column_sidebar')}}">Home 1 Column + Sidebar</a></li>                            
                            <li><a href="home-2-columns-with-sidebar.html">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>                                                                      
                        </ul>
                    </li>
                    <li><a href="#">FEATURES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>                            
                            <li><a href="post.html">Post Full Width</a></li>
                            <li><a href="post-with-right-sidebar.html">Post + Right Sidebar</a></li>
                            <li><a href="post-with-left-sidebar.html">Post + Left Sidebar</a></li>
                            <li><a href="no-sticky.html">No Sticky Menu</a></li>
                            <li><a href="no-slider.html">No Slider</a></li> 
                            <li><a href="#">Submenu <i class="icon-arrow-right8"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                    <li><a href="#">Item 4</a></li>
                                </ul>
                            </li>                                                                                            
                        </ul>                
                    </li>                                     
                    <li><a href="#" >BLOG <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="blog-1-column.html">Blog 1 Column</a></li>
                            <li><a href="blog-1-column-with-sidebar.html">Blog + Sidebar</a></li>                            
                            <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns + Sidebar</a></li>
                            <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                            <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>                                                                      
                        </ul>                
                    </li> 
                    <li><a href="{{url('/about')}}">ABOUT US</a></li>
                    <li><a href="{{url('/contact')}}" class="active">CONTACT</a></li>
                </ul>                        
            </div>
        </div> <!-- # menu responsive container -->
        
        
        <!-- SEARCH -->        
        <div class="tada-search">
			<form>
            	<div class="form-group-search">
              		<input type="search" class="search-field" placeholder="Search and hit enter...">
              		<button type="submit" class="search-btn"><i class="icon-search4"></i></button>
            	</div>
          	</form>
        </div>        
        @yield('slider')
        
    </header><!-- #HEADER -->

    
    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    
    @yield('content_contain')

    
    <!-- *****************************************************************
    ** Footer ************************************************************
    ****************************************************************** -->
        
    <footer class="tada-container">
    
    
    	<!-- INSTAGRAM -->
    	<div class="widget widget-gallery">
    		<h3 class="widget-title">INSTAGRAM</h3>
    		<div class="image">
            	<a href="#"><img src="{{asset('img/img-gallery-1.jpg')}}" alt="image gallery 1"></a>
                <a href="#"><img src="{{asset('img/img-gallery-2.jpg')}}" alt="image gallery 2"></a>
                <a href="#"><img src="{{asset('img/img-gallery-3.jpg')}}" alt="image gallery 3"></a>
                <a href="#"><img src="{{asset('img/img-gallery-4.jpg')}}" alt="image gallery 4"></a>
                <a href="#"><img src="{{asset('img/img-gallery-5.jpg')}}" alt="image gallery 5"></a>
                <a href="#"><img src="{{asset('img/img-gallery-6.jpg')}}" alt="image gallery 6"></a>
            </div>
            <div class="clearfix"></div>
    	</div>
        
        
        <!-- FOOTER BOTTOM -->        
        <div class="footer-bottom">
        	<span class="copyright">Theme Created by <a href="#">AD-Theme</a> Copyright © 2016. All Rights Reserved</span>
        	<span class="backtotop">TOP <i class="icon-arrow-up7"></i></span>
            <div class="clearfix"></div>
        </div>
        
        
    </footer>
    
    
    <!-- *****************************************************************
    ** Script ************************************************************
    ****************************************************************** -->
    	
	<script src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
	<script src="{{asset('js/slippry.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
