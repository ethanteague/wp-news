// Manager
function TotalSoftPoll_Reload()
{
	location.reload();
}
function Total_Soft_Poll_AMD2_But1(Poll_ID)
{
	jQuery('.Total_Soft_Poll_AMD2').hide(500);
	jQuery('.Total_Soft_Poll_AMMTable').hide(500);
	jQuery('.Total_Soft_Poll_AMOTable').hide(500);
	jQuery('.Total_Soft_Poll_Save').show(500);
	jQuery('.Total_Soft_Poll_Update').hide(500);

	jQuery('.Total_Soft_Poll_ID').html('[Total_Soft_Poll id="'+Poll_ID+'"]');
	jQuery('.Total_Soft_Poll_TID').html('&lt;?php echo do_shortcode("[Total_Soft_Poll id='+'"'+Poll_ID+'"'+']");?&gt');
	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('.Total_Soft_Poll_Add_MTable').show(500);
		jQuery('.Total_Soft_Poll_Add_ATable').show(500);
		jQuery('.Total_Soft_Poll_Add_Answer').show(500);
		jQuery('.Total_Soft_Poll_AnswersTable').show(500);
		jQuery('.Total_Soft_Poll_AMShortTable').show(500);
	},500)
}
function TotalSoftPoll_Video_Clicked()
{
	var PollIntervId = setInterval(function(){
		var code = jQuery('#TotalSoftPoll_Video_1').val();		

		if(code.indexOf('https://www.youtube.com/')>0)
		{
			var TotalSoftPollCodes1 = code.split('<a href="https://www.youtube.com/');
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				var TotalSoftPollCodes2= TotalSoftPollCodes1[1].split("=");
				var TotalSoftPollCodeSrc = TotalSoftPollCodes2[1].split('&');

				jQuery('#TotalSoftPoll_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodeSrc[0]);
				jQuery('#TotalSoftPoll_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodeSrc[0]+'/mqdefault.jpg');
				if(jQuery('#TotalSoftPoll_Video_2').val().length>0){
					clearInterval(PollIntervId);
				}				
			}
			else if(code.indexOf('embed')>0)
			{
				var TotalSoftPollCodes1=code.split('[embed]');
				var TotalSoftPollCodes2=TotalSoftPollCodes1[1].split('[/embed]');
				if(TotalSoftPollCodes2[0].indexOf('watch?')>0)
				{
					var TotalSoftPollCodes3=TotalSoftPollCodes2[0].split('=');
					
					jQuery('#TotalSoftPoll_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodes3[1]);
					jQuery('#TotalSoftPoll_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodes3[1]+'/mqdefault.jpg');
					if(jQuery('#TotalSoftPoll_Video_2').val().length>0){
						clearInterval(PollIntervId);
					}	
				}
				else
				{
					var TotalSoftPollCodeSrc=TotalSoftPollCodes2[0];
					var TotalSoftPollImsrc=TotalSoftPollCodeSrc.split('embed/');

					jQuery('#TotalSoftPoll_Video_2').val(TotalSoftPollCodeSrc);
					jQuery('#TotalSoftPoll_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollImsrc[1]+'/mqdefault.jpg');
					if(jQuery('#TotalSoftPoll_Video_2').val().length>0){
						clearInterval(PollIntervId);
					}	
				}
			}
			else
			{
				var TotalSoftPollCodes2= TotalSoftPollCodes1[1].split('=');
				var TotalSoftPollCodeSrc = TotalSoftPollCodes2[1].split('">https://');

				jQuery('#TotalSoftPoll_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodeSrc[0]);
				jQuery('#TotalSoftPoll_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodeSrc[0]+'/mqdefault.jpg');
				if(jQuery('#TotalSoftPoll_Video_2').val().length>0){
					clearInterval(PollIntervId);
				}				
			}	
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			var TotalSoftPollCodes1 = code.split('<a href="https://youtu.be/'); 
			var TotalSoftPollCodeSrc = TotalSoftPollCodes1[1].split('">https://');

			jQuery('#TotalSoftPoll_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodeSrc[0]);
			jQuery('#TotalSoftPoll_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodeSrc[0]+'/mqdefault.jpg');

			if(jQuery('#TotalSoftPoll_Video_2').val().length>0){
				clearInterval(PollIntervId);
			}				
		}
		else if(code.indexOf('https://vimeo.com/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]https://vimeo.com/');
				var src=s1[1].split('[/embed]');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#TotalSoftPoll_Video_2').val('https://player.vimeo.com/video/'+src[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoftPoll_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftPoll_Image_2').val(response);
					if(jQuery('#TotalSoftPoll_Video_2').val().length>0){
						clearInterval(PollIntervId);
					}				
				});		
   			}
			else
			{
				var s1 = code.split('<a href="https://vimeo.com/'); 
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#TotalSoftPoll_Video_2').val('https://player.vimeo.com/video/'+src[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoftPoll_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftPoll_Image_2').val(response);
					if(jQuery('#TotalSoftPoll_Video_2').val().length>0){
						clearInterval(PollIntervId);
					}				
				});		
			}		
		}
	},100)
}
function TotalSoftPoll_Image_Clicked()
{
	var PollIntervId = setInterval(function(){
		var code = jQuery('#TotalSoftPoll_Image_1').val();			
		if(code.indexOf('img')>0){
			var s=code.split('src="'); 
			var src=s[1].split('"');				
			jQuery('#TotalSoftPoll_Image_2').val(src[0]);
			if(jQuery('#TotalSoftPoll_Image_2').val().length>0){
				jQuery('#TotalSoftPoll_Image_1').val('');	
				clearInterval(PollIntervId);
			}				
		}
	},100)
}
function Total_Soft_Poll_Res_Ans()
{
	jQuery('.Total_Soft_Poll_Add_ATable').find('input[type=text]').val('');
	jQuery('#Total_Soft_Poll_UpdAns').hide(500);
	jQuery('#Total_Soft_Poll_SavAns').show(500);
}
function Total_Soft_Poll_Save_Ans()
{
	var TotalSoftPollHidNum=jQuery('#TotalSoftPollHidNum').val();
	var TotalSoftPoll_Answer=jQuery('#TotalSoftPoll_Answer').val();
	var TotalSoftPoll_Video_2=jQuery('#TotalSoftPoll_Video_2').val();
	var TotalSoftPoll_Image_2=jQuery('#TotalSoftPoll_Image_2').val();	
	if(TotalSoftPollHidNum%2==1)
	{
		jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable3"><tr><td>'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" id="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" class="Total_Soft_Poll_Color" value="#000000"></td><td><input type="text" readonly value="'+TotalSoftPoll_Answer+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TotalSoftPoll_Image_2+'"><input type="text" value="'+TotalSoftPoll_Image_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><input type="text" value="'+TotalSoftPoll_Video_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td onclick="TotalSoftPollAns_Edit('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil"></i></td><td onclick="TotalSoftPollAns_Del('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-trash"></i></td></tr></table></li>');
	}
	else
	{
		jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable2"><tr><td>'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" id="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" class="Total_Soft_Poll_Color" value="#000000"></td><td><input type="text" readonly value="'+TotalSoftPoll_Answer+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TotalSoftPoll_Image_2+'"><input type="text" value="'+TotalSoftPoll_Image_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><input type="text" value="'+TotalSoftPoll_Video_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td onclick="TotalSoftPollAns_Edit('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil"></i></td><td onclick="TotalSoftPollAns_Del('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-trash"></i></td></tr></table></li>');
	}
	jQuery('.Total_Soft_Poll_Color').wpColorPicker();
	Total_Soft_Poll_Res_Ans();
	jQuery('#TotalSoftPollHidNum').val(parseInt(parseInt(TotalSoftPollHidNum)+1));
}
function Total_Soft_Poll_Update_Ans()
{
	var Poll_Num=jQuery('#TotalSoftPollHidUpdate').val();
	var TotalSoftPollHidNum=jQuery('#TotalSoftPollHidNum').val();

	var TotalSoftPoll_Answer=jQuery('#TotalSoftPoll_Answer').val();
	var TotalSoftPoll_Video_2=jQuery('#TotalSoftPoll_Video_2').val();
	var TotalSoftPoll_Image_2=jQuery('#TotalSoftPoll_Image_2').val();

	jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').val(TotalSoftPoll_Answer);
	jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').val(TotalSoftPoll_Image_2);
	jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').val(TotalSoftPoll_Video_2);
	jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPollAnsImage').attr('src',TotalSoftPoll_Image_2);

	jQuery('#Total_Soft_Poll_UpdAns').hide(500);
	jQuery('#Total_Soft_Poll_SavAns').show(500);

	Total_Soft_Poll_Res_Ans();
	jQuery('#TotalSoftPollHidNum').val(TotalSoftPollHidNum);
}
function TotalSoftPoll_AnswerUlSort()
{
	jQuery('#TotalSoftPoll_AnswerUl').sortable({
      	update: function() {
        	jQuery("#TotalSoftPoll_AnswerUl > li").each(function(){
        		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('id','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('name','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('id','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('name','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('id','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('name','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('id','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('name','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));
			});         
       	}
    });
}
function TotalSoftPollAns_Edit(Poll_Num)
{
	var TotalSoftPoll_Answer =jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').val();
	var TotalSoftPoll_Image_2=jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').val();
	var TotalSoftPoll_Video_2=jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').val();

	jQuery('#TotalSoftPollHidUpdate').val(Poll_Num);
	jQuery('#Total_Soft_Poll_SavAns').hide(500);
	jQuery('#Total_Soft_Poll_UpdAns').show(500);

	jQuery('#TotalSoftPoll_Answer').val(TotalSoftPoll_Answer);
	jQuery('#TotalSoftPoll_Image_2').val(TotalSoftPoll_Image_2);
	jQuery('#TotalSoftPoll_Video_2').val(TotalSoftPoll_Video_2);
}
function TotalSoftPollAns_Del(Poll_Num)
{
	jQuery('#TotalSoftPollLi_'+Poll_Num).remove();
	jQuery('#TotalSoftPollHidNum').val(jQuery('#TotalSoftPollHidNum').val()-1);

	jQuery("#TotalSoftPoll_AnswerUl > li").each(function(){
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('id','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('name','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('id','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('name','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('id','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('name','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('id','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('name','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));

		if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable2'))
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable2");
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable3");
		}
		else if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable3'))
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable3");
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable2");
		}
	});  
}
function TotalSoftPoll_Edit(Poll_ID)
{
	jQuery('.Total_Soft_Poll_AMD2').hide(500);
	jQuery('.Total_Soft_Poll_AMMTable').hide(500);
	jQuery('.Total_Soft_Poll_AMOTable').hide(500);
	jQuery('.Total_Soft_Poll_Update').show(500);
	jQuery('.Total_Soft_Poll_Save').hide(500);

	jQuery('.Total_Soft_Poll_ID').html('[Total_Soft_Poll id="'+Poll_ID+'"]');
	jQuery('.Total_Soft_Poll_TID').html('&lt;?php echo do_shortcode("[Total_Soft_Poll id='+'"'+Poll_ID+'"'+']");?&gt');
	jQuery('#Total_SoftPoll_Update').val(Poll_ID);


	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPoll_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		jQuery('#TotalSoftPoll_Question').val(b[0]); 
		jQuery('#TotalSoftPoll_Theme').val(b[1]); 
		jQuery('#TotalSoftPollHidNum').val(b[2]); 
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPoll_Edit_Ans', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var TSPoll_Ans=Array();
		var TSPoll_Ans_Im=Array();
		var TSPoll_Ans_Vd=Array();
		var TSPoll_Ans_Cl=Array();
		var a=response.split('stdClass Object');
		for(i=1;i<a.length;i++)
		{
			var c=a[i].split('=>');
			TSPoll_Ans[TSPoll_Ans.length]=c[3].split('[')[0].trim();
			TSPoll_Ans_Im[TSPoll_Ans_Im.length]=c[4].split('[')[0].trim();
			TSPoll_Ans_Vd[TSPoll_Ans_Vd.length]=c[5].split('[')[0].trim();
			TSPoll_Ans_Cl[TSPoll_Ans_Cl.length]=c[6].split('[')[0].trim();
		}
		for(i=1;i<=TSPoll_Ans.length;i++)
		{	
			if(i%2==1)
			{
				jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+i+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable3"><tr><td>'+i+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+i+'" id="TotalSoftPoll_Ans_Col_'+i+'" class="Total_Soft_Poll_Color" value="'+TSPoll_Ans_Cl[i-1]+'"></td><td><input type="text" readonly value="'+TSPoll_Ans[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+i+'" name="TotalSoftPoll_Ans_'+i+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TSPoll_Ans_Im[i-1]+'"><input type="text" value="'+TSPoll_Ans_Im[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+i+'" name="TotalSoftPoll_Ans_Im_'+i+'"><input type="text" value="'+TSPoll_Ans_Vd[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+i+'" name="TotalSoftPoll_Ans_Vd_'+i+'"></td><td onclick="TotalSoftPollAns_Edit('+i+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil"></i></td><td onclick="TotalSoftPollAns_Del('+i+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-trash"></i></td></tr></table></li>');
			}
			else
			{
				jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+i+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable2"><tr><td>'+i+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+i+'" id="TotalSoftPoll_Ans_Col_'+i+'" class="Total_Soft_Poll_Color" value="'+TSPoll_Ans_Cl[i-1]+'"></td><td><input type="text" readonly value="'+TSPoll_Ans[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+i+'" name="TotalSoftPoll_Ans_'+i+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TSPoll_Ans_Im[i-1]+'"><input type="text" value="'+TSPoll_Ans_Im[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+i+'" name="TotalSoftPoll_Ans_Im_'+i+'"><input type="text" value="'+TSPoll_Ans_Vd[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+i+'" name="TotalSoftPoll_Ans_Vd_'+i+'"></td><td onclick="TotalSoftPollAns_Edit('+i+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil"></i></td><td onclick="TotalSoftPollAns_Del('+i+')"><i class="Total_SoftPoll_icon totalsoft totalsoft-trash"></i></td></tr></table></li>');
			}
			jQuery('.Total_Soft_Poll_Color').wpColorPicker();
		}
	})

	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('.Total_Soft_Poll_Add_MTable').show(500);
		jQuery('.Total_Soft_Poll_Add_ATable').show(500);
		jQuery('.Total_Soft_Poll_Add_Answer').show(500);
		jQuery('.Total_Soft_Poll_AnswersTable').show(500);
		jQuery('.Total_Soft_Poll_AMShortTable').show(500);
	},500)
}
function TotalSoftPoll_Del(Poll_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPoll_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
// Theme Menu
function TotalSoftPoll_Theme_Edit(Theme_ID)
{
	jQuery('.Total_Soft_Poll_TMMTable').hide(500);
	jQuery('.Total_Soft_Poll_TMOTable').hide(500);
	
	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('#TotalSoft_Poll_Free_Version_Im_'+Theme_ID).show(500);
	},500)
}