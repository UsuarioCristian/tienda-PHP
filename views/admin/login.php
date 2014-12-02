<div id="login-overlay" class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Sign in</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-8">
                  <form id="loginForm" method="POST" action="index.php?rt=admin/loginAdmin" novalidate="novalidate">
                      <div class="form-group">
                          <label for="username" class="control-label">Username Admin</label>
                          <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group">
                          <label for="password" class="control-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                          <span class="help-block"></span>
                      </div>
                      <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                      <button type="submit" class="btn btn-success btn-block">Login</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>