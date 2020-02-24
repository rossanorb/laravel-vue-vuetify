<template>
  <v-app class="login">
    <v-content>
      <v-form>
        <v-row justify="space-around">
          <span>
            <v-icon x-large centered>account_circle</v-icon>
            <h3>Login</h3>
          </span>
        </v-row>
        <v-row>
          <v-text-field name="email" label="E-mail" v-model="form.username" required></v-text-field>
          <v-text-field
            name="name"
            label="Enter your password"
            hint="At least 6 characters"
            min="6"
            :type="'password'"
            v-model="form.password"
          ></v-text-field>

          <v-btn block tile @click="submit()" color="primary">submit</v-btn>
        </v-row>
      </v-form>
    </v-content>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      form: {}
    };
  },
  methods: {
    submit() {
      this.$passport.accessToken(this.form, this.$router);      
    }
  }
};
</script>

<style>
* {
  box-sizing: border-box;
}

.login h1,
.login h3 {
  font-weight: 300;
  font-size: 1em;
}

#app.login {
  background: #6685ff;
}

.login .v-content__wrap {
  display: flex;
  align-items: center;
  justify-content: center;
}

.login form {
  width: 380px;
  margin: 4em auto;
  padding: 3em 2em 2em 2em;
  background: #fafafa;
  border: 1px solid #ebebeb;
  box-shadow: rgba(0, 0, 0, 0.14902) 0px 1px 1px 0px,
    rgba(0, 0, 0, 0.09804) 0px 1px 2px 0px;
}
</style>