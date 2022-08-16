<template>

    <div>
        <!-- main-sidebar -->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll">
            <div class="main-sidebar-header active" style="padding: 0;">
                <a class="desktop-logo logo-light active" href="#"><img :src="'/images/logo.png'" class="main-logo" alt="logo" style="height: 60px;"></a>
                <a class="desktop-logo logo-dark active" href="#"><img :src="'/images/logo.png'" class="main-logo dark-theme" alt="logo" style="height: 60px;"></a>
                <a class="logo-icon mobile-logo icon-light active" href="#"><img :src="'/images/logo.png'" class="logo-icon" alt="logo" style="height: 60px;"></a>
                <a class="logo-icon mobile-logo icon-dark active" href="#"><img :src="'/images/logo.png'" class="logo-icon dark-theme" alt="logo" style="height: 60px;" ></a>
            </div>
            <div class="main-sidemenu" style="overflow: scroll;">
                <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body">
                        <div class="">
                            <img alt="user-img" class="avatar avatar-xl brround">
                        </div>
                        <div class="user-info">
                            <h4 class="font-weight-semibold mt-3 mb-0">atfaluna</h4>
                            <span class="mb-0 text-muted"> </span>
                        </div>
                    </div>
                </div>


            </div>
        </aside>
    </div>
</template>
<!-- main-sidebar -->

<script>
// import jwt   from './../../Services/jwt' ;
// jwt.User
    export default {

        mounted() {
            console.log( 'side_bar_right ' )
            // console.log( jwt.User )
        },
        // data( ) { return {
        //     User :jwt.User ,
        //     logo: ''

        // } } ,

        
    }
</script>