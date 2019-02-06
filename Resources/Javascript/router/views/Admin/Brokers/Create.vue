<template>
  <div>
    <h4 class="mb-3">
      Nuevo Broker
    </h4>
    <BrokerForm 
      :method="'post'" 
      :action="'/api/brokers'"
    />
  </div>
</template>

<script>
export default {
    data() {
        return {
            alreadyCreated: false,
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminBrokersCreate" && this.alreadyCreated === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("brokers/reset"),
            this.$store.dispatch("brokers/fetchOneBroker", this.$route.params.id),
            this.$store.dispatch("projects/fetchAllProjects")
        },
    }
}
</script>
