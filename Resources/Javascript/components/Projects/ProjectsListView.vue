<template>
  <div v-if="items.length > 0">
    <div
      v-for="(item, index) in items"
      :key="item.id"
      class="row mb-4"
    >
      <div class="col-md-12">
        <div class="property-entry horizontal d-lg-flex">
          <a
            href="#"
            class="property-favorite"
          >
            <span class="icon-heart-o" />
          </a>
          <RouterLink
            :class="{'order-1': index % 2 === 0 }"
            :to="{ name: 'ProjectsShow', params: { id: item.id }}""
            class="property-thumbnail h-100"
          >
            <div
              v-if="item.offer_types.length > 0"
              class="offer-type-wrap"
            >
              <span
                v-for="offerType in item.offer_types"
                :key="offerType.id"
                :class="offerType.color"
                class="offer-type"
              >
                {{ offerType.name }}
              </span>
            </div>
            <img
              :src="item.featured_photo.url"
              alt="Image"
              class="img-fluid"
            >
          </RouterLink>

          <div class="p-4 property-body w-100">
            <h2 class="property-title">
              <RouterLink :to="{ name: 'ProjectsShow', params: { id: item.id }}">
                {{ item.name }}
              </RouterLink>
            </h2>
            <span class="property-location d-block mb-3">
              <span class="property-icon icon-room" /> {{ item.location }}
            </span>
            <strong class="property-price text-primary mb-3 d-block text-success">
              {{ item.base_price }}
            </strong>
            <div
              class="mb-4"
              v-html="item.description"
            />
            <ul class="property-specs-wrap mb-3 mb-lg-0">
              <li>
                <span class="property-specs">
                  Sup. total
                </span>
                <span class="property-specs-number">
                  {{ item.total_area }}<sup>mt2</sup>
                </span>
              </li>
              <li v-if="item.water === '1'">
                <span class="property-specs">
                  Agua
                </span>
                <span class="property-specs-number">
                  <span class="icon-check" />
                </span>
              </li>
              <li v-if="item.gas === '1'">
                <span class="property-specs">
                  Gas
                </span>
                <span class="property-specs-number">
                  <span class="icon-check" />
                </span>
              </li>
              <li v-if="item.light === '1'">
                <span class="property-specs">
                  Luz
                </span>
                <span class="property-specs-number">
                  <span class="icon-check" />
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { strLimit } from "@/utilities/helpers"

export default {
    name: "ProjectsListView",

    props: {
        items: {
            default: ()=> [],
            required: true,
            type: Array
        }
    },

    methods: {
        strLimit
    }
}
</script>
