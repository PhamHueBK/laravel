@extends('Blog/layouts/header_banner')
@section('slider')
	<!-- SLIDER -->
        <div class="tada-slider">
			<ul id="tada-slider">
				<li>
                	<img src="{{asset('img/image-slider-1.jpg')}}" alt="image slider 1">
                	<div class="pattern"></div>
                	<div class="tada-text-container">
                    	<h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
				<li>
                	<img src="{{asset('img/image-slider-2.jpg')}}" alt="image slider 2">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                    	<h1>MAECENAS CONSECTETUR</h1>
                        <h2>Lorem <span class="main-color">ipsum dolor</span> sit amet</h2>
                        <span class="button"><a href="#">READ ME</a></span>
                    </div>
                </li>
				<li>
                	<img src="{{asset('img/image-slider-3.jpg')}}" alt="image slider 3">
                	<div class="pattern"></div>
                    <div class="tada-text-container">
                    	<h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>                
                </li>
                <li>
                	<img src="{{asset('img/image-slider-4.jpg')}}" alt="image slider 4">
                	<div class="pattern"></div>
                    <div class="tada-text-container">
                    	<h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>                
                </li>
			</ul>
            
        </div><!-- #SLIDER -->
@endsection
@section('content_contain')
		    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    
	<section class="tada-container content-posts blog-2-columns">
    
    	
        <!-- CONTENT COL 1 -->
    	<div class="content col-xs-6">
        
        
        	<!-- ARTICLE 1 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-1.jpg')}}" alt="post image 1">
                    <div class="category"><a href="#">IMG</a></div>
                </div>
                <div class="post-text">
                	<span class="date">07 Jun 2016</span>
                    <h2><a href="#">MAECENAS CONSECTETUR</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>
        
        
       </div>
       
       <div class="content col-xs-6"> 
        
        
        	<!-- ARTICLE 2 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-2.jpg')}}" alt="post image 2">
                    <div class="category"><a href="#">Travel</a></div>
                </div>
                <div class="post-text">
                	<span class="date">06 Jun 2016</span>
                    <h2><a href="#">MAURIS SIT AMET</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>
        
        
        </div>

        <div class="content col-xs-6 clearfix">


        	<!-- ARTICLE 3 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-3.jpg')}}" alt="post image 3">
                    <div class="category"><a href="#">Business</a></div>
                </div>
                <div class="post-text">
                	<span class="date">05 Jun 2016</span>
                    <h2><a href="#">NAM EGET PULVINAR ANTE</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>
       
       
       </div>
       
       <div class="content col-xs-6">
       
            
        	<!-- ARTICLE 4 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-4.jpg')}}" alt="post image 4">
                    <div class="category"><a href="#">Technology</a></div>
                </div>
                <div class="post-text">
                	<span class="date">04 Jun 2016</span>
                    <h2><a href="#">VIVAMUS ET TURPIS LACINIA</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                   <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>
        
        
        </div>
   
        <div class="content col-xs-6 clearfix">
        
        
        	<!-- ARTICLE 5 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-5.jpg')}}" alt="post image 5">
                    <div class="category"><a href="#">IMG</a></div>
                </div>
                <div class="post-text">
                	<span class="date">03 Jun 2016</span>
                    <h2><a href="#">TINCIDUNT SIT ULTRICIES AMET</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>

        </div>
        
        <div class="content col-xs-6">
        
        
        	<!-- ARTICLE 6 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-6.jpg')}}" alt="post image 6">
                    <div class="category"><a href="#">Travel</a></div>
                </div>
                <div class="post-text">
                	<span class="date">02 Jun 2016</span>
                    <h2><a href="#">DUIS FACILISIS AUGUE VITAE</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                   <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>
            
            
        </div>   
        
        <div class="content col-xs-6 clearfix">


        	<!-- ARTICLE 7 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-7.jpg')}}" alt="post image 7">
                    <div class="category"><a href="#">Business</a></div>
                </div>
                <div class="post-text">
                	<span class="date">01 Jun 2016</span>
                    <h2><a href="#">TELLUS QUIS IPSUM VARIUS</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                   <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>


        </div>
        
        <div class="content col-xs-6">

            
        	<!-- ARTICLE 8 -->
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-8.jpg')}}" alt="post image 8">
                    <div class="category"><a href="#">Technology</a></div>
                </div>
                <div class="post-text">
                	<span class="date">01 Jun 2016</span>
                    <h2><a href="#">SED FINIBUS LACUS UT ULTRICES</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                                   <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>            
   
   
        </div>
        
   		<div class="clearfix"></div>
   
   
        <!-- NAVIGATION -->
        <div class="navigation">
            	<a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
                <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>
        </div>  
              
                  
    </section>
@endsection