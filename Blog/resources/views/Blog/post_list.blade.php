@extends('Blog/layouts/header_banner')
@section('content_contain')
		<section class="tada-container content-posts blog-1-column">
    
    
    	 <!-- CONTENT -->
    	<div class="content col-xs-12">
        
        
        	<!-- ARTICLE 1 -->
        	@foreach($data as $value)
        	<article>
            	<div class="post-image">
                	<img src="{{$value['thumbnail']}}" alt="post image 1">
                    <div class="category"><a href="#">IMG</a></div>
                </div>
                <div class="post-text">
                	<span class="date">{{$value['created_at']}}</span>
                    <h2><a href="#">{{$value['title']}}</a></h2>
                    <p class="text">{{$value['description']}}
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                    <div class="extra-info">
                    	<a href="#"><i class="icon-facebook5"></i></a>
                		<a href="#"><i class="icon-twitter4"></i></a>
                		<a href="#"><i class="icon-google-plus"></i></a>
                        <span class="comments">25 <i class="icon-bubble2"></i></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>
            @endforeach
        	<!--
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-1.jpg')}}" alt="post image 1">
                    <div class="category"><a href="#">IMG</a></div>
                </div>
                <div class="post-text">
                	<span class="date">07 Jun 2016</span>
                    <h2><a href="#">MAECENAS CONSECTETUR</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
									Nunc maximus arcu sit amet accumsan imperdiet. Aliquam elementum efficitur ipsum nec blandit. 
                                    Pellentesque posuere vitae metus sed auctor. Nullam accumsan fringilla ligula non pellentesque.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                    <div class="extra-info">
                    	<a href="#"><i class="icon-facebook5"></i></a>
                		<a href="#"><i class="icon-twitter4"></i></a>
                		<a href="#"><i class="icon-google-plus"></i></a>
                        <span class="comments">25 <i class="icon-bubble2"></i></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>
        
        
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-2.jpg')}}" alt="post image 2">
                    <div class="category"><a href="#">Travel</a></div>
                </div>
                <div class="post-text">
                	<span class="date">07 Jun 2016</span>
                    <h2><a href="#">MAECENAS CONSECTETUR</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
									Nunc maximus arcu sit amet accumsan imperdiet. Aliquam elementum efficitur ipsum nec blandit. 
                                    Pellentesque posuere vitae metus sed auctor. Nullam accumsan fringilla ligula non pellentesque.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                    <div class="extra-info">
                    	<a href="#"><i class="icon-facebook5"></i></a>
                		<a href="#"><i class="icon-twitter4"></i></a>
                		<a href="#"><i class="icon-google-plus"></i></a>
                        <span class="comments">25 <i class="icon-bubble2"></i></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>


        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-3.jpg')}}" alt="post image 3">
                    <div class="category"><a href="#">Business</a></div>
                </div>
                <div class="post-text">
                	<span class="date">07 Jun 2016</span>
                    <h2><a href="#">MAECENAS CONSECTETUR</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
									Nunc maximus arcu sit amet accumsan imperdiet. Aliquam elementum efficitur ipsum nec blandit. 
                                    Pellentesque posuere vitae metus sed auctor. Nullam accumsan fringilla ligula non pellentesque.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                    <div class="extra-info">
                    	<a href="#"><i class="icon-facebook5"></i></a>
                		<a href="#"><i class="icon-twitter4"></i></a>
                		<a href="#"><i class="icon-google-plus"></i></a>
                        <span class="comments">25 <i class="icon-bubble2"></i></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>
            
            
        	<article>
            	<div class="post-image">
                	<img src="{{asset('img/img-post-4.jpg')}}" alt="post image 4">
                    <div class="category"><a href="#">Technology</a></div>
                </div>
                <div class="post-text">
                	<span class="date">07 Jun 2016</span>
                    <h2><a href="#">MAECENAS CONSECTETUR</a></h2>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
									Nunc maximus arcu sit amet accumsan imperdiet. Aliquam elementum efficitur ipsum nec blandit. 
                                    Pellentesque posuere vitae metus sed auctor. Nullam accumsan fringilla ligula non pellentesque.
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">AD-Theme</a></div>
                    <div class="extra-info">
                    	<a href="#"><i class="icon-facebook5"></i></a>
                		<a href="#"><i class="icon-twitter4"></i></a>
                		<a href="#"><i class="icon-google-plus"></i></a>
                        <span class="comments">25 <i class="icon-bubble2"></i></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>            
        	-->
        	
        	<ul class="pagination">
        		<li><a href="?page={{$page-1}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a></li>
        		@for($i = 1; $i <= $number_page; $i++)
        		<li><a href="?page={{$i}}">{{$i}}</a></li>
        		@endfor
        		<li><a href="?page={{$page+1}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a></li>
        	</ul>
            
        
        </div>
        
   		<div class="clearfix"></div>
        
        
    </section>
@endsection