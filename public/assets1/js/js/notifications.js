
    setInterval(TodaysfeedbackNotifications, 2000);
    setInterval(AlldaysfeedbackNotifications, 2000);
    setInterval(ThisweekfeedbackNotifications, 2000);

    TodaysfeedbackNotifications();
    AlldaysfeedbackNotifications();
    ThisweekfeedbackNotifications();
    //////////////////////////////////////////////
    setInterval(TodaysuserNotifications, 2000);
    setInterval(AlldayuserNotifications, 2000);
    setInterval(ThisweekuserNotifications, 2000);

    TodaysuserNotifications();
    AlldayuserNotifications();
    ThisweekuserNotifications();
    ///////////////////////////////////////////////
    setInterval(Todaysvendervendersations, 2000);
    setInterval(Alldaysvendervendersations, 2000);
    setInterval(ThisweekvendersNotifications, 2000);

    Todaysvendervendersations();
    Alldaysvendervendersations();
    ThisweekvendersNotifications();
////////////////////////////////////////////////////////////

setInterval(TodayshoardingdeatilsNotifications, 2000);
    setInterval(AlldayshoardingdeatilsNotifications, 2000);
    setInterval(ThisweekhoardingdeatilsNotifications, 2000);

    TodayshoardingdeatilsNotifications();
    AlldayshoardingdeatilsNotifications();
    ThisweekhoardingdeatilsNotifications();
    /////////////////////////////////////////////////////////
     function TodayshoardingdeatilsNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("todays_hoardingdeatils_notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".todays_notification_count_hoarding").text(response.total);
                    	
                    	$(".todays_notification_count_header_hoarding").text(response.count);

                    	$.each(response.notifications,function(key,val){

                           
                            content += '<div class="accept_job">';
                          content += '<h4 style="color:#000;">Hoarding  holder : '+val.name+'</h4>';
                            	content += '<p>Hoarding type: <span style="background-color:yellow;">'+val.hoarding_type+'</span> , Lighting: <span style="background-color:yellow;">'+val.lighting_type+'</span> , Size: <span style="background-color:yellow;">Width-'+val.size_in_width+' Length-'+val.size_in_length+'</span></p>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#todays_notifications_hoarding").html(content);    
                    } 
                    else
                    {
                        $("#todays_notifications_hoarding").empty(); 

                        content += '<p>No Hoarging(s)</p>';
                        $(".todays_notification_count_header_hoarding").text(0);
                         $("#todays_notifications_hoarding").html(content);    
                    }                 
                }
                
         });
    }

    function ThisweekhoardingdeatilsNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("thisweek_hoardingdeatils_notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".thisweek_notification_count_hoarding").text(response.total);

                    	
                    	 $.each(response.notifications,function(key,val){

                            
                            content += '<div class="accept_job">';
                          content += '<h4 style="color:#000;">Hoarding holder : '+val.name+'</h4>';
                            	content += '<p>Hoarding type: <span style="background-color:yellow;">'+val.hoarding_type+'</span> , Lighting: <span style="background-color:yellow;">'+val.lighting_type+'</span> , Size: <span style="background-color:yellow;">Width-'+val.size_in_width+' Length-'+val.size_in_length+'</span></p>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#thisweek_notifications_hoarding").html(content);    
                    } 
                    else
                    {
                        $("#thisweek_notifications_hoarding").empty();
                        content += '<p >No Hoarging(s)</p>';

                         $("#thisweek_notifications_hoarding").html(content);    
                    }                 
                }
                
         });
    }

    function AlldayshoardingdeatilsNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("alldays_hoardingdeatils_notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".alldays_notification_count_hoarding").text(response.total);

                    	
                    	 $.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                          content += '<h4 style="color:#000;">Hoarging holder : '+val.name+'</h4>';
                            	content += '<p>Hoarding type: <span style="background-color:yellow;">'+val.hoarding_type+'</span> , Lighting: <span style="background-color:yellow;">'+val.lighting_type+'</span> , Size: <span style="background-color:yellow;">Width-'+val.size_in_width+' Length-'+val.size_in_length+'</span></p>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#alldays_notifications_hoarding").html(content);    
                    } 
                    else
                    {
                        $("#alldays_notifications_hoarding").empty();   

                        content += '<p >No Hoarding(s)</p>';

                         $("#alldays_notifications_hoarding").html(content); 
                    }                 
                }
                
         });
    }


    function TodaysfeedbackNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("todays_enquiry_notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".todays_notification_count_enquiry").text(response.total);
                    	
                    	$(".todays_notification_count_header_enquiry").text(response.count);

                    	$.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                            content += '<h4 style="color:#000;">Enquiry Notification From : '+val.customer_name+'</h4>';
                            	content += '<p>Enquiry from: <span style="background-color:yellow;">'+val.customer_name+'</span> , Email: <span style="background-color:yellow;">'+val.customer_email+'</span> , Phone: <span style="background-color:yellow;">'+val.customer_phone+'</span> and Message: <span style="background-color:#faebd7;">'+val.customer_message+'</span></p>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#todays_notifications_enquiry").html(content);    
                    } 
                    else
                    {
                        $("#todays_notifications_enquiry").empty(); 

                        content += '<p>No Enquiry(s)</p>';

                         $("#todays_notifications_enquiry").html(content); 
                         $(".todays_notification_count_header_enquiry").text('0');      
                    }                 
                }
                
         });
    }

    function ThisweekfeedbackNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("thisweek_enquiry_notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".thisweek_notification_count_enquiry").text(response.total);

                    	
                    	 $.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                          content += '<h4 style="color:#000;">Enquiry Notification From : '+val.customer_name+'</h4>';
                            	content += '<p>Enquiry from: <span style="background-color:yellow;">'+val.customer_name+'</span> , Email: <span style="background-color:yellow;">'+val.customer_email+'</span> , Phone: <span style="background-color:yellow;">'+val.customer_phone+'</span> and Message: <span style="background-color:#faebd7;">'+val.customer_message+'</span></p>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#thisweek_notifications_enquiry").html(content);    
                    } 
                    else
                    {
                        $("#thisweek_notifications_enquiry").empty();
                        content += '<p >No Enquiry(s)</p>';

                         $("#thisweek_notifications_enquiry").html(content);    
                    }                 
                }
                
         });
    }

    function AlldaysfeedbackNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("alldays_enquiry_notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".alldays_notification_count_enquiry").text(response.total);

                    	
                    	 $.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                          content += '<h4 style="color:#000;">Enquiry Notification From : '+val.customer_name+'</h4>';
                            	content += '<p>Enquiry from: <span style="background-color:yellow;">'+val.customer_name+'</span> , Email: <span style="background-color:yellow;">'+val.customer_email+'</span> , Phone: <span style="background-color:yellow;">'+val.customer_phone+'</span> and Message: <span style="background-color:#faebd7;">'+val.customer_message+'</span></p>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#alldays_notifications_enquiry").html(content);    
                    } 
                    else
                    {
                        $("#alldays_notifications_enquiry").empty();   

                        content += '<p >No Enquiry(s)</p>';

                         $("#alldays_notifications_enquiry").html(content); 
                    }                 
                }
                
         });
    }
    ////////////////////////////////////////////////////////////////////////////

    
    function TodaysuserNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("todays-user-notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".todays_notification_count_user").text(response.total);
                    	
                    	$(".todays_notification_count_header_user").text(response.count);

                    	$.each(response.notifications,function(key,val){

                           
                            content += '<div class="accept_job">';
                          	content += '<h4 style="color:#000;">User : '+val.name+'</h4>';
                            content += '<p>User: <span style="background-color:yellow;">'+val.name+'</span>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#todays_notifications_user").html(content);    
                    } 
                    else
                    {
                        $("#todays_notifications_user").empty(); 

                        content += '<p>No User(s)</p>';

                         $("#todays_notifications_user").html(content); 
                         $(".todays_notification_count_header_user").text(0);  
                    }                 
                }
                
         });
    }

     function ThisweekuserNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("thisweek-user-notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".thisweek_notification_count_user").text(response.total);
                    	
                    	 $.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                          	content += '<h4 style="color:#000;">User : '+val.name+'</h4>';
                            content += '<p>User: <span style="background-color:yellow;">'+val.name+'</span>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        });

                        $("#thisweek_notifications_user").html(content);    
                    } 
                    else
                    {
                        $("#thisweek_notifications_user").empty(); 

                        content += '<p>No User(s)</p>';

                         $("#thisweek_notifications_user").html(content);    
                    }                 
                }
                
         });
    }

    function  AlldayuserNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("alldays-user-notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);
                  var content = '';
                  if(response.result==1)
                    {
                    	$(".alldays_notification_count").text(response.total);

                    	
                    	 $.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                          content += '<h4 style="color:#000;">User : '+val.name+'</h4>';
                            	content += '<p>User: <span style="background-color:yellow;">'+val.name+'</span>';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#alldays_notifications_user").html(content);    
                    } 
                    else
                    {
                        $("#alldays_notifications_user").empty();   

                        content += '<p >No User(s)</p>';

                         $("#alldays_notifications_user").html(content); 
                    }                 
                }
                
         });
    }
    ////////////////////////////////////////////////////////////////

    

     function Todaysvendervendersations()
    {

        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("todays-venders-notifications")?>',
                                          
                   success:function(response){
                   response=jQuery.parseJSON(response);
                   console.log(response);
var content = '';
                   if(response.result==1)
                     {
                    	$(".todays_notification_count_vendor").text(response.total);
                    	$(".todays_notification_count_header_vendor").text(response.count);
                    	

                    	$.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                            content += '<h4 style="color:#000;">Vendors Notification From : '+val.name+'</h4>';
                            content += '<p>Vendors from: <span style="background-color:yellow;">'+val.name+'</span> , Email: <span style="background-color:yellow;">'+val.email+'</span> ';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#todays_notifications_vendor").html(content);    
                    } 
                    else
                    {
                    	$(".todays_notification_count_header_vendor").text(0);
                        content += '<p >No Vendor(s)</p>';

                         $("#todays_notifications_vendor").html(content);   
                    }                 
                 }
                
         });
    }

    function ThisweekvendersNotifications()
    {
        $.ajax({

                type   : 'get',
                url    : '<?php echo site_url("thisweek-venders-notifications")?>',
                                          
                  success:function(response){
                  response=jQuery.parseJSON(response);
                  console.log(response);

                  if(response.result==1)
                    {
                    	$(".thisweek_notification_count_vendor").text(response.total);

                    	var content = '';
                    	 $.each(response.notifications,function(key,val){

                            content += '<div class="accept_job">';
                            content += '<h4 style="color:#000;">Vendors Notification From : '+val.name+'</h4>';
                            content += '<p>Vendors from: <span style="background-color:yellow;">'+val.name+'</span> , Email: <span style="background-color:yellow;">'+val.email+'</span> ';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        }); 

                        $("#alldays_notifications_vendor").html(content);    
                    } 
                    else
                    {
                        
                         content += '<p >No Vendor(s)</p>';

                         $("#alldays_notifications_vendor").html(content);    
                    }                 
                }
                
         });
    }

    function Alldaysvendervendersations()
    {
         $.ajax({

               type   : 'get',
                url    : '<?php echo site_url("alldays-venders-notifications")?>',
                                          
                   success:function(response){
                  response=jQuery.parseJSON(response);
                   console.log(response);

                  if(response.result==1)
                    {
                     	$(".alldays_notification_count_vendor").text(response.total);

                  	var content = '';
                     	$.each(response.notifications,function(key,val){

                           content += '<div class="accept_job">';
                           content += '<h4 style="color:#000;">Vendors Notification From : '+val.name+'</h4>';
                            content += '<p>Vendors from: <span style="background-color:yellow;">'+val.name+'</span> , Email: <span style="background-color:yellow;">'+val.email+'</span> ';
                            
                            content += '<p class="time">Sent On : '+val.created_at+'</p>';
                            content += '</div>';
                        });  

                        $("#thisweek_notifications_vendor").html(content);    
                   } 
                    else
                    {
                    	content += '<p >No Vendor(s)</p>';
                         $("#thisweek_notifications_vendor").html(content);    
                   }                 
               }
                
         });
     }

