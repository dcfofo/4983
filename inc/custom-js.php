<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/active-script.js"></script>
<script>
// document.getElementById("open-items").style.display = "true";
// document.getElementById("closed-items").style.display = "none";
// document.getElementById("shops").style.display = "none";
// document.getElementById("component-history").style.display = "none
  // $("#closed-items-nav").click(function(){
  //   $("#open-items").hide()
  //   $("#shops").hide()
  //   $("#component-history").hide()
  //     $("#closed-items").show();
  // });
  // $("#open-items-nav").click(function(){
  //   $("#closed-items").hide()
  //   $("#shops").hide()
  //   $("#component-history").hide()
  //     $("#open-items").show();
  // });
  // $("#shops-nav").click(function(){
  //   $("#closed-items").hide()
  //   $("#open-items").hide()
  //   $("#component-history").hide()
  //     $("#shops").show();
  // });
  // $("#component-history-nav").click(function(){
  //   $("#closed-items").hide()
  //   $("#open-items").hide()
  //   $("#shops").hide()
  //     $("#component-history").show();
  // });
  function showUser(str) {
      if (str == "") {
          document.getElementById("search_result").innerHTML = "";
          return;
      } else { 
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("search_result").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","getuser.php?q="+str,true);
          xmlhttp.send();
      }
  }
</script>