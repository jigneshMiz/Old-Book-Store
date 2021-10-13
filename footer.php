<div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Pages</h4>
            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Terms and conditions</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
            <hr>
            <h4 class="mb-3">User section</h4>
            <ul class="list-unstyled">
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Regiter</a></li>
            </ul>
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Top categories</h4>
            <h5>Computer</h5>
            <ul class="list-unstyled">
              <li><a href="#">Java</a></li>
              <li><a href="#">C/C++</a></li>
              <li><a href="#">PHP</a></li>
            </ul>
            <h5>Old Books</h5>
            <ul class="list-unstyled">
              <li><a href="#">Novel</a></li>
              <li><a href="#">Physics</a></li>
              <li><a href="#">Chemistry</a></li>
              <li><a href="#">Mathamatics</a></li>
            </ul>
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Where to find us</h4>
            <p><strong>Old Books Stall Ltd.</strong><br>S.S Engineering College<br>Bhavnagar,Sidsar-364060,<br>Gujarat,<br><strong>India</strong></p>
            <hr class="d-block d-md-none">
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <!--<h4 class="mb-3">Also Search here</h4>
            
            <form action="search.php">
              <div class="input-group">
                <input type="text" class="form-control" name="user_query"><span class="input-group-append">
                  <button type="submit" class="btn btn-outline-secondary">Search</button></span>
              </div>
              <!-- /input-group
            </form>-->
            <hr>
            <h4 class="mb-3">Stay in touch</h4>
            <p class="social">
              <a href="#" class="facebook external"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="twitter external"><i class="fab fa-twitter"></i></a>
              <a href="#" class="instagram external"><i class="fab fa-instagram"></i></a>
              <!--<a href="#" class="gplus external"><i class="fab fa-google-plus"></i></a>
              <a href="#" class="email external"><i class="far fa-envelope"></i></a>--></p>
          </div>
        
        </div>
       
      </div>
     
    </div>

    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">Copyright &copy; 2020 <b>OldBookStall.com </b>All Rights Reserved
          </div>
          
        </div>
      </div>
    </div>
<script>

function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function myDropFunc() {
  var x = document.getElementById("drop");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}


function pas() {
  var x = document.getElementById("pa");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


</script>

    

</body>
</html>