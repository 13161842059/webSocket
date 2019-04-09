function initWebSocket(){
    ws = new WebSocket('ws://192.168.199.113:9501/');
    ws.onopen = function() {  
        console.log("open");  
        ws.send('{"event":"#handshake","data":{"authToken":null},"cid":3}'); 
        ws.send('{"event":"#subscribe","data":{"channel":"global"},"cid":4}'); 
    }  
    ws.onmessage = function(e) { 
        if(e.data == '#1'){
            ws.send('#2'); 
        }
        try{
            var data = JSON.parse(e.data);
            if(data['data']){
                attack.add(data.data.data);
            }
        }catch(error) {

        }
    }  
    ws.onclose = function(e) {  
        console.log("closed");  
        ws.onopen();
        initWebSocket();
    }  
    ws.onerror = function(e) {  
        console.log("error");  
    } 
}

initWebSocket();