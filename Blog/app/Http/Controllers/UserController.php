<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Requests\UserRequest;
use Auth;
use Illuminate\Support\MessageBag;
use App\Post;
use App\User;
use DB;

class UserController extends Controller
{
    //
    public function getLogin(){
    	return view('Blog/user/login');
    }

    public function postLogin(Request $request) {
    	$rules = [
    		'email' =>'required|email',
    		'password' => 'required|min:6'
    	];
    	$messages = [
    		'email.required' => 'Email là trường bắt buộc',
    		'email.email' => 'Email không đúng định dạng',
    		'password.required' => 'Mật khẩu là trường bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$email = $request->input('email');
    		$password = $request->input('password');

    		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    			return redirect()->intended('/blog');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }

    public function register(){
    	return view('Blog/user/signup');
    }

    public function post_register(Request $request){
    	$user = array();
    	$user['name'] = $request->name;
    	$user['avatar'] = $request->file;
    	$user['email'] = $request->email;
    	$user['password'] = bcrypt($request->password);
    	$user['address'] = $request->address;
    	$user['mobile'] = $request->mobile;
    	$user['birthday'] = $request->birthday;
    	User::create($user);
      	return view('Blog/index');
    }

    public function upload_img(Request $request){

    	$duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
        $duoi = $duoi[(count($duoi)-1)];//lấy ra đuôi file
        //Kiểm tra xem có phải file ảnh không
        if($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif' || $duoi === 'jpeg'){
            //tiến hành upload
            $url = 'img/' . $_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'], $url)){
                //Nếu thành công
                echo $url;
            } else{ //nếu k thành công
                echo "Có lỗi"; //in ra thông báo
            }
        } else{ //nếu k phải file ảnh
            echo "File không phải ảnh"; //in ra thông báo
        }
    }

    public function profile(){
    	$post = DB::table('posts')->where('user_id', '=', Auth::user()->id)->get();
    	/*echo "<pre>";
    	print_r($post);
    	echo "</pre>";
    	echo count($post);
    	dd($post);*/
    	return view('Blog/user/profile', ['post' => $post]);
    }

    public function createPost(Request $req){
    	$data = new Post();
    	$data->title = $req->title;
    	$data->description = $req->description;
    	$data->content = $req->content;
    	$data->type = $req->type;
    	$data->status = 0;
    	$data->views = $req->view;
    	$data->user_id = Auth::user()->id;
    	$data = Post::create($data);
    	return $data;
    }

    public function logout(){
    	Auth::logout();
    	return view('Blog/index');
    }

    public function update(UserRequest $request){
    	$data = User::find($request->id);
    	$data->name = $request->name;
    	$data->address = $request->address;
    	$data->mobile = $request->mobile;
    	$data->email = $request->email;
    	$data->birthday = $request->birthday;
        $data->save();

        return response()->json($data);
    }
}
