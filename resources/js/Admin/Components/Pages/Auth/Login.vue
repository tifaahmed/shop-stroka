<template>

    <div >
        <p id="text" style="color:green; margin-left:100px;"></p>
        <!-- <form action="#"> -->
            <div class="form-group">

                <label>Email Or Phone</label> 
                <input   class="form-control" placeholder="Enter your email or phone" type="text">

            </div>
            <div class="form-group">

                <label>الرقم السري</label> 
                <input   class="form-control" placeholder="Enter your password" type="password">

            </div>

            <button type="submit" class="btn btn-main-primary btn-block">
                الدخول
            </button>
            <div class="row row-xs">
                <!-- <div class="col-sm-6">
                    <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                </div> -->
                <!-- <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                    <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                </div> -->
            </div>

        <!-- </form> -->
    </div>
</template>
<script>


    export default {
        mounted() {
            console.log( 'login page ' )
        },

   }


</script>