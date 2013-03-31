<html>
<head>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type ="text/javascript">
var emailer = 'none'
$(document).ready(function(){
alert("sad");
$.ajax({
  url: 'jsonphp.php',
  type: 'post',
  dataType: 'json',
  data: {
    num: 'sdsd',
	add:'asads',

  },
success:function(data){
$.getJSON('jsonphp.php', function(response) {
var len = response[0].length;
alert(len);
var i = 1;var j = 1;
$("#wrap_rec").html('<h1>hi mama</h1>');

for(j=0;j<len;j++){
var newDiv = $(document.createElement('div'))
      .attr("id", 'ema'+(j+1)).attr("style","display:inline");
	  alert(i+j+1);
	  
	var newDiv1 = $(document.createElement('div'))
      .attr("id", 'accept'+(j+1)).attr("style","display:inline").attr("class",'accept');
	var newDiv2 = $(document.createElement('div'))
      .attr("id", 'reject'+(j+1)).attr("style","display:inline").attr("class",'reject');	  
 newDiv.html('<br>New request from '+response[0][j]+'<br>');
  newDiv1.html('<br>Accept');
   newDiv2.html('Reject<br>');
 newDiv.appendTo('#wrap_rec');
 newDiv1.appendTo('#wrap_rec');
 newDiv2.appendTo('#wrap_rec');

//alert(response[0]) 
 }
 emailer = response;
 alert(emailer);


    //$("#wrap_rec").html(response[1][1]);   // john doe
}); 
}
});
});

</script>

<script type ="text/javascript">
$(document).on("click",".accept",function(event){
var uid = this.id;
var hide_rej = uid.substring(6);
var ema = emailer[0][hide_rej-1];
var rid = emailer[1][hide_rej-1];
//alert(uid);
$.ajax({
  url: 'calc.php',
  type: 'post',
  dataType: 'json',
  data: {
    num: ema,
	add: rid,

  },
  success: function(data) {
    $('#'+uid).html( '<br>'+data.result+'<br>');
	var hide_rej = uid.substring(6);
	$('#'+uid).hide(2000, function () {$(this).remove(); });
	$('#reject'+hide_rej).html('');
	$('#ema'+hide_rej).html('');
	//alert(uid.substring(6))
  }
      });

});
</script>




<script type ="text/javascript">
$(document).on("click",".reject",function(event){
var username = 'gurupara';
var uid = this.id;
var hide_rej = uid.substring(6);
var rid1 = emailer[1][hide_rej-1];
//alert(uid);
$.ajax({
  url: 'reject.php',
  type: 'post',
  dataType: 'json',
  data: {
    add:rid1,

  },
  success: function(data) {
    $('#'+uid).html( '' );
	
	$('#accept'+hide_rej).hide('slow');
	$('#ema'+hide_rej).hide('slow');
	//$('#accept'+hide_rej).hide(2000, function () {$(this).remove(); });
	//alert(uid.substring(6))
  }
      });

});
</script>
<body>
Hello!
<br><br>
<div id = "wrap_req">
Email ID<input type = "text" id = "requester" onKeyup="email_avail()">
<div id ="subm"></div>
<input type ="submit" id ="submit" disabled="true" onclick = "send_req()">
</div>
<div id = "wrap_rec">

</div>
<div id = "cq" class = "accept">

</div>
</body>
</head>
</html>