// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: [
  '@nuxtjs/tailwindcss',
  'nuxt-icon',
  '@pinia/nuxt',
  '@pinia-plugin-persistedstate/nuxt'] ,

  app: {
    head:{
      script: [
        {          src: 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB5vf7SBiC6mcZJRH8sWw99ZwlC6zDss7o&libraries=places'      }
      ]
    }
  }


  
})
