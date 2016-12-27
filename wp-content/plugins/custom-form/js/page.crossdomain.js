jQuery(function ($) {

	jQuery("#btnSearchbRecordCode").click(function(){
			searchBookingRecord();

	});
            if (typeof window.addEventListener != 'undefined') {
                window.addEventListener('message', handleDataCrossDomain, false);
            }
            else if (typeof window.attachEvent != 'undefined') {
                window.attachEvent('onmessage', handleDataCrossDomain);
            }
  });
function searchBookingRecord()
{
	var bRecordCode=jQuery('#bRecordCode').val();
	var email=jQuery("#email").val();
	var urlportal=jQuery('#airlinePortalSearchResultUrl').val();
	urlportal=urlportal.substring(0, urlportal.lastIndexOf("/"));
	var airlineportal=jQuery("#airlinePortalOptionUrl").val();
		jQuery.ajax({
                url: airlineportal+'Home/SearchBookingRecord',
                type: 'POST',
                data: { bRecordCode: bRecordCode, email: email },
				dataType:'json',
                success: function (response) {
                    if (response.Success) {
                        window.location = urlportal+"/bookingrecord-result/?bRecordCode="+bRecordCode+"&email="+email+"";
                    } else {
                        alert(response.Message);
                    }
                },
				error:function(){
					alert("Error");
				} 
            });
		

}
	function querySt(param, e) {
                gy = e.split("&");
                for (i = 0; i < gy.length; i++) {
                    ft = gy[i].split("=");
                    if (ft[0] == param) {
                        return ft[1];
                    }
                }
        };
	    
	function handleDataCrossDomain(messageEvent) {
		var handleType = querySt("handleType", messageEvent.data);
		var scrollTop = querySt("scrollTop", messageEvent.data);
		if (handleType != undefined  && handleType != "" && handleType !== 'handleType') {
		    switch(handleType) {
			case "ResizeIFrame":
			
			var iframe = document.getElementById('selectFlightIframe');
				if(iframe == null)
					iframe = document.getElementById('boxSearchIframe');
				if(scrollTop!=undefined&& scrollTop!=""&&scrollTop==0)
				{
					var h = querySt("if_height", messageEvent.data);
					var w = querySt("if_width", messageEvent.data);	     
					if (!isNaN(h) && h > 0 && h !== 'if_height') {
						iframe.setAttribute('height', h + "px");
						
					}
					// if (!isNaN(w) && w > 0 && h !== 'if_width') {
					   // iframe.setAttribute('width', w + "px");
					// }
					
					iframe.setAttribute('width', '100%');
				}
				else
				{
					var h = querySt("if_height", messageEvent.data);
					var w = querySt("if_width", messageEvent.data);	     
					if (!isNaN(h) && h > 0 && h !== 'if_height') {
						iframe.setAttribute('height', h + "px");
						jQuery('html, body').animate({scrollTop: 0}, 200);
						
					}
					// if (!isNaN(w) && w > 0 && h !== 'if_width') {
					   // iframe.setAttribute('width', w + "px");
					// }
					iframe.setAttribute('width', '100%');
				}
			    break;
			case "SearchFlight":		
				var url = jQuery('#airlinePortalSearchResultUrl').val();
				//var url='<?php echo $airline_portal_search_result_url; ?>';
				url += "/?"+messageEvent.data;
				url += "&requesturl="+ document.location.href;
				window.location.href = url;
			    break;
			case "BookSearchResult":
				var url = jQuery('#airlinePortalSearchResultUrl').val();
				url=url.substring(0, url.lastIndexOf("/"));
				url += "/bookingrecord-result/?"+messageEvent.data;
				url += "&requesturl="+ document.location.href;
				window.location.href = url;
				break;
			case "ScrollTo":
				var to = querySt("to", messageEvent.data);
				var iframe = jQuery('#selectFlightIframe');
					if(iframe.length < 0)
						iframe = jQuery('#boxSearchIframe');
					window.scrollTo(0, iframe.offset().top + parseInt(to));
				break;
			case "RedirectUrl":
				var url = decodeURIComponent(querySt("url", messageEvent.data));
				if(url.indexOf('http') < 0)
				{
					var locationCurrent = location.href;
					var arrayTemp = locationCurrent.split('/');
					domainCurrent = arrayTemp[0]+'//'+arrayTemp[2];
					if(url.length>0)
						url = domainCurrent + (url[0] == '/'?'':'/') + url;
				}
				window.location.href = url;
			    break;
			
			}
		}
    }