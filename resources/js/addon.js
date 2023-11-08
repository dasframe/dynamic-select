import DynamicSelect from '../dist/components/DynamicSelect.vue'

Statamic.booting(() => {
    Statamic.$components.register('dynamic_select-fieldtype', DynamicSelect);
});
