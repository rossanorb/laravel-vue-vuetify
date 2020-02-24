import Vue from 'vue';
import Vuetify from 'vuetify/lib';
import colors from 'vuetify/lib/util/colors';
import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader
Vue.use(Vuetify);

export default new Vuetify({
    iconfont: 'md',
    theme: {
        themes: {
          light: {
            primary: colors.indigo.darken1, // #E53935
            secondary: colors.indigo.darken4, // #FFCDD2
            accent: colors.indigo.base, // #3F51B5
            btn: colors.pink.darken1            
          },
        },
      },   
});