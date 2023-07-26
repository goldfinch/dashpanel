import cfg from '@/app.config.js'

import { createApp } from 'vue'
import { createPinia } from 'pinia';
import { plugin, defaultConfig } from '@formkit/vue'
import customConfig from './formkit.config.js'
import AppDashpanel from './App.vue'

const pinia = createPinia();

let dashpanelRef = '[goldfinch-dashpanel]';

const dashpanel = document.querySelector(dashpanelRef);

if (dashpanel) {

  const app = createApp(AppDashpanel, { ...dashpanel.dataset });

  app.provide('cfg', cfg.public)

  app
    .use(pinia)
    .use(plugin, defaultConfig(customConfig))
    .mount(dashpanelRef);

}
