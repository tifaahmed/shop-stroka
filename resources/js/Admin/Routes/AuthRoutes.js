import HomePage     from '../Components/Pages/Auth/index.vue'    ;

// import LoginPage           from '../Components/Pages/Auth/Login'   ;

// import ForgetPasswordPage  from '../Components/Pages/Auth/ForgetPassword' ;
// import RegisterPage        from '../Components/Pages/Auth/Register'   ;
// import ResetPasswordPage   from '../Components/Pages/Auth/ResetPassword'   ;
console.log('auth rout');

export default 
    { path : 'dashboard/auth' , name : 'Auth' , component : HomePage , children : [
        // { path: 'login'                  , component : LoginPage             , name : 'Auth.Login' } ,
        // { path: 'forgetPassword'         , component : ForgetPasswordPage    , name : 'Auth.ForgetPassword' } ,
        // { path: 'register'               , component : RegisterPage          , name : 'Auth.Register' } ,
        // { path: 'resetPassword/:email'   , component : ResetPasswordPage     , name : 'Auth.ResetPassword' } ,
    ] };