<template>
    <v-form @submit.prevent="login()">
        <v-container>
                <v-text-field type="text" v-model="form.email" label="Email*" required></v-text-field>
                <v-text-field type="password" v-model="form.password" label="Password*" required></v-text-field>
                <v-btn type="submit" color="blue">Login</v-btn>
        </v-container>
    </v-form>
</template>

<script>
    export default {
      data(){
          return{
              form : {
                  email    : "",
                  password : "",
              }
          }
      },
        methods : {
          login(){
              axios.post('/api/auth/login', this.form)
                  .then(function (response) {
                     const payload =  response.data.access_token.split(".")[1];
                     const decode  =  JSON.parse(atob(payload));
                     if ( decode.iss == "http://127.0.0.1:8000/api/auth/login" ){
                         localStorage.setItem('token',response.data.access_token);
                         localStorage.setItem('user',response.data.user);
                     }
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
          }
        }
    }
</script>

