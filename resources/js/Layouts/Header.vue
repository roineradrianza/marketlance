<template>
  <div
    class="
      fixed
      inset-x-0
      top-0
      px-6
      py-4
      sm:block
      container-fluid
      bg-base-200
      z-10
    "
  >
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-2 flex justify-center">
        <Link :href="route('home')" class="text-sm text-white underline">
          <application-logo />
        </Link>
      </div>
      <div class="col-span-9 flex justify-end items-center">
        <template v-if="canLogin">
          <Link
            v-if="$page.props.user"
            :href="route('dashboard')"
            class="text-sm text-white underline"
          >
            Dashboard
          </Link>

          <template v-else>
            <Link :href="route('login')" class="text-sm text-white underline">
              Log in
            </Link>

            <Link
              v-if="canRegister"
              :href="route('register')"
              class="ml-4 text-sm text-white underline"
            >
              Register
            </Link>
          </template>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import ApplicationLogo from "@/Jetstream/ApplicationLogoWhite.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
    ApplicationLogo,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
  },
});
</script>