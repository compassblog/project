function redirect(url) {location.href = url;}
/**
 * 二秒自动关闭提示框
 */
function msg_time(msg) {
	dialog({
		id: 'msg_time',
		title: '提示',
		content: msg,
		width: 300
	}).show();
	setTimeout(function(){dialog.get('msg_time').close().remove();},
	2000);
}

/**
 * 确认对话框
 */
function msg_confirm(msg, url) {
	dialog({
		id: 'msg_confirm',
		title: '提示',
		width: 300,
		content: msg,
		okValue: '确定',
		ok: function() {
			window.location.href = url;
			return false;
		},
		cancelValue: '取消',
		cancel: function() {}
	}).show();

}

//ajax get请求
$('.confirm').live("click",
function() {
	var that = this;
	var target = $(this).attr('url');
	if ($(this).hasClass('confirm')) {
		if (!confirm('确认要执行该操作吗?')) {
			return false;
		}
		window.location.href = target;
	}
})

/**
 * 添加到收藏夹
 */
function favorite_add(obj) {
	var url = obj;
	$.getJSON(url,
	function(json) {
		if (json.status === 0) {
			msg_confirm(json.info, json.url);
			return;
		} else {
			msg_time(json.info);
		}

	})
}

$(document).ready(function($) {
	//ajax获取
	$(".ajax-get").live('click',
	function(event) {
		var url = $(this).attr('url');
		var _this = this;
		$.getJSON(url, {},
		function(data) {
			try {
				if (data.status == 1) {
					$(_this).toggleClass('ajax_on ajax_off');
				}
		} catch(e) {
			//TODO handle the exception
			}

		});
	});
});

//排序
function EditSort(e, target){
	var target;
	var that = e;
	$.get(target).success(function(data){if(data.status == 1){location.reload();}});
}

//全选反选
$(".check-all").live("click",
function() {$(".ids:visible").prop("checked", this.checked);});
$(".ids").live("click",
function() {
	var option = $(".ids:visible");
	option.each(function(i) {
		if (!this.checked)
			{
				$(".check-all:visible").prop("checked", false);
				return false;
			} 
		else 
		{
			$(".check-all:visible").prop("checked", true);
		}
	});
});
/**
 * 显示和收起后台导航
 */
$(".ico_left").toggle(function() {$(".side").animate({left: "-200px"});
	$("#Container").animate({left: "0"});
	$(".welcome").animate({paddingLeft: "10px"});
	$(this).find("img").attr("src", respath + "images/ico_8a.png");
},
function(){
	$(".side").animate({left: "0px"});
	$("#Container").animate({left: "200px"});
	$(".welcome").animate({paddingLeft: "65px"    });
	$(this).find("img").attr("src", respath + "images/ico_8.png");
});

