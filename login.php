  <!--Login Form-->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div style="background:#343a40; color:white;" class="modal-header">
                  <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> Login Here
                  </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white;"
                          aria-hidden="true">&times;</span></button>

              </div>
              <div class="modal-body">
                  <br>
                  <form action="" name="lfrom" method="POST">
                      <div class="input-group">
                          <span class="input-group-addon" id="sizing-addon2"><span
                                  class="glyphicon glyphicon-envelope"></span></span>
                          <input type="email" class="form-control" required name="useremail"
                              placeholder="Enter your email" aria-describedby="sizing-addon2">
                      </div><br>
                      <div class="input-group">
                          <span class="input-group-addon" id="sizing-addon2"><span
                                  class="glyphicon glyphicon-lock"></span></span>
                          <input type="password" required class="form-control" name="userpass"
                              placeholder="Enter your password" aria-describedby="sizing-addon2">
                      </div>
                      <div>
                          <a style="font-family:calibri; float:right;" href="signup.php">New User?</a>
                          <!--<a style="font-family:calibri;" href="forgetpass.php">Forget Password?</a>-->
                      </div>
                      <div>
                          <input type="checkbox" name="remember" /> Remember me?</input>
                          <center><input type="submit" value="Login" name="btn_login" class="btn btn-success"></center>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!--Login form end-->