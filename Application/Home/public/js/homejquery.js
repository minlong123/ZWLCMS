		$(function(){
			$('.marketing_content_children1').mouseover(function(){
				// 移除三个盒子上的添加子类样式的父类类名
				$('.marketing_content_children1').removeClass('marketing_select');
				// 就是给当前用户移动到的那个元素添加这个类名
				$(this).addClass('marketing_select');

			})

			$('.case_bottom_one').mouseover(function(){
				$('.case_bottom_one').removeClass('case_select');
				$(this).addClass('case_select');
			})


			$('.model_bottom_one1').hover(function(){
				$(this).find('img').attr("src",$(this).data('imgs'));
			},function(){
				$(this).find('img').attr("src",$(this).data('img'));
			})



			$('.small_column1_left5').mouseover(function(){
				// 移除三个盒子上的添加子类样式的父类类名
				$('.small_column1_left5').removeClass('small_column1_leftss');
				// 就是给当前用户移动到的那个元素添加这个类名
				$(this).addClass('small_column1_leftss');

			})


			$('.small_column5_bottom2').mouseover(function(){
				// 移除三个盒子上的添加子类样式的父类类名
				$('.small_column5_bottom2').removeClass('samll_column5_bottomss');
				// 就是给当前用户移动到的那个元素添加这个类名
				$(this).addClass('samll_column5_bottomss');

			})


		})


		
		$(function(){
			$(window).scroll(function(){
				scroll();
				scrll();
			})


			function scroll(){
				var scroll=$(this).scrollTop();
				if(scroll==0){
					$('.h-dialog-th').css("display","none");
					$('.h-dialog').css("display","block");
					$('.h-dialog').css({
						"bottom":"7px",
						"marginBottom":0
					});
				}else if(scroll>0 && scroll<=614){
					$('.h-dialog').css("display","none");
				}else if(scroll>614){
					$('.h-dialog').css("display","block");
					$('.h-dialog-th').css("display","block");
					var heights=-$('.h-dialog').height()/2;
					$('.h-dialog').css({
						"bottom":"50%",
						"marginBottom":heights+"px"
					});
				}
			}
			$('.h-dialog-th').click(function(){
				$('body,html').animate({scrollTop:0},1000);
			})
			scroll();



			function scrll(){
				var scrollTop=$(window).scrollTop();
				if(scrollTop>=480){
					$('.exar_con_right').css("position","fixed");
					$('.exar_con_right').css("top","20px");
				}else{
					$('.exar_con_right').css("position","absolute");
					$('.exar_con_right').css("top","0");
				}
			}
			scrll();


		})


		$(function(){
			var index=0;
			// var last=0;
			setInterval(autoPlay,3000);
			function autoPlay(){
				// last=index;
				index++;
				image(index);
			}
			$('.play_left').bind('click',function(){
				// last=index;
				index--;
				image(index);
			})
			$('.play_right').bind('click',function(){
				// last=index;
				index++;
				image(index);
			})
			function image(num){
				// index=num;
				if(index>2){
					index=0;
				}else if(index<0){
					index=2;
				}
				//fadeIn 淡入  让图片逐渐的显示出来
				//fadeOut 淡出 让图片逐渐的隐藏
				$('.play_ul').find('li').eq(index).addClass('play_select').fadeIn(500).siblings().removeClass().fadeOut(500);
			}

		})