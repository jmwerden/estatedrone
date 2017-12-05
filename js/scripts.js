$(document).ready(function(){
$.ajax({ url: "http://www.zillow.com/webservice/GetZestimate.htm?zws-id=X1-ZWz1g4xqtmjabv_3z9zt&zpid=48749425",
        context: document.body,
        success: function(){
           alert("done");
        }});
})
