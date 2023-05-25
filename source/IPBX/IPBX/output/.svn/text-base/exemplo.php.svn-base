<script type="text/javascript">
var http = false;

if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
}

function dial(origem, destino) {
  http.abort();
  http.open("GET", "dial.php?origem=" + origem + "&destino=" + destino, true);
  http.onreadystatechange=function() {
   if(http.readyState == 4) {
     document.getElementById('foo').innerHTML = http.responseText;
   }

  }
  http.send(null);
}
</script>

<h1>TESTE</h1>

<form>
  
  
  <button type="button" onclick="dial(7914,7736)">Discar</button>
  <div id="foo"></div>
</form>
