<template>

    <div class="col-md-9 col-lg-7 col-xl-7 mx-auto">
        <form action="/login" method="post" class="my-4">
                    <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form1Example13" class="form-control form-control-lg" name="email">
              <label class="form-label" for="form1Example13" style="margin-left: 0px;">Email address</label>
            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>
          
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form1Example23" class="form-control form-control-lg" name="password">
              <label class="form-label" for="form1Example23" style="margin-left: 0px;">Password</label>
            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64px;"></div><div class="form-notch-trailing"></div></div></div>
          
            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked="">
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="#!">Forgot password?</a>
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
            </div>
            
            <a class="btn btn-primary btn-lg btn-block" style="background-color: rgb(59, 89, 152); --darkreader-inline-bgcolor:#2f477a;" href="#!" role="button" data-darkreader-inline-bgcolor="">
              <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
            </a>
            <a class="btn btn-primary btn-lg btn-block" style="background-color: rgb(85, 172, 238); --darkreader-inline-bgcolor:#0f5b94;" href="#!" role="button" data-darkreader-inline-bgcolor="">
              <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>
        </form>
    </div>
        
</template>

<script>
    
    export default {

    }

</script>

<style>

</style>