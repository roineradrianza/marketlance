<template>
  <h3 class="card-title text-left text-2xl px-10 -mb-5">About the Seller</h3>
  <div class="card-body">
    <div class="card shadow-lg compact side bg-base-100">
      <div class="flex-row items-center space-x-4 card-body">
        <div>
          <div class="avatar">
            <div class="rounded-full w-24 h-24 shadow">
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
          <div class="flex flex-row">
            <Link :href="route('username.show', author.username)" class="btn btn-outline btn-sm mt-5">Contact me</Link>
          </div>
        </div>
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
    author: Object,
    ratings: Array,
  },
});
</script>
