import './bootstrap'

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

// ======================
// VUE SETUP
// ======================
import { createApp } from 'vue'
import router from './router'

// Root Vue App
const app = createApp({})

// Router use
app.use(router)

// Mount Vue
app.mount('#app')
