@extends('Blog/layouts/header_banner')
@section('content_contain')
		<section class="tada-container content-posts blog-1-column">
    
    
    	 <!-- CONTENT -->
    	<div class="content col-xs-12">
        
        
        	<!-- ARTICLE 1 -->
        	@foreach($data as $value)
        	<article>
            	<div class="post-image">
                	<img src="{{$value->thumbnail}}" alt="post image 1">
                    <div class="category"><a href="#">IMG</a></div>
                </div>
                <div class="post-text">
                	<span class="date">{{$value->created_at}}</span>
                    <h2><a href="{{url('blog/detail?id='.$value->id)}}">{{$value->title}}</a></h2>
                    <p class="text">{{$value->description}}
                                    <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
                </div>
                <div class="post-info">
                	<div class="post-by">Post By <a href="#">{{$value->author}}</a></div>
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
        	
        	<center>
	        	<ul class="pagination">
	        		<li><a href="?page={{$page-1}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a></li>
	        		
	        		@for($i = 1; $i <= $number_page; $i++)
	        		<li><a href="?page={{$i}}">{{$i}}</a></li>
	        		@endfor
	        		<li><a href="?page={{$page+1}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a></li>
	        	</ul>
            </center>
        
        </div>
        
   		<div class="clearfix"></div>
        
        
    </section>
@endsection