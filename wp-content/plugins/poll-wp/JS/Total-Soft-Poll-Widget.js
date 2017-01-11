
function Total_Soft_Poll_1_Vote(Poll_ID)
{	
	var Total_Soft_Poll_1_Ans_ID = '';
	if(jQuery('.Total_Soft_Poll_1_Ans_Div_'+Poll_ID).find('.Total_Soft_Poll_1_Ans_Check_Div').find('input').attr('type') == 'radio')
	{
		jQuery('.Total_Soft_Poll_1_Ans_Div_'+Poll_ID).find('.Total_Soft_Poll_1_Ans_Check_Div').find('input[type=radio]').each(function(){
			if(jQuery(this).prop('checked'))
			{
				Total_Soft_Poll_1_Ans_ID = jQuery(this).val();
			}
		})		
	}
	else if(jQuery('.Total_Soft_Poll_1_Ans_Div_'+Poll_ID).find('.Total_Soft_Poll_1_Ans_Check_Div').find('input').attr('type') == 'checkbox')
	{
		jQuery('.Total_Soft_Poll_1_Ans_Div_'+Poll_ID).find('.Total_Soft_Poll_1_Ans_Check_Div').find('input[type=checkbox]').each(function(){
			if(jQuery(this).prop('checked'))
			{
				Total_Soft_Poll_1_Ans_ID += jQuery(this).val() + '^*^';
			}
		})
	}

	if(Total_Soft_Poll_1_Ans_ID != '')
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'TotalSoftPoll_1_Vote', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Total_Soft_Poll_1_Ans_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			// alert(response);
			var b=Array();
			var sumb = 0;
			var a=response.split('s] =>');
			for(var i=1;i<a.length;i++)
			{ b[b.length]=a[i].split(')')[0].trim(); }

			for(var i=0;i<b.length;i++)
			{ sumb += parseInt(b[i]); }

			var pvb = jQuery('.Total_Soft_Poll_1_Ans_Lab_Sp3_'+Poll_ID).html();

			if(pvb.indexOf('%') > 0 && pvb.indexOf('(') > 0 && pvb.indexOf(')') > 0)
			{
				for(var i=0;i<b.length;i++)
				{
					jQuery('.Total_Soft_Poll_1_Ans_Lab_Sp2_'+Poll_ID+'_'+i).css('width', parseFloat(parseInt(b[i])*100/sumb).toFixed(2)+'%');
					jQuery('.Total_Soft_Poll_1_Ans_Lab_Sp3_'+Poll_ID+'_'+i).html(b[i]+ ' ( '+ parseFloat(parseInt(b[i])*100/sumb).toFixed(2)+' % )');
				}
			}
			else if(pvb.indexOf('%') > 0)
			{
				for(var i=0;i<b.length;i++)
				{
					jQuery('.Total_Soft_Poll_1_Ans_Lab_Sp2_'+Poll_ID+'_'+i).css('width', parseFloat(parseInt(b[i])*100/sumb).toFixed(2)+'%');
					jQuery('.Total_Soft_Poll_1_Ans_Lab_Sp3_'+Poll_ID+'_'+i).html(parseFloat(parseInt(b[i])*100/sumb).toFixed(2)+' %');
				}
			}
			else
			{
				for(var i=0;i<b.length;i++)
				{
					jQuery('.Total_Soft_Poll_1_Ans_Lab_Sp2_'+Poll_ID+'_'+i).css('width', parseFloat(parseInt(b[i])*100/sumb).toFixed(2)+'%');
					jQuery('.Total_Soft_Poll_1_Ans_Lab_Sp3_'+Poll_ID+'_'+i).html(b[i]);
				}
			}
		})
		document.cookie="username"+Poll_ID+"="+Poll_ID;
		setTimeout(function(){
			Total_Soft_Poll_Ans_Div(Poll_ID);
		},200)
	}
}
jQuery(document).ready(function(){
	var Total_Soft_Poll_Cookie=document.cookie.split(';');
	var Total_Soft_Poll_Cookie_ID = [];
	for(var i=0;i<Total_Soft_Poll_Cookie.length;i++)
	{
		if(Total_Soft_Poll_Cookie[i].indexOf('username')>=0)
		{
			var Total_Soft_Poll_Cookie_Split=Total_Soft_Poll_Cookie[i].split('=');
			Total_Soft_Poll_Ans_Div1(Total_Soft_Poll_Cookie_Split[1]);
		}
	}
})