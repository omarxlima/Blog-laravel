import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

createInertiaApp({
  title: (title) => (title ? `${title} - Developer Lima` : 'Developer Lima'),
  resolve: (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue');
    return pages[`./Pages/${name}.vue`]();
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) }).use(plugin);
    app.config.globalProperties.route = route;
    app.mount(el);
  },
});
