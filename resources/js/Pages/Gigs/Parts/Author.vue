<template>
  <a :href="route('username.show', author.username)">
    <div class="card-body">
      <div class="card shadow-lg compact side bg-base-100">
        <div class="flex-row items-center space-x-4 card-body">
          <div>
            <div class="avatar">
              <div class="rounded-full w-14 h-14 shadow">
                <img
                  src="http://daisyui.com/tailwind-css-component-profile-1@56w.png"
                />
              </div>
            </div>
          </div>
          <div>
            <h2 class="card-title text-left">
              {{ author.name }}
            </h2>
            <p class="text-base-content text-opacity-40 text-left">
              {{ author.username }}
            </p>
            <div class="flex flex-row">
              <StarIcon class="h-5 w-5" v-for="i in 5" :key="i" />
              (180)
            </div>
          </div>
        </div>
      </div>
    </div>
  </a>
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
    author: Object,
    ratings: Array,
  },
});
</script>
