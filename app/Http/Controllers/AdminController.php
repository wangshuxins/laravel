<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Validator;

use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$admin_name = Request()->admin_name;
        
		$where = [];

		if(!empty($admin_name)){
		
		$where[] = ['admin_name','like',"%$admin_name%"];
		}
		$pageSize = config('app.pageSize');

        $admin = Admin::where($where)->orderBy('admin_id','desc')->paginate($pageSize);

		if(Request()->ajax()){
		
		return view('admin.adminajax',compact('admin','admin_name'));
		
		}

        return view('admin.admin',compact('admin','admin_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');

		$validator = Validator::make($post,[
			'admin_name' => 'regex:/^[\x{4e00-\x{9fa5}\w]{2,18}$/u|unique:admin',
			
			'admin_pwd' => 'regex:/^[0-9a-zA-Z]{6,12}$/',
			'admin_pwds' => 'required|same:admin_pwd',
			
		
		],[
			
			'admin_name.unique'=>'管理员名称已存在',
			'admin_name.regex'=>'管理员名称可以包含中文，字母，下划线，长度范围2-18位',
			'admin_pwd.regex'=>'管理员密码6-12位',
			'admin_pwds.required'=>'确认密码不能为空',
			'admin_pwds.same'=>'确认密码和密码保持一致',
			
		]);
		if($validator->fails()){
		return redirect('/admin/create')
			->withErrors($validator)
			->withInput();

		
		}

		$admin = new Admin();
        
		 
        
		$post['admin_pwd'] = encrypt($post['admin_pwd']);

		foreach($post as $k=>$v){
         
	    if($k=='admin_pwds'){

		   unset($post['admin_pwds']);

		   }
		}

		$arr = $admin->insert($post);

		 if($arr){
		 
		 return redirect('/admin');

		 }
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$arr = Admin::find($id);

        $arr['admin_pwd'] = decrypt($arr['admin_pwd']);

        return view('admin.edit',compact('arr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $post = $request->except('_token');

       $validator = Validator::make($post,[

			'admin_name' => ['regex:/[\x{4e00-\x{9fa5}\w]{2,60}/u',
		     Rule::unique('admin')->ignore(request()->id,'admin_id')
		     ],
			'admin_pwd' => 'regex:/^[0-9a-zA-Z]{6,12}$/',
			'admin_pwds' => 'required|same:admin_pwd',
			
		
		],[
			
			'admin_name.unique'=>'管理员名称已存在',
			'admin_name.regex'=>'管理员名称可以包含中文，字母，下划线，长度范围2-18位',
			'admin_pwd.regex'=>'管理员密码6-12位',
			'admin_pwds.required'=>'确认密码不能为空',
			'admin_pwds.same'=>'确认密码和密码保持一致',
			
		]);
		if($validator->fails()){
		return redirect('/admin/create')
			->withErrors($validator)
			->withInput();

		
		}

		
		$post['admin_pwd'] = encrypt($post['admin_pwd']);

		foreach($post as $k=>$v){
         
	    if($k=='admin_pwds'){

		   unset($post['admin_pwds']);

		   }
		}

		$arr = Admin::where('admin_id',$id)->update($post);

		 if($arr!==false){
		 
		 return redirect('/admin');

		 } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Admin::destroy($id);
        //dd($res);
		if($res){
		
		 echo json_encode(['code'=>'0','msg'=>'删除成功']);exit;

		}
    }

	public function checkname(){
	
	$admin_name = Request()->admin_name;
	
	$count = Admin::where('admin_name',$admin_name)->count();
	echo $count;
	
	}

	public function updatename(){
	
	$admin_name = Request()->admin_name;

    $admin_id = Request()->admin_id;

    $where = [];

	$where[] = ['admin_name','=',$admin_name];

	$where[] = ['admin_id','<>',$admin_id];


	
	$count = Admin::where($where)->count();
	echo $count;
	
	}

	 //删除 批量删除
	            public function alldel(){

                  $admin_id = Request()->input('admin_id');

	              $str = explode(",",$admin_id);

	              

                    $ret = Admin::whereIn('admin_id',$str)->delete();

                  

                   //dump(db::getLastSql());exit;

                    if($ret!==false){

                        echo json_encode(['error_no'=>'0','error_msg'=>'删除成功']);exit;

                       }else{

                        echo json_encode(['error_no'=>'1','error_msg'=>'删除失败']);exit;
                    }
                 }
			//即点即改
			public function point(){
			
			$name = Request()->td;

			//echo $name;exit;

			$admin_id = Request()->admin_id;

            //echo $admin_id;exit;

			$where = [
				
			['admin_name','=',$name],
			['admin_id','<>',$admin_id]
			
			];

			$admin = Admin::where($where)->count();
            
             if($admin>0){
			 
			  echo json_encode(['error_no'=>1,'error_msg'=>'修改名称重复']);exit;
			 
			 }
			$admin = Admin::where('admin_id',$admin_id)->update(['admin_name'=>$name]);

			if($admin){
			
			    echo json_encode(['error_no'=>0,'error_msg'=>'修改成功']);exit;
			
			  }
			
			
			}
}
