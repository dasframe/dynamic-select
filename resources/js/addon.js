import DynamicSelect from './components/DynamicSelect.vue'

Statamic.booting(() => {
    Statamic.$components.register('dynamic_select-fieldtype', DynamicSelect);
});
