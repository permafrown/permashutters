<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy; permafrown | 2017</span>
    </div>
</footer>

<div class="modal fade" id="credModal" tabindex="-1" role="dialog" aria-labelledby="credModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="credModalTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
            <input type="hidden" id="loginActive" name="loginActive" value="1">
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <!-- <button type="submit" class="btn btn-outline-dark">Login</button> -->
          </form>
      </div>
      <div class="modal-footer">
          <!-- <a class="btn btn-outline-dark" id="toggleLogin">Sign Up?</a> -->
        <button type="button" class="btn btn-outline-dark mr-auto" data-dismiss="modal">Close</button>
        <button type="button" id="toggleLogin" class="btn btn-outline-dark">SignUp?</button>
        <button type="button" id="loginSignupButton" class="btn btn-dark">Login</button>
      </div>
    </div>
  </div>
</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <script>

            $("#toggleLogin").click(function() {
                if ($("#loginActive").val() == "1") {
                    $("#loginActive").val("0");
                    $("#credModalTitle").html("Sign Up");
                    $("#loginSignupButton").html("Sign Up");
                    $("#toggleLogin").html("Login?");
                } else {
                    $("#loginActive").val("1");
                    $("#credModalTitle").html("Login");
                    $("#loginSignupButton").html("Login");
                    $("#toggleLogin").html("Sign Up?");
                }
            })

            $("#loginSignupButton").click(function() {
                $.ajax({
                    type: "POST",
                    url: "actions.php?action=loginSignup",
                    data: "email=" + $("#email").val()
                     + "&password=" + $("#password").val()
                      + "&loginActive=" + $("#loginActive").val(),
                    success: function(result) {
                        console.log(result)
                        }
                });
            })

        </script>

    </body>
</html>
