<template>
  <div>
    <h4>
      Editar Broker: {{ shortenTitle(oneBroker.name) }}
    </h4>
    <BrokerForm 
      :method="'put'" 
      :action="'/api/brokers/' + this.$route.params.id"
    />
  </div>
</template>

<script>
import { projectsMethods, brokersMethods, brokersComputed } from "../../../../store/helpers"
import { strLimit } from "@/utilities/helpers"
import store from "@/store"

export default {

    computed: {
        ...brokersComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "BrokersEdit") {
                return this.prepareComponent()
            }
        }
    },
    created() {
        return this.prepareComponent()
    },

    methods: {
        ...projectsMethods,
        ...brokersMethods,

        prepareComponent() {
            return store.dispatch("brokers/fetchOneBroker", this.$route.params.id),
            store.dispatch("projects/fetchAllProjects")
        },

        shortenTitle(value) {
            return strLimit(value)
        }
    }
}
</script>
