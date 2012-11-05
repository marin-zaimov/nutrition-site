

<h3>Create a New User</h3>

<p>To create a new account enter your information below. You will recieve and email to confirm your account.</p>

<form class="user-form form-horizontal" name="input" action="newUser" method="post">
  
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" name="User[email]" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPw">Password</label>
    <div class="controls">
      <input type="password" name="User[password]" id="inputPw" placeholder="Password"><br>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPwConfirm">Confirm Password</label>
    <div class="controls">
      <input type="password" name="User[cPassword]" id="inputPwConfirm" placeholder="Confirm Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFName">First Name</label>
    <div class="controls">
      <input type="text" name="User[firstName]" id="inputFName" placeholder="First Name">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputLName">Last Name</label>
    <div class="controls">
      <input type="text" name="User[lastName]" id="inputLName" placeholder="Last Name">
    </div>
  </div>
  
  <input class="btn btn-primary" type="submit" value="Submit">
<form>

