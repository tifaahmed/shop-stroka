<template>
    <!-- Page -->
    <div class="page">

        <!-- main-sidebar -->
        <SideBarRight
            :PropLogo = logo
        /> 
        <!-- main-sidebar -->

        <!-- main-header opened -->
        <div class="main-content app-content">
            <NavBar
            :PropLogo = logo
            /> 
             

            <router-view></router-view>
       </div>
       <SideBarLeft/> 

    </div>


</template>
<script>
import SideBarRight from 'AdminPartials/SideBarRight.vue' ;
import SideBarLeft from  'AdminPartials/SideBarLeft.vue' ;
import NavBar from       'AdminPartials/NavBar.vue' ;

import SiteSettingModel     from 'AdminModels/SiteSettingModel';

// import jwt   from 'MainServices/jwt' ;
// import RolePermision   from 'MainServices/RolePermision' ;
// import UserModel   from 'AdminModels/User' ;

    export default {
        mounted() {
            console.log( ' admin layout ' );
            // this.RolePermision();
            this.initial();

        },
        data( ) { return {
			logo : null
        } } ,
          
        components:{
            SideBarRight,
            NavBar,
            SideBarLeft
        },
        methods : {
            async initial( ) {
            	this.logo  = ((await this.Show(1)).data.data[0]).item ;
				console.log( this.logo );

        	},
        //     show(UserId) {
        //         return (new UserModel).show( UserId);
        //     },

        //     async RolePermision( ) {

        //        var user = await this.show( jwt.User.id);
        //        RolePermision.SetUserRolesPermissions(user.data.data.UserModel)
        //     }
			// model
            async Show(id) {
					return await ( (new SiteSettingModel).show(id) )
				},
			// model
        }
        
    }
</script>