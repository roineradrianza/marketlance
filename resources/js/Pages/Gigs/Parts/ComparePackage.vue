<template>
  <div class="hidden md:block">
    <h3 class="card-title text-left text-2xl px-10 mb-1">Compare package</h3>
    <div class="grid grid-cols-12 gap-6 py-5 px-10">
      <div class="col-span-4" v-for="(gig_package, i) in packages" :key="i">
        <div class="card border p-2">
          <div class="card-title">
            {{ gig_package.name }}
          </div>
          <p class="uppercase text-sm mb-4">
            {{ gig_package.excerpt }}
          </p>
          <p class="flex justify-center">
            <ClockIcon class="h-5 w-5" />
            <span>
              {{ gig_package.delivery_time }}
              {{ gig_package.delivery_time > 1 ? "Days" : "Day" }}
              Delivery
            </span>
          </p>
          <p class="flex justify-center">
            <RefreshIcon class="h-5 w-5" />
            <span>
              {{
                gig_package.revisions < 0 ? "Unlimited" : gig_package.revisions
              }}
              Revisions
            </span>
          </p>
          <div class="justify-center card-actions">
            <button class="btn btn-outline text-md">
              Continue {{ price(gig_package.price) }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { ClockIcon, RefreshIcon } from "@heroicons/vue/solid";

export default defineComponent({
  components: {
    ClockIcon,
    RefreshIcon,
  },

  props: {
    packages: Array,
  },

  data() {
    return {
      openTab: 1,
    };
  },

  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber;
    },
    price: function (num) {
      return "$ " + parseFloat(num).toFixed(2);
    },
  },
});
</script>
