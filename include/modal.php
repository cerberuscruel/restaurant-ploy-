<!--Login-->

<div class="container">
<form method="post" id="frm">   
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><span class="glyphicon glyphicon-lock"></span> Login</h3>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <!--<p>Not a member? <a id="myRegis">Sign Up</a></p>-->
          <!--<p>Forgot <a href="#">Password?</a></p>-->
        </div>
      </div>
      
    </div>
  </div> 
</div>
 

</form>
    </div>
    <!-- /.Login -->


    <!--Registration -->

<div class="container">
<form method="post" id="frmregis">   
  <!-- Modal -->
  <div class="modal fade" id="regis" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><span class="glyphicon glyphicon-list-alt"></span> Registration </h3>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
             <div class="form-group">
              <label for="iduser"><span class="glyphicon glyphicon-king"></span> รหัสประจำตัวประชาชน</label>
              <input type="text" required="required" class="form-control" id="iduser" placeholder="Enter ID">
            </div>
            <div class="form-group">
              <label for="userfullname"><span class="glyphicon glyphicon-education"></span> Name</label>
              <input type="text" required="required" class="form-control" id="usrfullname" placeholder="Enter FullName">
            </div>
            <div class="form-group">
              <label for="useraddress"><span class="glyphicon glyphicon-home"></span> Address</label>
              <textarea type="text" required="required" class="form-control" id="useraddress" placeholder="Enter Address"></textarea>
            </div>
            <div class="form-group">
              <label for="useremail"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="email" required="required" class="form-control" id="useremail" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="userphone"><span class="glyphicon glyphicon-phone"></span> Phonenumber</label>
              <input type="text" required="required" pattern="[0-9]{10}" class="form-control" id="userphone" placeholder="Enter Phonenumber">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" required="required" class="form-control" id="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" required="required" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Registration </button>
          </form>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 

</form>
    </div>
    <!-- /.Registration  -->