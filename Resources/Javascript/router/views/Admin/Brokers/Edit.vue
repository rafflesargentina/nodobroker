<template>
  <div>
    <h4>
      Editar Broker: {{ strLimit(oneBroker.name) }}
    </h4>
    <BrokerForm 
      :method="'put'" 
      :action="'/api/brokers/' + this.$route.params.id"
    />
  </div>
</template>

<script>
import { brokersComputed } from "../../../../store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    data() {
        return {
            alreadyCreated: false,
        }
    },

    computed: {
        ...brokersComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminBrokersEdit" && this.alreadyCreated === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("brokers/fetchOneBroker", this.$route.params.id),
            this.$store.dispatch("projects/fetchAllProjects")
        },

        strLimit,
    }
}
</script>
