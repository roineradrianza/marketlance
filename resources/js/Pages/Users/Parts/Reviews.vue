<template>
  <div class="col-span-12">
    <h2 class="card-title">
      Reviews as <span class="capitalize">{{ AsType }}</span>
    </h2>
  </div>
  <div
    class="card shadow-lg mb-6"
    v-for="(rating, i) in totalFiltered"
    :key="i"
  >
    <div class="flex-row items-center space-x-4 card-body">
      <div>
        <div class="avatar">
          <div class="rounded-full w-14 h-14 shadow">
            <img :src="rating[UserType][0].profile_photo_path" />
          </div>
        </div>
      </div>
      <div>
        <h2 class="card-title">{{ rating[UserType][0].name }}</h2>
        <div class="flex flex-row">
          <StarIcon class="h-5 w-5" v-for="i in rating.rating" :key="i" />
          {{ rating.rating }}
        </div>
        <p>{{ rating.comment }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { StarIcon } from "@heroicons/vue/solid";

export default defineComponent({
  components: {
    Link,
    StarIcon,
  },

  props: {
    current: Array,
    buyer_ratings: Array,
    seller_ratings: Array,
  },

  data() {
    return {
      rating_type: "seller_ratings",
      totalFiltered: [],
    };
  },

  computed: {
    UserType() {
      return this.rating_type == "buyer_ratings" ? "seller" : "buyer";
    },
    AsType() {
      return this.rating_type == "buyer_ratings" ? "Buyer" : "Seller";
    }
  },

  methods: {
    filterPage() {
      this.totalFiltered = [...Array(15).keys()].map(
        (i) => this[this.rating_type][i]
      );
    },
  },
  created() {
    this.filterPage();
  },
});
</script>