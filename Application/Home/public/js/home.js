window.onload=function(){
	// var index=0;
	// var ulDom=document.querySelector('.play_ul');
	// var liDom=ulDom.children;
	// var length=liDom.length;
	// var last=0;
	// var ltDom=document.querySelector('.play_left');
	// var rtDom=document.querySelector('.play_right');
	// // 当点击左边的按钮的时候，该事件才会发生，并进一步的去切换图片
	// ltDom.addEventListener('click',function(){
	// 	last=index;
	// 	//index--等同于index=index-1;
	// 	index--;
	// 	imagesP(index);
	// })
	// // 当点击右边的按钮的时候，该事件才会发生，并进一步的去切换图片
	// rtDom.addEventListener('click',function(){
	// 	last=index;
	// 	//index++等同于index=index+1;
	// 	index++;
	// 	imagesP(index);
	// })
	// /*每隔3秒执行一次方法，这个方式是autoPlay*/
	// setInterval(autoPlay,3000);
	// function autoPlay(){
	// 	last=index;
	// 	index++;
	// 	imagesP(index);
	// }
	// function imagesP(num){
	// 	index=num;
	// 	if(index<0){
	// 		index=2;
	// 	}else if(index>2){
	// 		index=0;
	// 	}
	// 	liDom[last].className="play_hidden";
	// 	liDom[index].className="play_show";
	// }



	window.onscroll=function(){
		arg();
		// dislog();
	}
	function shikou(name){
		var name=name;
		var boxDom=document.querySelectorAll('.'+name);
		for(var i=0;i<boxDom.length;i++){
			// console.log(boxDom.length);
			// console.log(boxDom);
			var shikou=window.innerHeight;
			var topHeight=boxDom[i].offsetTop;
			var scrollTo=document.body.scrollTop || document.documentElement.scrollTop;
			if(scrollTo+shikou>topHeight && scrollTo+shikou<topHeight+shikou){
					boxDom[i].style.webkitAnimationName=name;
					boxDom[i].style.animationName=name;
			}
		}
	}
	function arg(){
		shikou("spin");
		shikou("enlarge");
		shikou("topMove");
		shikou("bottomMove");
		shikou("rightMove");
		shikou("shortTop");
		shikou("shortBottom");
		shikou("leftMove");
		shikou("rightD");
		shikou("leftD");
	}
	arg();

	


	// 切换元素的方法
	// 切换元素需要获取切换效果的所有元素以及要增加和删除的类名
// 	function switchTab(dom,name){
// 		var markDom=document.querySelectorAll('.'+dom);
// 		for(var i=0;i<markDom.length;i++){
// 			markDom[i].onmouseover=function(){
// 				removeClass(markDom,name);
// 				addClass(this,name);
// 			}
// 		}
// 	}
// 	// 添加类名的方法，要添加类名必须有两个条件
// 	// 第一个 给哪个元素添加类名，这里设置一个dom参数
// 	// 第二个 给元素添加添加什么类名，这里再设置一个name参数
// 	function addClass(dom,name){
// 		var classNames=dom.className;
// 		dom.className=classNames+" "+name;
// 	}
// 	// 删除类名的方法
// 	function removeClass(dom,name){
// 		for(var i=0;i<dom.length;i++){
// 			var clas=dom[i].className;
// // marketing_content_children1 marketing_content_children2 enlarge
// 			var clasend=clas.replace(" "+name,"");
// 			dom[i].className=clasend;
// 		}
// 	}
// 	switchTab("marketing_content_children1","marketing_select");
// 	switchTab("case_bottom_one","case_select");
// 	function switchImg(){
// 		var modelDom=document.querySelectorAll('.model_bottom_one1');
		
// 		for(var i=0;i<modelDom.length;i++){
// 			modelDom[i].onmouseover=function(){
// 				var datas=this.getAttribute('data-imgs');
// 				this.children[0].children[0].children[0].src=datas;
// 			}
// 			modelDom[i].onmouseout=function(){
// 				var datas=this.getAttribute('data-img');
// 				this.children[0].children[0].children[0].src=datas;
// 			}
// 		}
// 	}
// 	switchImg();

	// function dislog(){
	// 	var timer=null;
	// 	var topDom=document.querySelector('.h-dialog-th');
	// 	var mesDom=document.querySelector('.h-dialog');
	// 	var scrollTo=document.body.scrollTop || document.documentElement.scrollTop;
	// 	if(scrollTo==0){
	// 		topDom.style.display="none";
	// 		mesDom.style.display="block";
	// 		mesDom.style.bottom="7px";
	// 		mesDom.style.marginBottom="0";

	// 	}else if(scrollTo>0 && scrollTo<=614){
	// 		mesDom.style.display="none";
	// 	}else if(scrollTo>614){
	// 		mesDom.style.display="block";
	// 		topDom.style.display="block";
	// 		var eleHeight=-mesDom.offsetHeight/2;
	// 		mesDom.style.bottom="50%";
	// 		mesDom.style.marginBottom=eleHeight+"px";
	// 	}
	// 	topDom.onclick=function(){
	// 		timer=setInterval(function(){
	// 			var scrollT=document.body.scrollTop || document.documentElement.scrollTop;
	// 			//得出滚动条要滚动多少
	// 			var ispeed=Math.floor(-scrollT/100);
	// 			// 计算滚动到下一个位置的滚动的距离
	// 			document.body.scrollTop=document.documentElement.scrollTop=ispeed+scrollT;
	// 			if(scrollT==0){
	// 				clearInterval(timer);
	// 			}
	// 		})
	// 	}
	// }
	// dislog();


}