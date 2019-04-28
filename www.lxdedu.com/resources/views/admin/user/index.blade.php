{{-- css文件 --}}
@include('public/_meta')


<title>管理员列表</title>
</head>
<body>
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
		<div class="page-container">
			<div class="text-c"> 日期范围：
				<input type="text" value="{{ $datemin }}" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
				-
				<input type="text" value="{{ $datemax }}" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
				<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="kw" name="">
				<button type="button" class="btn btn-success radius" id="searchbtn" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
			<div class="mt-20">
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="80">ID</th>
						<th width="100">用户名</th>
						<th width="150">邮箱</th>
						<th width="130">加入时间</th>
						<th width="70">状态</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			</div>
		</div>


{{-- js文件 --}}
@include('public/_footer')


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ asset('admin') }}/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="{{ asset('admin') }}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="{{ asset('admin') }}/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	var datatable =$('.table-sort').dataTable({
		 // 以第2列为初始排序
		 order: [[1, 'desc']],
                // 设置 第1列和最后一列不排序
                columnDefs: [
                    // 第1列和第10列不排序 因为索引是从0开始
                    {targets: [0, 5], orderable: false}
                ],
                // 下拉分页数
                lengthMenu: [3, 5, 7, 10],
                // 客户搜索隐藏
                searching: false,
                // 在ajax请求数据量给客户的一个提示
                processing: true,
                // 开启服务器模式
                serverSide: true,
                // ajax发起请求
                ajax: {
                    // 请求地址
                    url: '{{ route("admin.user.list") }}',
                    // 请求方式 get/post
                    type: 'GET',
                    // 请求的参数
                    // 两者写法效果一致  但是它用于搜索
                    // 如果只有一个参数的时候，可以不写小括号
                    data: d => {
						d.kw = $.trim($('#kw').val());
                    }
                },
                // 规则每列是如何来显示
                columns: [
                    {data: 'aaa', defaultContent: '<input type="checkbox" value="1" name="ids[]">', className: "text-c"},
                    {data: 'id'},
                    {data: 'username'},
					{data: 'email'},
                    {data: 'created_at'},
                    {data: 'deleted_at', className: "text-c"},
                    {data: 'bbb', defaultContent: 's'}
                ],

				createdRow(row, data) {
                    // 全选复选框
                    var html = `<input type="checkbox" value="${data.id}" name="ids[]" />`;
                    $(row).find('td:eq(0)').html(html);

                    // 用户是否禁用
                    var html = `<span data-id="${data.id}" class="label label-success radius">成功</span>`;
                    if (data.deleted_at != null) {// 有删除
                        html = `<span data-id="${data.id}" class="label label-warning radius">警告</span>`;
                    }
                    $(row).find('td:eq(5)').html(html);

                    // 操作
					var html = `<a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用">
									<i class="Hui-iconfont">&#xe631;</i>
								</a> 
								<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a> 
								<a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码">
									<i class="Hui-iconfont">&#xe63f;</i>
								</a> 
								<a href="/admin/user/role/${data.id}" class="btn size-S btn-primary-outline radius">分配角色</a>
								<a class="delbtn" title="删除" href="/admin/user/del/${data.id}" onclick="" class="ml-5" style="text-decoration:none">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>`;
                    // var html = `<div class="btn-group">
                    //               
                    //               <a href="/admin/user/edit/${data.id}" class="btn size-S btn-primary-outline radius">修改</a>
                    //               <a href="/admin/user/del/${data.id}"  class="btn size-S btn-danger-outline radius delbtn">删除</a>
                    //             </div>`;
                    $(row).find('td:eq(6)').html(html);
                }
				
	});
	
	// 点击搜索让datatable加载一次
	$('#searchbtn').click(() => {
		datatable.api().ajax.reload();
	});

	// 给删除添加事件  委托
	$('.table-sort').on('click', '.delbtn', function (evt) {
			evt.preventDefault();
            var url = $(this).attr('href');
			$.ajax({
				url,
				type: 'DELETE',
				data: {
					_token: "{{ csrf_token() }}",
				},
				dataType: 'json',
				success: ret => {
					$(this).parents('tr').remove();
					layer.msg('删除成功',{time:2000,icon:6});
				},
			});
	});
});


/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url,
			data:{
				_token:"{{ csrf_token() }}",
			},
			dataType: 'json',
			success: function(data){
				// $(obj).parents("tr").remove();
				// layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script> 