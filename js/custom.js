$(function() {
	var lastIndex=-1;
	var lottery={
	index:-1,	//当前转动到哪个位置，起点位置
	count:0,	//总共有多少个位置
	timer:0,	//setTimeout的ID，用clearTimeout清除
	speed:50,	//初始转动速度
	times:0,	//转动次数
	cycle:60,	//转动基本次数：即至少需要转动多少次再进入抽奖环节
	prize:-1,	//中奖位置
	target:-1,  //
	grade:-1,
	init:function(id){
		if ($("#"+id).find(".lottery-unit").length>0) {
			$lottery = $("#"+id);
			$units = $lottery.find(".lottery-unit");
			this.obj = $lottery;
			this.count = $units.length;
			$lottery.find(".lottery-unit-"+this.index).addClass("active");
		};
	},
	roll:function(){
		var index = this.index;
		var count = this.count;
		var lottery = this.obj;
		$(lottery).find(".lottery-unit-"+index).removeClass("active");
		index += 1;
		if (index>count-1) {
			index = 0;
		};
		$(lottery).find(".lottery-unit-"+index).addClass("active");
		this.index=index;
		return false;
	},
	stop:function(index){
		this.prize=index;
		return false;
	}
};

function roll(){
	lottery.times += 1;
	lottery.roll();
	var total=lottery.cycle+12-lastIndex+lottery.target;
	if (lottery.times ==total) {
		clearTimeout(lottery.timer);
		lottery.prize=-1;
		lottery.times=0;
		lastIndex=lottery.index;
		click=false;
	}
	else
	{
			if(lottery.times<=2)
				{
					lottery.speed-=10;
				}
			 else if(lottery.times>2&&lottery.times<=total-lottery.target-15)
				{
			 		lottery.speed=40;
			 	}
			 	else if(lottery.times>total-lottery.target-15&&lottery.times<=total-lottery.target-8)
				{
			 		lottery.speed+=10;
			 	}
			 else if(lottery.times>total-lottery.target-8&&lottery.times<=total-2)
			 	{
			 		lottery.speed=300;
			 	}
			 	else if (lottery.times==total-1)
			 	{
			 		lottery.speed=400;
			 		setTimeout(alertWindow,1000);
			 	}

		lottery.timer = setTimeout(roll,lottery.speed);
	}

	
	return false;
}
function alertWindow()
{
	alert('恭喜你中'+lottery.grade+'啦!\n'+'哇，人品大爆发啦！\n赶快下拉查看领奖方式来晓礼商城领取你的奖品吧！');
}
var click=false;
lottery.init('lottery');
$(".middle-button").click(function() {  
			var url = "http://54.191.223.118/mtt/index.php/prize";  
				$.ajax({  
							type: "post",  
							url: url,  
							dataType: "json",  
							success: function(msg){  
								//alert(msg.index);
								if(msg.status=="login")
								{
									alert("请先注册！");
									window.location ="http://54.191.223.118/mtt/index.php/register";

									return;
								}
								if(msg.status=="overtime")
								{
									alert("抽奖次数已到！");

									return;
								}
								if (click) {
												return false;
											}
											else
											{
													lottery.speed=100;
													lottery.target=msg.index;
													roll(msg.grade);
													click=true;
													lottery.grade = msg.grade;
													return false;
											}

										},


								});  



							});  

  
			}); 

