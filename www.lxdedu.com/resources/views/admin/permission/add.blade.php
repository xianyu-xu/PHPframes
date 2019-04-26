{{-- css文件 --}}
@include('public/_meta')

<title>添加权限</title>
</head>
<body>
<article class="page-container">
    
<form action="{{ route('admin.user.permission.store') }}" method="post" class="form form-horizontal" id="form-member-add">
        @csrf
            <div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						父级菜单：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="pid" onchange="SetSubID(this);">
                            <option value="0">顶级分类</option>
                            @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
							
							
						</select>
						</span>
					</div>
				</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="username" name="name">
			</div>
        </div>
        <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>路由别名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="routename">
                </div>
            </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否为菜单：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="is_menu" type="radio" id="sex-1" value="1" checked>
					<label for="sex-1">是</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" value="0" name="is_menu">
					<label for="sex-2">否</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>




{{-- js文件 --}}
@include('public/_footer')


<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="{{ asset('admin') }}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="{{ asset('admin') }}/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="{{ asset('admin') }}/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="{{ asset('admin') }}/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			name:{
				required:true,
			},
			is_menu:{
				required:true,
			},
			
		},
        // messages:{
        //     name:{
        //         required:'请填写权限名称',
        //     },
        //     routename:{
		// 		required:'请填写路由别名';
		// 	},
        // },
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			// var index = parent.layer.getFrameIndex(window.name);
			// //parent.$('.btn-refresh').click();
			// parent.layer.close(index);
            $(form).submit();
		}
	});
});
</script> 