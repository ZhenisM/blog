import './bootstrap';
import '../css/app.css';

import { createApp } from "vue/dist/vue.esm-bundler";

import TestComponent from "./TestComponent.vue";

const app = createApp({
	components: {
		TestComponent
	}
});

app.mount('#app')