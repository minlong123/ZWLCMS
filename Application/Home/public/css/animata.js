		var animations=["spin","enlarge","box2","box3","box4","box5","box6","box7","box8"]
		window.onload=function(){
			var spinDom=document.querySelectorAll('.spin');
			var enlargeDom=document.querySelectorAll('.enlarge');
			var boxDom2=document.querySelectorAll('.box2');
			var boxDom3=document.querySelectorAll('.box3');
			var boxDom4=document.querySelectorAll('.box4');
			var boxDom5=document.querySelectorAll('.box5');
			var boxDom6=document.querySelectorAll('.box6');
			var boxDom7=document.querySelectorAll('.box7');
			var boxDom8=document.querySelectorAll('.box8');
			// console.log(boxDom2[0]);
			// console.log(boxDom2);

			// 首先知道元素距离页面顶部的距离 offsetTop
			// 然后要知道页面滚动的距离  document.body.scrollTop || document.documentElement.scrollTop
			//判断当前元素是否在当前视口当中。首先要知道当前视口的高度，也就是浏览器·的高度
			//判断当前浏览器的视口高度 window.innerHeight
			// 当滚动的时候
			window.onscroll=function(){
				dom(spinDom); //顺时针旋转90度动画
				dom(enlargeDom); //不断放大缩小动画
				dom(boxDom2);
				dom(boxDom3);
				dom(boxDom4);
				dom(boxDom5);
				dom(boxDom6);
				dom(boxDom7);
				dom(boxDom8);
			}
			// 判断页面上是否添加了相同的动画类名，有的话就传多个，没有的话就传一个
			function dom(dd){
				if(dd.length>=2){
					for(var i=0;i<dd.length;i++){
						doms(dd[i]);
					}
				}else if(dd.length==1){
					doms(dd[0]);
				}
			}
			
			function doms(d){
				var bodyH=window.innerHeight; //视口高度
				var scrollTop=document.body.scrollTop || document.documentElement.scrollTop; //滚动的距离

				var Top=d.offsetTop; //元素距离顶部多少
				if(bodyH+scrollTop>Top && bodyH+scrollTop<Top+bodyH){
					// 两种情况
					// 一种，元素上有很多的类名，需要获取所有类名，然后筛选判断里面有没有添加的动画的类名
					// 实现方法 定义一个包含所有动画名字的数组。然后获取元素上所有的类名，分隔为数组。然后两层循环，检索到匹配的那一个类名，然后给d.style.animationName加上

					//元素只有一个动画的类名，就无需判断,直接获取动画的类名，进行处理。

					// 获取该元素上所有的class类名
					var clName=d.className;
					// 定义获取诸多类中是定义动画的那一个类
					var aniName;
					// 将字符串以空格来分隔为数组
					var clArray=clName.split(" ");
					for(var i=0;i<clArray.length;i++){
						for(var j=0;j<animations.length;j++){
							if(animations[j].indexOf(clArray[i])!=-1){
								aniName=clArray[i];
								break;
							}
						}
					}
					if(clName.lastIndexOf("ani")==-1){
						d.className=clName+" ani";
						d.style.animationName=aniName;
					}
				}
			}
			dom(spinDom);
			dom(enlargeDom);
			dom(boxDom2);
			dom(boxDom3);
			dom(boxDom4);
			dom(boxDom5);
			dom(boxDom6);
			dom(boxDom7);
			dom(boxDom8);
		}