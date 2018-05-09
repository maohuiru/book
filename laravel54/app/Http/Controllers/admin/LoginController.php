<?php  
 
namespace App\Http\Controllers\admin;  
  
use App\Http\Controllers\Controller; 
use App\Model\LoginModel;
use App\Model\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;
  
class LoginController extends Controller  
{  
	function __construct()
	{
        $this->Login=new LoginModel();// 实例化model
	}
   public function login()
   {

        return view('login/login');
   }
   public function validation()
   {

   	    $loginmodel = new LoginModel();
   		$tel = $_GET['admin_user_tel'];
   		$res = $loginmodel->select_one("admin_user","admin_user_tel",$tel);

   		if($res)
   		{
   			echo 1;//1代表手机号已经存在
   			die;
   		}
   		$code       = rand(1000,9999);
      $code_state = $this->telcode($tel,$code);//调用短信接口

        if ($code_state->code == 2) {
          $session = new Session();
          $session->set("code",$code);
            echo 3;//发送验证码成功
            exit;
        }else{
            echo 2;//发送验证码失败 提示系统繁忙
            exit;
        }
   		
   }
   public function add_user()
   {
      echo 111;die;
   }
   public function telcode($tel,$code)
   {
   		$account  = "C61710692";
        $apikey   = "a7483d88e73e502b23b64770791bcaba";
        $url      = "http://106.ihuyi.com/webservice/sms.php?method=Submit&account={$account}&password={$apikey}&mobile={$tel}&format=json&content=您的验证码是：{$code}。请不要把验证码泄露给其他人。";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $mess=curl_exec($ch);
        curl_close($ch);
        $messdata = json_decode($mess);

        return $messdata;
   }
   public function insert_user()
   {
       $data = Input::all();

       $login = new LoginModel();
       $name = $_GET['admin_user_name'];
       $res = $login->select_name("admin_user","admin_user_name",$name);
       $session = new Session();
       $id=$session->get('code');

       if($res)
       {
           echo '<script>alert("用户名已存在");location.href="'.'adminindex'.'";</script>';die;
       }
       if($id!=$data['Phone_Number'])
       {
           echo '<script>alert("验证码错误");location.href="'.'login'.'";</script>';die;
       }
       $res=$this->Login->insert($data);

       if($res){
           echo '<script>alert("注册成功");location.href="'.'adminindex'.'";</script>';
       }
       else
       {
           echo '<script>alert("注册失败");location.href="'.'login'.'";</script>';
       }
   }
   public function login_one()
   {
       $admin_user_name=Input::get('admin_user_name');
       $admin_user_pwd=Input::get('admin_user_pwd');
       $admin_user_pwd=md5($admin_user_pwd);
       $reg=$this->Login->login($admin_user_name,$admin_user_pwd);
           if ($reg)
           {
               echo '<script>alert("登录成功");location.href="'.'adminindex'.'";</script>';
           }
           else{
               echo '<script>alert("用户名或密码错误");location.href="'.'login'.'";</script>';
           }
   }
    public function homeindex_one()
    {
        return view("home/login");
    }
   public function user_show_a()
   {
        $data=$this->Login->show_a();
        $data=json_decode($data);
        // var_dump($data);die;
        return view('home/user_show',['data'=>$data]);
    }
    public function login_insert(){

        $this->Admin=new AdminModel();
        $home_user_name=Input::get('home_user_name');
        $home_user_password=Input::get('home_user_password');
        $home_user_password=md5($home_user_password);
        $reg=$this->Admin->one_login($home_user_name,$home_user_password);
        if ($reg)
        {
            $session = new Session();
            $session->set("home_user_id",$reg->home_user_id);
            echo '<script>alert("登录成功");location.href="'.'homeindex'.'";</script>';
        }
        else{
            echo '<script>alert("用户名或密码错误");location.href="'.'loginone'.'";</script>';
        }
    }




}  