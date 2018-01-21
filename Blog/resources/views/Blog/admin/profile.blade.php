@extends('Blog/layouts/header_banner')
@section('content_contain')

		
	<section class="tada-container content-posts post sidebar-left">
        
        
        <!-- SIDEBAR -->
        <div class="sidebar col-xs-4">
        	
            
            <!-- ABOUT ME -->                  
            <div class="widget about-me">
            	<div class="ab-image">
                	<img src="{{asset('img/'.Auth::user()->avatar)}}" width="100%" alt="about me">
                    <div class="ab-title" id="user_name">{{Auth::user()->name}}</div>
                </div>
                <div class="ad-text" id="profile_show">
                	<p id="user_address">Address: {{Auth::user()->address}}</p>
                	<p id="user_mobile">Mobile: {{Auth::user()->mobile}}</p>
                	<p id="user_birthday">Birthday: {{Auth::user()->birthday}}</p>
                    <span class="signing"><!--<img src="img/signing.png" alt="signing">--><a style="cursor:pointer" class="editProfile">Edit</a></span>
                </div>
            </div>


            <!-- LATEST POSTS -->                              
            <div class="widget latest-posts">
            	<h3 class="widget-title">
                	Latest Posts
                </h3>
                <div class="posts-container">
                
                	<div class="item">
                    	<img src="img/latest-posts-1.jpg" alt="post 1" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">MAECENAS <br> CONSECTETUR</a></h5>
                        	<span class="date">07 JUNE 2016</span>	
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                	<div class="item">
                    	<img src="img/latest-posts-2.jpg" alt="post 2" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">MAURIS SIT AMET</a></h5>
                        	<span class="date">06 JUNE 2016</span>                       	
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                	<div class="item">
                    	<img src="img/latest-posts-3.jpg" alt="post 3" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">NAM EGET <br> PULVINAR ANTE</a></h5>
                        	<span class="date">05 JUNE 2016</span>                        	
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                	<div class="item">
                    	<img src="img/latest-posts-1.jpg" alt="post 4" class="post-image">
                        <div class="info-post">
                        	<h5><a href="#">VIVAMUS ET TURPIS LACINIA</a></h5>
                        	<span class="date">04 JUNE 2016</span>                     	
                        </div>    
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>


            <!-- FOLLOW US -->                              
            <div class="widget follow-us">
            	<h3 class="widget-title">
                	Follow Us
                </h3>
            	<div class="follow-container">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>                
                </div>
            	<div class="clearfix"></div>
            </div>            


            <!-- TAGS -->                              
            <div class="widget tags">
            	<h3 class="widget-title">
                	Tags
                </h3>
            	<div class="tags-container">
                    <a href="#">Audio</a>
                    <a href="#">Travel</a>
                    <a href="#">Food</a>
                    <a href="#">Event</a>
                    <a href="#">Wordpress</a>
                    <a href="#">Video</a>
                    <a href="#">Design</a>
                    <a href="#">Sport</a>
                    <a href="#">Blog</a>
                    <a href="#">Post</a> 
                    <a href="#">Img</a>
                    <a href="#">Masonry</a>                                    
                </div>
            	<div class="clearfix"></div>
            </div> 


            <!-- ADVERTISING -->                              
            <div class="widget advertising">
				<div class="advertising-container">
                	<img src="img/350x300.png" alt="banner 350x300">
                </div>
			</div>


            <!-- NEWSLETTER -->                              
            <div class="widget newsletter">
            	<h3 class="widget-title">
                	Newsletter
                </h3>
            	<div class="newsletter-container">
					<h4>DO NOT MISS OUR NEWS</h4>
                    <p>Sign up and receive the <br> latest news of our company</p> 
                    <form>
                       <input type="email" class="newsletter-email" placeholder="Your email address...">
                       <button type="submit" class="newsletter-btn">Send</button>
                  	</form>                                  
                </div>
            	<div class="clearfix"></div>
            </div>  
            
        </div> <!-- #SIDEBAR -->


    	<!-- CONTENT -->    
    	<div class="content col-xs-8">
        	

        	
        	<!-- ARTICLE 1 -->
        	<article>
        		@foreach($post as $value)
            	<div class="post-image">
                	<img src="{{$value->thumbnail}}" alt="post image 1"> 
                </div>
                <div class="category">
                	<a href="#">IMG</a>
                </div>
                <div class="post-text">
                	<span class="date">{{$value->created_at}}</span>
                    <h2>{{$value->title}}</h2>
                </div>                 
                <div class="post-text text-content">
                	<div class="post-by">Post By <a href="#">{{Auth::user()->name}}</a></div>                    
                	<div class="text">
                	<p>{{$value->description}}</p>
                	<p>{{$value->content}}</p>
                    
                    <div class="clearfix"></div>
                    </div>
                </div>
                <div class="social-post">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>                  
                </div>
                
            	@endforeach
        		
            
            
       	 	</article>
        
        </div>
        
   		<div class="clearfix"></div>
        
        
    </section>
    <!-- Modal -->
	<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Edit my profile</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		        		<form action="" method="POST" class="form-horizontal" role="form">
	        		 		<div class="form-group">
        		 				<input type="hidden" name="_token" value="{{csrf_token()}}">
        		 			</div>
        		 			<div class="form-group">
        		 				<label>Name</label>
        		 				<input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="{{Auth::user()->name}}">
        		 			</div>
	        		 		<div class="form-group">
        		 				<label>Email</label>
        		 				<input type="email" class="form-control" id="email" name="email" placeholder="Your email" value="{{Auth::user()->email}}">
        		 			</div>
        		 			<div class="form-group">
        		 				<label>Mobile</label>
        		 				<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your mobile" value="{{Auth::user()->mobile}}">
        		 			</div>
        		 			<div class="form-group">
        		 				<label>Address</label>
        		 				<input type="text" class="form-control" id="address" name="address" placeholder="Your address" value="{{Auth::user()->address}}">
        		 			</div>
        		 			<div class="form-group">
        		 				<label>Birthday</label>
        		 				<input type="date" class="form-control" id="birthday" name="birthday" value="{{Auth::user()->birthday}}">
        		 			</div>
		        		 </form> 
		        	</div>
		      	</div>
		    	<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" id="saveProfile" class="btn btn-primary">Save changes</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="newPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Edit my profile</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		        		<form action="" method="POST" class="form-horizontal" role="form">
	        		 		<div class="form-group">
        		 				<input type="hidden" name="_token" value="{{csrf_token()}}">
        		 			</div>
        		 			<div class="form-group">
        		 				<label>Title</label>
        		 				<input type="text" class="form-control" id="title" name="title" placeholder="Title">
        		 			</div>
	        		 		<div class="form-group">
        		 				<label>Desciption</label>
        		 				<input type="text" class="form-control" id="description" name="description">
        		 			</div>
        		 			<div class="form-group">
        		 				<label>Content</label>
        		 				<input type="text" class="form-control" id="content" name="content">
        		 			</div>
    		 				<div class="form-group">
    		 					<label for="input" class="control-label">Type</label>
    		 					<div>
    		 						<select name="type" id="type" class="form-control" required="required">
    		 							<option value="0">Truyện ngắn</option>
    		 							<option value="1">Truyện blog</option>
    		 							<option value="2">Tâm sự</option>
    		 							<option value="3">Yêu</option>
    		 							<option value="4">Sống</option>
    		 							<option value="5">Gia đình</option>
    		 							<option value="6">Bạn bè</option>
    		 							<option value="7">Tản mạn</option>
    		 							<option value="8">Phóng sự</option>
    		 						</select>
    		 					</div>
    		 				</div>
		        		 </form> 
		        	</div>
		      	</div>
		    	<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" id="createPost" class="btn btn-primary">Save changes</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	
	<script language="javascript" src="{{asset('js/app.js')}}"></script>
	<script language="javascript" src="{{asset('js/newPost.js')}}"></script>
	<script language="javascript" src="{{asset('js/profile.js')}}"></script>
@endsection