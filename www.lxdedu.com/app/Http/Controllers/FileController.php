<?php
/**
 * 文件上传控制器
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function index(Request $request)
    {   
        // 获取上传文件
        $file = $request->file('pic');

        // 获取文件后缀
        $ext = $file->getClientOriginalExtension();

        //生成文件名
        $file_path = time().'.'.$ext;

        //实现上传
        $info = $file->move(public_path('uploads'),$file_path);

        $result = $info->getFilename();

        return $result;
    }

    
} 
