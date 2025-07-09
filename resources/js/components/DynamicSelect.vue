<template>
    <div>

        <div
        class="flex-1 flex-no-shrink mt-1 mb-1"
        >
            <label
                :for="selectConfig.taxonomies_one"
                class="publish-field-label mb-1"
            >
                <!-- {{ selectConfig.lb_main_select }} -->
            </label>
            <v-select
                :id="'taxonomy_one'"
                v-model="data.main_category"
                :options="firstSelectItems"
                :reduce="item => item.key"
                label="label"
                :clearable="true"
                :searchable="true"
                @input="filteredList"
            ></v-select>
        </div>

        <div
        class="flex-1 flex-no-shrink"
        v-if="secondarySelectItemsFiltered.length > 0"
        >
            <label
                :for="selectConfig.taxonomies_depend"
                class="publish-field-label mb-1"
            >
                {{ selectConfig.taxonomies_depend }}
            </label>
            <v-select
                :id="'taxonomies_depend'"
                v-model="data.child_category"
                :options="secondarySelectItemsFiltered"
                :reduce="filter => filter.key"
                label="label"
                :clearable="true"
                :searchable="true"
            ></v-select>
        </div>
    </div>
</template>

<script>
export default {
    mixins: [Fieldtype],
    data: () => ({
        selectConfig: {},
        data : {
            child_category : null,
            main_category : null,
        },
        firstSelectItems: [],
        secondarySelectItems: [],
        secondarySelectItemsFiltered: [],
    }),
    computed: {
        options: () => items,
    },
    watch:
    {
      data:
      {
        deep: true,
        handler: function (newValue, oldValue) {
          this.update(newValue);
        }
      }
    },
    methods: {
        mainConfig()
        {
            var self = this;
            self.selectConfig = self.config;
            self.data['main_category']   = null;
        },
        mainData()
        {
            var self = this;

            const url = cp_url('tresdstudioweb/dynamicselect/getFirstSelectItems');

            self.$axios
            .post(url, self.selectConfig)
            .then(items =>
            {
                self.firstSelectItems = items.data.firstTerms
                self.secondarySelectItems = items.data.depentTerm

                if(self.value['main_category'])
                {
                 self.filteredList(self.value['main_category']);
                 self.data['main_category'] = self.value['main_category'];
                 self.data['child_category'] = self.value['child_category'];
                }
            })
            .catch(error =>
            {
                console.log(error);
            });
        },
        filteredList(option)
        {
            var self = this;
            self.data.child_category = null
            self.secondarySelectItemsFiltered   = [];
            self.secondarySelectItemsFiltered   = self.secondarySelectItems.filter(opc => opc.foreing == option);
        }
    },
    mounted()
    {
      var self = this;
      self.mainConfig();
      self.mainData();
    }
};
</script>
