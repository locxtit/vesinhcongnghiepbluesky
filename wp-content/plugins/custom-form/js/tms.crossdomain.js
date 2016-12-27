jQuery(function ($) {

            if (typeof window.addEventListener != 'undefined') {
                window.addEventListener('message', handleDataCrossDomain, false);
            }
            else if (typeof window.attachEvent != 'undefined') {
                window.attachEvent('onmessage', handleDataCrossDomain);
            }
  });

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
		if (handleType != undefined  && handleType != "" && handleType !== 'handleType') {
		    switch(handleType) {
			case "ResizeTourIFrame":
			    var iframe = document.getElementById('searchTourResultIframe');
			    var h = querySt("if_height", messageEvent.data);
			    var w = querySt("if_width", messageEvent.data);
			    if (!isNaN(h) && h > 0 && h !== 'if_height') {
					iframe.setAttribute('height', h + "px");
					//jQuery('html, body').animate({scrollTop: 0}, 200);
					
			    }
			    if (!isNaN(w) && w > 0 && h !== 'if_width') {
			       iframe.setAttribute('width', w + "px");
			    }
			    break;
			case "ResizeIFrame":
			    
			    var id = querySt("if_id", messageEvent.data);
				var h = querySt("if_height", messageEvent.data);
			    var w = querySt("if_width", messageEvent.data);
				var iframe = document.getElementById(id);
			    if (!isNaN(h) && h > 0 && h !== 'if_height') {
					iframe.setAttribute('height', h + "px");
					//jQuery('html, body').animate({scrollTop: 0}, 200);
					
			    }
			    
			    break;
			case "SearchTour":
			debugger;
				var locationCurrent = location.href;
				var arrayTemp = locationCurrent.split('/');
				domainCurrent = arrayTemp[0]+'//'+arrayTemp[2];
				
				var redirectUrl = domainCurrent+'/chon-tour';
				url = querySt("url", messageEvent.data);
				redirectUrl += '/?' + decodeURIComponent(url);
				window.location.href = redirectUrl;
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