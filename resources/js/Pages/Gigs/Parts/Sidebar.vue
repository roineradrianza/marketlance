<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
        <li
          class="-mb-px mr-2 last:mr-0 flex-auto text-center"
          @click="toggleTabs(i)"
          v-for="(gig_package, i) in packages"
          :key="i"
        >
          <a
            class="
              text-xs
              font-bold
              uppercase
              px-5
              py-3
              shadow-lg
              rounded
              block
              leading-normal
            "
            :class="{
              'text-white bg-base-200': openTab !== i,
              'text-base-200 bg-white': openTab === i,
            }"
          >
            {{ gig_package.name }}
          </a>
        </li>
      </ul>
      <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 rounded"
      >
        <div class="px-4 py-5 flex-auto">
          <div
            class="tab-content tab-space"
            v-for="(gig_package, i) in packages"
            :key="i"
          >
            <div :class="{ hidden: openTab !== i, block: openTab === i, 'pt-4': true }">
              <p class="text-right text-xl">{{ price(gig_package.price) }}</p>
              <p class="text-lg">
                {{ gig_package.name }}
              </p>
              <p class="uppercase">
                {{ gig_package.excerpt }}
              </p>
              <div class="grid grid-cols-12 gap-4 pt-6">
                <div class="col-span-6">
                  <p class="flex justify-center">
                    <ClockIcon class="h-5 w-5" />
                    <span>
                      {{ gig_package.delivery_time }}
                      {{
                        gig_package.delivery_time > 1 ? "Days" : "Day"
                      }}
                      Delivery
                    </span>
                  </p>
                </div>
                <div class="col-span-6">
                  <p class="flex justify-center">
                    <RefreshIcon class="h-5 w-5" />
                    <span>
                      {{
                        gig_package.revisions < 0
                          ? "Unlimited"
                          : gig_package.revisions
                      }}
                      Revisions
                    </span>
                  </p>
                </div>
              </div>

              <button class="btn btn-outline btn-block text-lg md:text-xl mt-10">
                Continue {{ price(gig_package.price) }}
              </button>
            </div>
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
